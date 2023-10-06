<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/exerciseCalories.css" />
    <title>Exercise</title>

</head>

<body>
    <div class="container">
        <h1>Exercise Log</h1>
        <form method="POST" action="../PHP/exerciseCalories.php">
            <div class="exerciseApi">
                <div class="exerciseType">
                    <label for="exerciseType">Type in your exercise:</label>
                    <input name="exerciseType" class="exerciseTypeInput" value="skiing">
                </div>
                <div class="exerciseDuration">
                    <label for="exerciseDuration">Duration (mins):</label>
                    <input name="exerciseDuration" class="exerciseDurationInput" value="60">
                </div>
                <div class="userWeight">
                    <label for="userWeight ">Weight (pounds):</label>
                    <input name="userWeight" class="userWeightInput" value="160">
                </div>
                <div class="caloriesBurned">
                    <label for="caloriesBurned">Calories Burned (kcal):</label>
                    <input name="caloriesBurned" class="caloriesBurnedInput" value="N/A">
                </div>
                <div class="trackCalories">
                    <button class="trackCaloriesButton" id="trackCalBttnID" name="trackCaloriesButton">Track</button>
                </div>
            </div>
            <div class="trackedCaloriesContainer" id="trackedCalContDiv">
                <ul class="trackedCalories">
                    <li>
                        <label for="storedExerciseType">Exercise type:</label>
                        <input name="storedExerciseType" class="exerciseTypeInput" id="etID" value="Skiing" readonly>
                    </li>
                    <li>
                        <label for="storedExerciseDuration">Duration (mins):</label>
                        <input name="storedExerciseDuration" class="exerciseDurationInput" id="edID" value="5" readonly>
                    </li>
                    <li>
                        <label for="storedUserWeight">Weight (pounds):</label>
                        <input name="storedUserWeight" class="userWeightInput" id="uwID" value="180" readonly>
                    </li>
                    <li>
                        <label for="storedCaloriesBurned">Calories Burned (kcal):</label>
                        <input name="storedCaloriesBurned" class="caloriesBurnedInput" id="cbID" value="356" readonly>
                    </li>
                    <li>
                        <button class="trackCaloriesButton" name="deleteExercise">Delete</button>
                    </li>
                </ul>
                <ul class="trackedCalories">
                    <li>
                        <label for="storedExerciseType">Exercise type:</label>
                        <input name="storedExerciseType" class="exerciseTypeInput" value="Skiing" readonly>
                    </li>
                    <li>
                        <label for="storedExerciseDuration">Duration (mins):</label>
                        <input name="storedExerciseDuration" class="exerciseDurationInput" value="5" readonly>
                    </li>
                    <li>
                        <label for="storedUserWeight">Weight (pounds):</label>
                        <input name="storedUserWeight" class="userWeightInput" value="180" readonly>
                    </li>
                    <li>
                        <label for="storedCaloriesBurned">Calories Burned (kcal):</label>
                        <input name="storedCaloriesBurned" class="caloriesBurnedInput" value="356" readonly>
                    </li>
                    <li>
                        <button class="trackCaloriesButton" name="deleteExercise">Delete</button>
                    </li>
                </ul>
            </div>
        </form>
    </div>
    <script type="module" src="../JS/exerciseCalories.js"></script>
</body>

</html>