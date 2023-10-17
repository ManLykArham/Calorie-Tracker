<?php
require '../PHP/checkLogIn.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/Calories.css" /> <!-- Helps when CSS isn't working due to cache -->
    <link rel="stylesheet" type="text/css" href="../CSS/universal.css" />
    <title>Food Log</title>

</head>

<body>
    <div class="container">
        <h1>Food Log</h1>
        <form method="POST" action="../PHP/foodLog.php">
            <div class="exerciseApi">
                <div class="exerciseType">
                    <label for="exerciseType">Food name:</label>
                    <input type="text" name="foodName" class="userInput" value="brisket and fries">
                </div>
                <div class="userWeight">
                    <label for="userWeight ">Amount (grams):</label>
                    <input type="text" name="foodAmount" class="userInput" value="100g">
                </div>
                <div class="date">
                    <label for="date">Date:</label>
                    <input type="date" name="dateTrack" class="userInput" id="foodDateID">
                </div>
                <div class="trackCalories">
                    <button class="trackCaloriesButton" name="trackFoodButton">Track</button>
                </div>
            </div>
            <div class="trackedCaloriesContainer">
                <ul class="trackedCalories">
                    <li>
                        <label for="storedExerciseType">Exercise type:</label>
                        <input type="text" name="storedFoodName" class="exerciseTypeInput" value="Skiing" readonly>
                    </li>
                    <li>
                        <label for="storedUserWeight">Amount (grams):</label>
                        <input type="text" name="storedFoodAmount" class="userWeightInput" value="180" readonly>
                    </li>
                    <li>
                        <label for="storedCaloriesBurned">Calories Burned (kcal):</label>
                        <input type="text" name="storedFoodCalories" class="caloriesBurnedInput" value="356" readonly>
                    </li>
                    <li>
                        <button class="trackCaloriesButton" name="deleteFoodLog">Delete</button>
                    </li>
                </ul>
                <ul class="trackedCalories">
                    <li>
                        <label for="storedExerciseType">Exercise type:</label>
                        <input type="text" name="storedFoodName" class="exerciseTypeInput" value="Skiing" readonly>
                    </li>
                    <li>
                        <label for="storedUserWeight">Amount (grams):</label>
                        <input type="text" name="storedFoodAmount" class="userWeightInput" value="180" readonly>
                    </li>
                    <li>
                        <label for="storedCaloriesBurned">Calories Burned (kcal):</label>
                        <input type="text" name="storedFoodCalories" class="caloriesBurnedInput" value="356" readonly>
                    </li>
                    <li>
                        <button class="trackCaloriesButton" name="deleteFoodLog">Delete</button>
                    </li>
                </ul>
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
                    <li class="navBarImg selected">
                        <a href="./foodLogWebPage.php"><img src="../IMG/food.png"></a>
                    </li>
                    <li class="navBarImg">
                        <a href="./settingWebPage.php"><img src="../IMG/setting.png"></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <script type="module" src="../JS/foodLog.js"></script>
</body>

</html>