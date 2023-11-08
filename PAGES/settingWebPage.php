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
        <div class="settingContainer">
            <form action="../PAGES/settingRPWebPage.php">

                <div class="resetPassword">
                    <button id="resetPasswordBttn" class="resBttn">Reset Password</button>
                </div>
            </form>
            <form method="POST" action="../PHP/setting.php">
                <div class="deleteAccount">
                    <button id="delAccButton" class="delBttn" name="delAccount">Delete Account</button>
                </div>
            </form>
            <form method="POST" action="../PHP/setting.php">
                <div class="resetData">
                    <button class="resetDataBttn" id="resetDataBttn" name="resetDataBttn">Reset Data</button>
                </div>
            </form>
            <form method="POST" action="../PHP/setting.php">
                <div class="logout">
                    <button id="logoutButton" class="logBttn" name="logoutBttn">Log Out</button>
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
    <script src="../JS/setting.js"></script>
</body>

</html>