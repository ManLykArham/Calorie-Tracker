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
                    <div class="exerciseType">
                        <label for="exerciseType">
                            <p>Food Name:</p>
                        </label>
                        <input type="text" name="foodName" id="etID" value="brisket and fries">
                    </div>
                    <div class="exerciseDuration">
                        <label for="exerciseDuration">
                            <p>Amount (grams):</p>
                        </label>
                        <input type="text" name="foodAmount" id="edID" value="100">
                    </div>
                    <div class="date">
                        <label for="date">
                            <p>Date:</p>
                        </label>
                        <input type="date" name="dateLog" id="exDateID" value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="trackCaloriesbttn">
                        <button class="trackButton" id="trackFoodBttnID" name="trackFoodButton">Track</button>
                    </div>
                </div>
            </form>
            <form method="POST" action="../PHP/showExercise.php">
                <div class="showExercise">
                    <div class="date">
                        <label for="showDate">
                            <p>Date:</p>
                        </label>
                        <input type="date" class="userInput" id="exShowDateID" name="showLog"
                            value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="showExercisesBttn">
                        <button class="showButton" id="showExercisesBttn" name="showExerciseButton">Show
                            FoodLog</button>
                    </div>
                </div>
            </form>
            <form method="POST" action="../PHP/deleteExercise.php">
                <div class="trackedCaloriesContainer" id="trackedCalContDiv">
                    <ul class="trackedCaloriesList">
                        <div class="individualListContainer">
                            <li class="listItem">
                                <label for="storedMealTime">
                                    <p>Time:</p>
                                </label>
                                <input type="time" name="storedMealTime" value="12:00" readonly>
                            </li>
                            <li class="listItem">
                                <label for="storedMealName">
                                    <p>Food Name:</p>
                                </label>
                                <input type="text" name="storedMealName" value="" readonly>
                            </li>
                            <li class="listItem">
                                <label for="storedAmount">
                                    <p>Amount (grams):</p>
                                </label>
                                <input type="text" name="storedAmount" value="" readonly>
                            </li>
                            <li class="listItem">
                                <label for="storedCaloriesBurned">
                                    <p>Calories Gained (kcal):</p>
                                </label>
                                <input type="text" name="storedCaloriesGained" value="" readonly>
                            </li>
                            <li class="listItem">
                                <button class="deleteButton" name="deleteMeal">Delete</button>
                            </li>
                        </div>
                    </ul>
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
    <script type="module" src="../JS/foodLog.js"></script>
    <script type="module" src="../JS/foodLogPHP.js"></script>
</body>

</html>