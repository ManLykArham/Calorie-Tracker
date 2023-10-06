<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/exerciseCalories.css" />
    <title>Food Log</title>

</head>

<body>
    <div class="container">
        <h1>Food Log</h1>
        <form method="POST" action="../PHP/foodLog.php">
            <div class="exerciseApi">
                <div class="exerciseType">
                    <label for="exerciseType">Food name:</label>
                    <input name="foodName" class="exerciseTypeInput" value="brisket and fries">
                </div>
                <div class="userWeight">
                    <label for="userWeight ">Amount (grams):</label>
                    <input name="foodAmount" class="userWeightInput" value="100g">
                </div>
                <div class="caloriesBurned">
                    <label for="caloriesBurned">Calories Burned (kcal):</label>
                    <input name="caloriesBurned" class="caloriesBurnedInput" value="N/A">
                </div>
                <div class="trackCalories">
                    <button class="trackCaloriesButton" name="trackFoodButton">Track</button>
                </div>
            </div>
            <div class="trackedCaloriesContainer">
                <ul class="trackedCalories">
                    <li>
                        <label for="storedExerciseType">Exercise type:</label>
                        <input name="storedFoodName" class="exerciseTypeInput" value="Skiing" readonly>
                    </li>
                    <li>
                        <label for="storedUserWeight">Amount (grams):</label>
                        <input name="storedFoodAmount" class="userWeightInput" value="180" readonly>
                    </li>
                    <li>
                        <label for="storedCaloriesBurned">Calories Burned (kcal):</label>
                        <input name="storedFoodCalories" class="caloriesBurnedInput" value="356" readonly>
                    </li>
                    <li>
                        <button class="trackCaloriesButton" name="deleteFoodLog">Delete</button>
                    </li>
                </ul>
                <ul class="trackedCalories">
                    <li>
                        <label for="storedExerciseType">Exercise type:</label>
                        <input name="storedFoodName" class="exerciseTypeInput" value="Skiing" readonly>
                    </li>
                    <li>
                        <label for="storedUserWeight">Amount (grams):</label>
                        <input name="storedFoodAmount" class="userWeightInput" value="180" readonly>
                    </li>
                    <li>
                        <label for="storedCaloriesBurned">Calories Burned (kcal):</label>
                        <input name="storedFoodCalories" class="caloriesBurnedInput" value="356" readonly>
                    </li>
                    <li>
                        <button class="trackCaloriesButton" name="deleteFoodLog">Delete</button>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</body>

</html>