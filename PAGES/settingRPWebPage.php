<?php
require '../PHP/checkLogIn.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/setting.css?<?php echo time(); ?>" /> <!-- Helps when CSS isn't working due to cache -->
    <link rel="stylesheet" type="text/css" href="../CSS/universal.css?<?php echo time(); ?>" />
    <title>Setting</title>

</head>

<body>
    <div class="container">
        <h1>Setting</h1>
        <div class="resetPswrdContainer">
            <form method="POST" action="../PHP/resetPassword.php">
                <div class="inputFields">
                    <input type="text" placeholder="Old Password" name="confirmPasswrd">
                    <input type="text" placeholder="New Password" name="newPasswrd">
                    <input type="text" placeholder="Confirm new Password" name="confirmNewPasswrd">
                    <button class="resetBttn" name="resetBttn">Reset!</button>
                </div>
            </form>
            <form action="../PAGES/settingWebPage.php">
                <div class="resetPassword">
                    <button class="backBttn">Go Back</button>
                </div>
            </form>
        </div>

        <div>
            <nav>
                <ul class="navBar">
                    <li class="navBarImg">
                        <a href="./dashboardWebPage.php"><img src="../IMG/home.png"></a>
                    </li>
                    <li class="navBarImg">
                        <a href="./exerciseCaloriesWebPage.php"><img src="../IMG/calorie.png"></a>
                    </li>
                    <li class="navBarImg ">
                        <a href="./foodLogWebPage.php"><img src="../IMG/food.png"></a>
                    </li>
                    <li class="navBarImg selected">
                        <a href="./settingWebPage.php"><img src="../IMG/setting.png"></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <script>
        // Alert what the error was after being validated in php
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');
        const success = urlParams.get('success');
        if (error === 'emptyfields') {
            alert('Empty Fields');
        } else if (error === 'sqlerror') {
            alert('SQL error, Please try again :)');
        } else if (error === 'confirmpassword-wrong') {
            alert('Your old password is incorrect');
        } else if (error === 'confirmnewpassword-wrong') {
            alert('New password does not match');
        } else if (success === 'passwordupdated') {
            alert('Password Updated :)');
        } else if (error === 'pleasetryagain-cnp') {
            alert('Issue occured, Please try again :)');
        } else if (error === 'pleasetryagain-cp') {
            alert('Issue occured, Please try again :)');
        } else if (error === 'no-user') {
            alert('No user found');
        }
    </script>
    <script type="module" src="../JS/exerciseCalories.js"></script>
</body>

</html>