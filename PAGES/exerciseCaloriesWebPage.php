<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/Calories.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/universal.css" />
    <title>Exercise</title>

</head>

<body>
    <div class="container">
        <h1>Exercise Log</h1>
        <form method="POST" action="../PHP/exerciseCalories.php">
            <div class="exerciseApi">
                <div class="exerciseType">
                    <label for="exerciseType">Your exercise:</label>
                    <input type="text" name="exerciseType" class="userInput" id="etID" value="skiing">
                </div>
                <div class="exerciseDuration">
                    <label for="exerciseDuration">Duration (mins):</label>
                    <input type="text" name="exerciseDuration" class="userInput" id="edID" value="60">
                </div>
                <div class="userWeight">
                    <label for="userWeight ">Weight (pounds):</label>
                    <input type="text" name="userWeight" class="userInput" id="uwID" value="160">
                </div>
                <div class="date">
                    <label for="date">Date:</label>
                    <input type="date" name="dateTrack" class="userInput" id="exDateID">
                </div>

                <div class="trackCaloriesbttn">
                    <button class="trackCaloriesButton" id="trackCalBttnID" name="trackCaloriesButton">Track</button>
                </div>
            </div>
            <div class="trackedCaloriesContainer" id="trackedCalContDiv">
                <ul class="trackedCaloriesList">
                    <li>
                        <label for="storedExerciseType">Exercise type:</label>
                        <input type="text" name="storedExerciseType" class="exerciseTypeInput" value="" readonly>
                    </li>
                    <li>
                        <label for="storedExerciseDuration">Duration (mins):</label>
                        <input type="text" name="storedExerciseDuration" class="exerciseDurationInput" value=""
                            readonly>
                    </li>
                    <li>
                        <label for="storedUserWeight">Weight (pounds):</label>
                        <input type="text" name="storedUserWeight" class="userWeightInput" value="" readonly>
                    </li>
                    <li>
                        <label for="storedCaloriesBurned">Calories Burned (kcal):</label>
                        <input type="text" name="storedCaloriesBurned" class="caloriesBurnedInput" value="" readonly>
                    </li>
                    <li>
                        <button class="trackCaloriesButton" name="deleteExercise">Delete</button>
                    </li>
                </ul>
                <ul class="trackedCaloriesList">
                    <li>
                        <label for="storedExerciseType">Exercise type:</label>
                        <input type="text" name="storedExerciseType" class="exerciseTypeInput" value="" readonly>
                    </li>
                    <li>
                        <label for="storedExerciseDuration">Duration (mins):</label>
                        <input type="text" name="storedExerciseDuration" class="exerciseDurationInput" value=""
                            readonly>
                    </li>
                    <li>
                        <label for="storedUserWeight">Weight (pounds):</label>
                        <input type="text" name="storedUserWeight" class="userWeightInput" value="" readonly>
                    </li>
                    <li>
                        <label for="storedCaloriesBurned">Calories Burned (kcal):</label>
                        <input type="text" name="storedCaloriesBurned" class="caloriesBurnedInput" value="" readonly>
                    </li>
                    <li>
                        <button class="trackCaloriesButton" name="deleteExercise">Delete</button>
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
                    <li class="navBarImg selected">
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