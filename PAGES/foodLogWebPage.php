<?php
require '../PHP/checkLogIn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/Calories.css?<?php echo time(); ?>" />
    <!-- Helps when CSS isn't working due to cache -->
    <link rel="stylesheet" type="text/css" href="../CSS/universal.css?<?php echo time(); ?>" />
    <title>Exercise</title>

</head>

<body>
    <div class="container">
        <h1>Food Log</h1>
        <div class="divOrder">
            <form method="POST" action="../PHP/foodLog.php">
                <div class="exerciseApi">
                    <div class="mealDiv">
                    <label for="mealSelector">Meal Type:</label>
                    <select class="mealSelector" id="mealSelector">
                        <option value="breakfast">Breakfast</option>
                        <option value="snack">Snack</option>
                        <option value="lunch">Lunch</option>
                        <option value="dinner">Dinner</option>
                        <option value="meal">Meal</option>
                    </select>
                    </div>
                    <div class="exerciseType">
                        <!-- <label for="exerciseType">
                            <p>Food Name:</p>
                        </label>
                        <input type="text" name="foodName" id="mealName" value="brisket and fries">
                         -->
                         <label for="exerciseType">
                            <p>Meal:</p>
                        </label>
                         <textarea class="storedMealNameCSS" name="storedMealName" id="mealName" placeholder="Yogurt with granola and berries..."></textarea>
                         <div id="mealDropdown" class="meal-dropdown"></div>
                    </div>
                    <!-- <div class="exerciseDuration">
                        <label for="exerciseDuration">
                            <p>Amount (grams):</p>
                        </label>
                        <input type="text" name="foodAmount" id="mealAmount" value="100">
                    </div> -->
                    <div class="date">
                        <label for="date">
                            <p>Date:</p>
                        </label>
                        <input type="datetime-local" name="dateLog" id="mealDateID" value="<?php echo date('Y-m-d H:i'); ?>">
                    </div>

                    <div class="trackCaloriesbttn">
                        <button class="trackButton" id="trackFoodBttnID" name="trackFoodButton">Track</button>
                    </div>
                </div>
            </form>
            <form method="POST" action="../PHP/showFoodLog.php">
                <div class="showExercise">
                    <div class="date">
                        <label for="showDate">
                            <p>Date:</p>
                        </label>
                        <input type="date" class="userInput" id="showLogID" name="showLog" value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="showExercisesBttn">
                        <button class="showButton" id="showMealBttn" name="showMealButton">Show
                            FoodLog</button>
                    </div>
                </div>
            </form>
            <form method="POST" action="../PHP/deleteMeal.php">
                <div class="trackedContainer" id="trackedFoodContDiv">

                </div>
            </form>
        </div>

        <div>
            <nav>
                <ul class="navBar">
                    <li class="navBarImg">
                        <a href="./dashboardWebPage.php"><img src="../IMG/home.png"></a>
                    </li>
                    <li class="navBarImg ">
                        <a href="./exerciseCaloriesWebPage.php"><img src="../IMG/calorie.png"></a>
                    </li>
                    <li class="navBarImg selected">
                        <a href="./foodLogWebPage.php"><img src="../IMG/food.png"></a>
                    </li>
                    <li class="navBarImg ">
                        <a href="./settingWebPage.php"><img src="../IMG/setting.png"></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- <script>
        document.getElementById('exDateID').valueAsDate = new Date();
        document.getElementById('exShowDateID').valueAsDate = new Date();
    </script> -->
    <script src="../JS/checkUserLoggedIn.js"></script>
    <script type="module" src="../JS/foodLogPHP.js"></script>
    <script type="module" src="../JS/foodValidation.js"></script>
</body>

</html>