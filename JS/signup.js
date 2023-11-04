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



function requestToSignUpPHP(userName, userSurname, userEmail) {
    let userData = {
        "name": userName,
        "surname": userSurname,
        "email": userEmail
    }

    fetch("../PHP/signUp.php", {
            "method": "POST",
            "headers": {
                "Content-Type": "application/json;"
            },
            "body": JSON.stringify(userData)
        }).then(response => response.json())
        .then(data => {
            if (data.userTaken) {
                alert("Email address already has been registered");
            }
        })
        .catch(error => console.error("Error:", error));
};


document.getElementById('signupBttn').addEventListener("click", function(e) {
    e.preventDefault();

    const userName = document.getElementById('userName').value;
    const userSurname = document.getElementById('usrSurname').value;
    const userEmail = document.getElementById('usrEmail').value;
    const userPassword = document.getElementById('usrPassword').value;

    if (validateSignUpInputs(userName, userSurname, userEmail, userPassword) == true) {
        requestToSignUpPHP(userName, userSurname, userEmail);
    }
});