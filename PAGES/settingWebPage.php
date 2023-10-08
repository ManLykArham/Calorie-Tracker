<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/exerciseCalories.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/universal.css" />
    <title>Dashboard</title>

</head>

<body>
    <nav>
        <ul class="nav-list">
            <li>
                <a href="./dashboardWebPage.php"><img src="../IMG/home.png"></a>
            </li>
            <li>
                <a href="./exerciseCaloriesWebPage.php"><img src="../IMG/calorie.png"></a>
            </li>
            <li>
                <a href="./foodLogWebPage.php"><img src="../IMG/food.png"></a>
            </li>
            <li class="selected">
                <a href="./settingWebPage.php"><img src="../IMG/setting.png"></a>
            </li>
        </ul>
    </nav>


    <div class="container2">
        <h1>Setting</h1>
        <form method="POST" action="../PHP/exerciseCalories.php">
            <div class="settingContainer">
                <div class="resetPassword">
                    <button>Reset Password</button>
                </div>
                <div class="logout">
                    <button>Log Out</button>
                </div>
            </div>
        </form>
    </div>
    <script type="module" src="../JS/exerciseCalories.js"></script>
</body>

</html>