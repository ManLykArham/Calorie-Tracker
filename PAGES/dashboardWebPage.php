<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/universal.css" />
    <title>Dashboard</title>

</head>

<body>
    <div class="container">
        <h1>Todays Calories In/Out</h1>
        <div class="calDetails">
            <div class="calIn">
                <label for="totalCalIn">Calories In:</label>
                <input type="text" id="caloriesIn" name="caloriesIn">
            </div>
            <div class="calOut">
                <label for="totalCalOut">Calories Out:</label>
                <input type="text" id="caloriesOut" name="caloriesOut">
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