<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/setting.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/universal.css" />
    <title>Setting</title>

</head>

<body>
    <div class="container">
        <h1>Setting</h1>
        <form method="POST" action="../PHP/exerciseCalories.php">
            <div class="settingContainer">
                <div class="resetPassword">
                    <button class="resBttn">Reset Password</button>
                </div>
                <div class="deleteAccount">
                    <button class="delBttn">Delete Account</button>
                </div>
                <div class="logout">
                    <button class="logBttn">Log Out</button>
                </div>
            </div>

        </form>

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
    <script type="module" src="../JS/exerciseCalories.js"></script>
</body>

</html>