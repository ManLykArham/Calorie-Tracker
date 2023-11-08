const resetButton = document.getElementById("resetDataBttn");
const deleteAccountButton = document.getElementById("delAccButton");
const logoutButton = document.getElementById("logoutButton");

async function settingFunction(buttonClicked) {
    const data = {
        [buttonClicked]: 1
    }
    console.log(data);
    const path = "../PHP/setting.php"
    try {
        const response = await fetch(path, {
            method: "POST",
            headers: {
                "Content-Type": "application/json;",
            },
            body: JSON.stringify(data),
        });
        const result = await response.json();

        if (result.success === 'dataReset') {
            alert('Data has been reset');
        } else if (result.error === 'resetExercise') {
            alert('Error resetting exercise data');
        } else if (result.error === 'resetFood') {
            alert('Error resetting food data');
        } else if (result.error === 'resetStat') {
            alert('Error resetting user stat data');
        } else if (result.success === 'accDelete') {
            window.location.href = '../PAGES/registerWebPage.php';
            alert('User account deleted');
        } else if (result.success === 'logout') {
            window.location.href = '../PAGES/registerWebPage.php';
            alert('You have logged out successfully');
        } else {
            alert('Unknown response');
        }
    } catch (error) {
        console.error("Error: " + error);
    }
}

resetButton.addEventListener("click", function(e) {
    e.preventDefault();
    const resetButtonValue = "resetButton";
    settingFunction(resetButtonValue);
});
deleteAccountButton.addEventListener("click", function(e) {
    e.preventDefault();
    const deleteAccountButtonValue = "deleteAccountButton";
    settingFunction(deleteAccountButtonValue);
});
logoutButton.addEventListener("click", function(e) {
    e.preventDefault();
    const logoutButtonValue = "logOutButton";
    settingFunction(logoutButtonValue);
});