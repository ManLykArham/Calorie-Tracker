<?php
require '../PHP/checkLogIn.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/dashboard.css?<?php echo time(); ?>" /> <!-- Helps when CSS isn't working due to cache -->
    <link rel="stylesheet" type="text/css" href="../CSS/universal.css?<?php echo time(); ?>" />
    <title>Dashboard</title>

</head>

<body>
    <div class="container">
        <h1>Todays Calories In/Out</h1>
        <div class="calDetails">
            <div class="calIn">
                <label for="totalCalIn">
                    <p>Calories In:</p>
                </label>
                <input type="text" id="caloriesIn" name="caloriesIn" value="<?php echo 0; ?>" readonly>
            </div>
            <div class="calOut">
                <label for="totalCalOut">
                    <p>Calories Out:</p>
                </label>
                <input type="text" id="caloriesOut" name="caloriesOut" value="<?php echo 0; ?>" readonly>
            </div>
        </div>
        <div>
            <nav>
                <ul class="navBar">
                    <li class="navBarImg selected">
                        <a href="./dashboardWebPage.php"><img src="../IMG/home.png"></a>
                    </li>
                    <li class="navBarImg ">
                        <a href="./exerciseCaloriesWebPage.php"><img src="../IMG/calorie.png"></a>
                    </li>
                    <li class="navBarImg">
                        <a href="./foodLogWebPage.php"><img src="../IMG/food.png"></a>
                    </li>
                    <li class="navBarImg">
                        <a href="./settingWebPage.php"><img src="../IMG/setting.png"></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <script type="module" src="../JS/exerciseCalories.js"></script>
</body>

</html>