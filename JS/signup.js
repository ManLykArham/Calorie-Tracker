function validateSignUpInputs(userName, userSurname, userEmail, userPassword) {
    const regexString = /^[a-zA-Z\s,]+$/;
    const regexEmail = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

    const testName = regexString.test(userName);
    const testSurname = regexString.test(userSurname);
    const testEmail = regexEmail.test(userEmail);

    if (!testName) {
        alert("Type a proper name");
    } else if (!testSurname) {
        alert("Type a proper surname");
    } else if (!testEmail || userEmail == "" || userEmail == null) {
        alert("Type a proper email");
    } else if (userPassword == "" || userPassword == null) {
        alert("Type a proper password");
    } else if (testName && testSurname) {
        return true;
    } else {
        location.reload();
        alert("There was an error, please try again :)");
    }
};

async function hashPassword(password) {
    // Generate a random salt (you should store this along with the hashed password)
    const salt = crypto.getRandomValues(new Uint8Array(16));

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

    console.log("salt:\n");
    console.log(salt);
    console.log("hashedpassword:\n");
    console.log(hashedPassword);

    return { hashedPassword, salt: Array.from(salt) };
}
async function requestToSignUpPHP(userName, userSurname, userEmail, userPassword) {
    hashPassword(userPassword).then(result => {
        const userHashPassword = result.hashedPassword;
        const userHPSalt = result.salt;

        let userData = {
            "name": userName,
            "surname": userSurname,
            "email": userEmail,
            "hashpassword": userHashPassword,
            "userhpsalt": userHPSalt
        };

        fetch("../PHP/signUp.php", {
                "method": "POST",
                "headers": {
                    "Content-Type": "application/json;"
                },
                "body": JSON.stringify(userData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.userTaken === true) {
                    alert("Email has already been registered with an account");
                } else if (data.success === "signedUP") {
                    window.location.href = '../PAGES/dashboardWebPage.php';
                    alert("You have successfully signed up :)");
                }
            })
            .catch(error => console.error("Error:", error));
    });
}

document.getElementById('signupBttn').addEventListener("click", async function(e) {
    e.preventDefault();

    const userName = document.getElementById('userName-SU').value;
    const userSurname = document.getElementById('userSurname-SU').value;
    const userEmail = document.getElementById('userEmail-SU').value;
    const userPassword = document.getElementById('userPassword-SU').value;

    if (validateSignUpInputs(userName, userSurname, userEmail, userPassword) == true) {
        await requestToSignUpPHP(userName, userSurname, userEmail, userPassword);
    }
});