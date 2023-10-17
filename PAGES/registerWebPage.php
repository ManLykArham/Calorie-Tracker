<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/register.css?<?php echo time(); ?>">
    <title>Register</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST" action="../PHP/signUp.php">
                <h1 class="register">Create Account</h1>
                <input type="text" placeholder="First Name" name="userName">
                <input type="text" placeholder="Surname" name="userSurname">
                <input type="email" placeholder="Email" name="userEmail-SU">
                <input type="password" placeholder="Password" name="userPassword-SU">
                <button name="signup-bttn">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST" action="../PHP/logIn.php">
                <h1 class="register">Sign In</h1>
                <input type="email" placeholder="Email" name="userEmail-SI">
                <input type="password" placeholder="Password" name="userPassword-SI">
                <button name="login-bttn">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Alert what the error was after being validated in php
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');
        if (error === 'emptyfields') {
            alert('Empty Fields');
        } else if (error === 'invalidemail') {
            alert('Invalid Email');
        } else if (error === 'invalidusername') {
            alert('Invalid Username');
        } else if (error === 'invalidusersurname') {
            alert('Invalid User Surname');
        } else if (error === 'usertaken') {
            alert('User Taken');
        } else if (error === 'wrongpassword') {
            alert('Wrong Password');
        } else if (error === 'no-user') {
            alert('PLease try again :)');
        }
    </script>
    <script src="../JS/register.js"></script>
</body>

</html>