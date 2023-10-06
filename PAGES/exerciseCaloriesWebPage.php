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
                    <input name="exerciseType" class="exerciseTypeInput" id="etID" value="skiing">
                </div>
                <div class="exerciseDuration">
                    <label for="exerciseDuration">Duration (mins):</label>
                    <input name="exerciseDuration" class="exerciseDurationInput"  id="edID" value="60">
                </div>
                <div class="userWeight">
                    <label for="userWeight ">Weight (pounds):</label>
                    <input name="userWeight" class="userWeightInput" id="uwID" value="160">
                </div>
                <div class="caloriesBurned">
                    <label for="caloriesBurned">Calories Burned (kcal):</label>
                    <input name="caloriesBurned" class="caloriesBurnedInput" id="cbID" value="N/A">
                </div>
                <div class="trackCalories">
                    <button class="trackCaloriesButton" id="trackCalBttnID" name="trackCaloriesButton">Track</button>
                </div>
            </div>
            <div class="trackedCaloriesContainer" id="trackedCalContDiv">
                <ul class="trackedCalories">
                    <li>
                        <label for="storedExerciseType">Exercise type:</label>
                        <input name="storedExerciseType" class="exerciseTypeInput"  value="" readonly>
                    </li>
                    <li>
                        <label for="storedExerciseDuration">Duration (mins):</label>
                        <input name="storedExerciseDuration" class="exerciseDurationInput" value="" readonly>
                    </li>
                    <li>
                        <label for="storedUserWeight">Weight (pounds):</label>
                        <input name="storedUserWeight" class="userWeightInput"  value="" readonly>
                    </li>
                    <li>
                        <label for="storedCaloriesBurned">Calories Burned (kcal):</label>
                        <input name="storedCaloriesBurned" class="caloriesBurnedInput"  value="" readonly>
                    </li>
                    <li>
                        <button class="trackCaloriesButton" name="deleteExercise">Delete</button>
                    </li>
                </ul>
                <ul class="trackedCalories">
                    <li>
                        <label for="storedExerciseType">Exercise type:</label>
                        <input name="storedExerciseType" class="exerciseTypeInput" value="" readonly>
                    </li>
                    <li>
                        <label for="storedExerciseDuration">Duration (mins):</label>
                        <input name="storedExerciseDuration" class="exerciseDurationInput" value="" readonly>
                    </li>
                    <li>
                        <label for="storedUserWeight">Weight (pounds):</label>
                        <input name="storedUserWeight" class="userWeightInput" value="" readonly>
                    </li>
                    <li>
                        <label for="storedCaloriesBurned">Calories Burned (kcal):</label>
                        <input name="storedCaloriesBurned" class="caloriesBurnedInput" value="" readonly>
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