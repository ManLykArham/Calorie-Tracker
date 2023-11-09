const resetPasswordButton = document.getElementById("resetPasswordButton");

function validateResetInputs(oldPassword, newPassword, confirmNewPassword) {
    if (oldPassword == "" && newPassword == "" && confirmNewPassword == "") {
        alert("Fill in the empty fields")
    } else if (oldPassword == "") {
        alert("Type in your old password")
    } else if (newPassword == "") {
        alert("Type in your new password")
    } else if (confirmNewPassword == "") {
        alert("Confirm your new password")
    } else if (newPassword !== confirmNewPassword) {
        alert("New password does not match")
    } else {
        return true;
    }
}

async function checkOldPassword(oldPassword) {
    let storedPassword;
    let storedSalt;

    const result = await retrievePasswordNSalt();
    storedPassword = result.dbPassword;
    storedSalt = result.dbSalt;
    const hashResult = await checkHashPassword(oldPassword, storedSalt);
    console.log("-----------------------------------\n");
    console.log(storedSalt);
    console.log(storedPassword);
    console.log(hashResult.hashedPassword);
    if (storedPassword === hashResult.hashedPassword) {
        return true;
    } else {
        return false;
    }

}

async function checkHashPassword(password, salt) {
    const saltToObject = JSON.parse(salt);
    let saltBuffer = Uint8Array.from(saltToObject);

    const key = await crypto.subtle.importKey(
        'raw',
        new TextEncoder().encode(password), { name: 'PBKDF2' },
        false, ['deriveBits']
    );

    const derivedKey = await crypto.subtle.deriveBits({
            name: 'PBKDF2',
            salt: saltBuffer, // Use the binary representation of salt
            iterations: 100000,
            hash: 'SHA-256',
        },
        key,
        256 // 256-bit key
    );

    const hashedPassword = Array.from(new Uint8Array(derivedKey))
        .map(byte => byte.toString(16).padStart(2, '0'))
        .join('');
    console.log(saltBuffer);
    console.log(password);
    console.log(hashedPassword);
    return { hashedPassword };
}


function isStrongPassword(password) {
    const regexUpperCase = /[A-Z]/;
    const regexLowerCase = /[a-z]/;
    const regexNumber = /[0-9]/;
    const regexSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/; // Add more special characters as needed

    return (
        password.length >= 4 && // Minimum length of 8 characters
        regexUpperCase.test(password) && // At least one uppercase letter
        regexLowerCase.test(password) && // At least one lowercase letter
        regexNumber.test(password) && // At least one number
        regexSpecialChar.test(password) // At least one special character
    );
}

function retrievePasswordNSalt() {
    return new Promise((resolve, reject) => {

        fetch("../PHP/getUserPassword.php", {
                "method": "POST",
                "headers": {
                    "Content-Type": "application/json;"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.error == "sqlError") {
                    alert("SQL ERROR: Please try again later");
                    reject("SQL error");
                } else if (data.error == "noUser") {
                    alert("You should not be loggged in right now :/");
                    reject("No user found");
                } else {
                    resolve({ dbPassword: data.storedPassword, dbSalt: data.storedSalt });
                }
            })
            .catch(error => {
                console.error("Error:", error);
                reject(error);
            });
    });
}

async function hashPassword(password) {
    // Generate a random salt (you should store this along with the hashed password)
    const salt = crypto.getRandomValues(new Uint8Array(16));
    console.log(salt);

    // Display the result
    // Use the PBKDF2 algorithm to derive a key from the password
    const key = await crypto.subtle.importKey(
        'raw',
        new TextEncoder().encode(password), { name: 'PBKDF2' },
        false, ['deriveBits']
    );

    // Derive a key using PBKDF2 with 100,000 iterations (you can adjust this)
    const derivedKey = await crypto.subtle.deriveBits({
            name: 'PBKDF2',
            salt: salt,
            iterations: 100000,
            hash: 'SHA-256',
        },
        key,
        256 // 256-bit key
    );

    // Convert the derived key to a hexadecimal string
    const hashedPassword = Array.from(new Uint8Array(derivedKey))
        .map(byte => byte.toString(16).padStart(2, '0'))
        .join('');

    return { hashedPassword, salt: Array.from(salt) };
}

async function storeNewData(password, salt) {
    try {
        let newData = {
            "newPassword": password,
            "newSalt": salt
        }

        const response = await fetch("../PHP/resetPassword.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json;"
            },
            body: JSON.stringify(newData)
        })
        const data = await response.json();
        if (data.error === "sqlError") {
            alert("There was an issue with the server, please try again later");
        } else if (data.error === "fetchPOSTerror") {
            alert("Error with fetch request, please try again");
        } else if (data.success === "passwordUpdated") {
            window.location.href = '../PAGES/settingWebPage.php';
            alert("Password has been updated successfully :)")
        } else {
            console.log("Unknown error");
        }
    } catch (error) {
        console.error("Error: " + error);
    }
}

async function updatePassword(newPassword) {
    const newHashResult = await hashPassword(newPassword);
    const PASSWORD = newHashResult.hashedPassword;
    const SALT = newHashResult.salt;
    storeNewData(PASSWORD, SALT);
}


async function resetPassword() {
    try {
        const oldPassword = document.getElementById("oldPassword").value;
        const newPassword = document.getElementById("newPassword").value;
        const confirmNewPassword = document.getElementById("confirmNewPassword").value;

        if (validateResetInputs(oldPassword, newPassword, confirmNewPassword) === true) {
            const isOldPasswordTrue = await checkOldPassword(oldPassword);

            if (isOldPasswordTrue === true) {
                isStrongPassword(newPassword);
                if (isStrongPassword(newPassword)) {
                    alert("Password is strong enough");
                    updatePassword(newPassword);
                } else {
                    alert("Password is too weak");
                }

            } else {
                alert("Old password incorrect");
            }

        }
    } catch (error) {
        console.error("Error: " + error)
    }
}

resetPasswordButton.addEventListener("click", function(e) {
    e.preventDefault();
    resetPassword();
});