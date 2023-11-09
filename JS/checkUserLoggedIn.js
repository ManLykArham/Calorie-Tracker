function checkIfUserIsLoggedIn() {
    retrieveUserID();
}

async function retrieveUserID() {
    try {
        const response = await fetch("../PHP/checkUserID.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json;",
            },
        });
        const data = await response.json();
        if (data.error === "userID undefined") {
            window.location.href = '../PAGES/registerWebPage.php';
            alert("Please logIn or SignUp :)");
        }
    } catch (error) {
        console.error("Error: " + error);
    }
}


window.addEventListener('load', function(e) {
    e.preventDefault();
    checkIfUserIsLoggedIn();
});