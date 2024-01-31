function validateLogInInputs(userEmail, userPassword) {
    const regexEmail = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

    const testEmail = regexEmail.test(userEmail);

    if (!testEmail || userEmail == "" || userEmail == null) {
        alert("Type a proper email");
    } else if (userPassword == "" || userPassword == null) {
        alert("Type a proper password");
    } else if (testEmail && !userPassword == "" || !userPassword == null) {
        return true;
    } else {
        location.reload();
        alert("There was an error, please try again :)");
    }

}

async function checkPasswordNEmail(userEmail, userPassword) {
    let storedPassword
    let storedSalt;
    await retrieveData(userEmail).then(result => {
        storedPassword = result.dbPassword;
        storedSalt = result.dbSalt;
    });
    // let storedPassword = retrieveData().dbPassword;
    // let storedSalt = retrieveData().storedSalt;
    await hashPassword(userPassword, storedSalt).then(result => {
        if (storedPassword == result.hashedPassword) {
            logIn(userEmail);
        } else {
            alert("Password Incorrect");
        }
    })

}

function retrieveData(userEmail) {
    return new Promise((resolve, reject) => {

        let userData = {
            "email": userEmail
        }

        fetch("../PHP/getUserData.php", {
                "method": "POST",
                "headers": {
                    "Content-Type": "application/json;"
                },
                "body": JSON.stringify(userData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.error == "sqlError") {
                    alert("SQL ERROR: Please try again later");
                    reject("SQL error");
                } else if (data.error == "noUser") {
                    alert("This email is not associated with an account");
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


async function hashPassword(password, salt) {
    const saltToObject = JSON.parse(salt);
    let saltBuffer = Uint8Array.from(saltToObject);

    console.log("salt:\n");
    console.log(salt);
    console.log("salttoobject:\n");
    console.log(saltToObject);
    console.log("saltbuffer:\n");
    console.log(saltBuffer);

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

    console.log("hashedpassword:\n");
    console.log(hashedPassword);

    return { hashedPassword };
}

function logIn(userEmail) {
    let userData = {
        "email": userEmail
    }

    fetch("../PHP/logIn.php", {
            "method": "POST",
            "headers": {
                "Content-Type": "application/json;"
            },
            "body": JSON.stringify(userData)
        }).then(response => response.json())
        .then(data => {
            if (data.error == "sqlError") {
                alert("SQL ERROR: Please try again later");
            } else if (data.error == "noUser") {
                alert("This email is not associated with an account");
            } else if (data.success == "loggedIN") {
                window.location.href = '../PAGES/dashboardWebPage.php';
                alert("You have successfully logged in :)");
            }
        })
}

document.getElementById('loginBttn').addEventListener("click", async function(e) {
    e.preventDefault();

    const userEmail = document.getElementById('userEmail-SI').value;
    const userPassword = document.getElementById('userPassword-SI').value;

    if (validateLogInInputs(userEmail, userPassword) == true) {
        checkPasswordNEmail(userEmail, userPassword);
    }
});