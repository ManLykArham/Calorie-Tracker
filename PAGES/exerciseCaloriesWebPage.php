<?php
require '../PHP/checkLogIn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/Calories.css?<?php echo time(); ?>" /> <!-- Helps when CSS isn't working due to cache -->
    <link rel="stylesheet" type="text/css" href="../CSS/universal.css?<?php echo time(); ?>" />
    <title>Exercise</title>

</head>

<body>
    <div class="container">
        <h1>Exercise Log</h1>

        <div class="divOrder">
            <form method="POST" action="../PHP/exerciseCalories.php">
                <div class="exerciseApi">
                    <div class="exerciseType">
                        <label for="exerciseType">
                            <p>Your exercise:</p>
                        </label>
                        <input type="text" name="exerciseType" id="etID" placeholder="skiing">
                        <div id="exerciseDropdown" class="exercise-dropdown"></div>
                    </div>
                    <div class="exerciseDuration">
                        <label for="exerciseDuration">
                            <p>Duration (mins):</p>
                        </label>
                        <input type="text" name="exerciseDuration" id="edID" placeholder="999">
                    </div>
                    <div class="userWeight">
                        <label for="userWeight ">
                            <p>Weight (pounds):</p>
                        </label>
                        <input type="text" name="userWeight" id="uwID" placeholder="160">
                    </div>
                    <div class="date">
                        <label for="date">
                            <p>Date:</p>
                        </label>
                        <input type="date" name="dateTrack" id="exDateID" value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="trackCaloriesbttn">
                        <button class="trackButton" id="trackCalBttnID" name="trackCaloriesButton">Track</button>
                    </div>
                </div>
            </form>
            <form method="POST" action="../PHP/showExercise.php">
                <div class="showExercise">
                    <div class="date">
                        <label for="showDate">
                            <p>Date:</p>
                        </label>
                        <input type="date" class="userInput" id="exShowDateID" name="showDate" value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="showExercisesBttn">
                        <button class="showButton" id="showExercisesButtn" name="showExerciseButton">Show Exercises</button>
                    </div>
                </div>
            </form>
            <form method="POST" action="../PHP/deleteExercise.php">
                <div class="trackedContainer" id="trackedCalContDiv">

                </div>
            </form>
        </div>

        <div>
            <nav>
                <ul class="navBar">
                    <li class="navBarImg">
                        <a href="./dashboardWebPage.php"><img src="../IMG/home.png"></a>
                    </li>
                    <li class="navBarImg selected">
                        <a href="./exerciseCaloriesWebPage.php"><img src="../IMG/calorie.png"></a>
                    </li>
                    <li class="navBarImg ">
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
    <script type="module" src="../JS/exerciseCalories.js"></script>
    <script type="module" src="../JS/exCalAPI.js"></script>
</body>

</html>