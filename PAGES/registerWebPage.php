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
            <form>
                <h1 class="register">Create Account</h1>
                <input type="text" placeholder="First Name" id="userName-SU" name="userName">
                <input type="text" placeholder="Surname" id="userSurname-SU" name="userSurname">
                <input type="email" placeholder="Email" id="userEmail-SU" name="userEmail-SU">
                <input type="password" placeholder="Password" id="userPassword-SU" name="userPassword-SU">
                <button id="signupBttn" name="signup-bttn">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1 class="register">Sign In</h1>
                <input type="email" placeholder="Email" id="userEmail-SI" name="userEmail-SI">
                <input type="password" placeholder="Password" id="userPassword-SI" name="userPassword-SI">
                <button id="loginBttn" name="login-bttn">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of the site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of the site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../JS/register.js"></script>
    <script>
        document.getElementById('signupBttn').addEventListener('click', function(e) {
            e.preventDefault();
            // Create a new script element
            var script = document.createElement('script');
            script.src = '../JS/signup.js'; // Path to your JavaScript file
            script.type = 'text/javascript';

            // Add the script to the document
            document.body.appendChild(script);
        });
    </script>
    <script>
        document.getElementById('loginBttn').addEventListener('click', function(e) {
            e.preventDefault();
            // Create a new script element
            var script = document.createElement('script');
            script.src = '../JS/login.js'; // Path to your JavaScript file
            script.type = 'text/javascript';

            // Add the script to the document
            document.body.appendChild(script);
        });
    </script>

    <!-- <script src="../JS/signup.js"></script>
    <script src="../JS/login.js"></script> -->


</body>

</html>