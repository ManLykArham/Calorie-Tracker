<?php


function storeVariables($exerciseType, $exerciseDuration, $userWeight, $date, $userCaloriesBurned)
{
    require '../PHP/dbConnection.php';
    session_start();
    $userID = $_SESSION['userID'];

    $sql = "INSERT INTO exerciseType (userID, exerciseType, duration, weight, caloriesLost, logDate	) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../PAGES/exerciseCaloriesWebPage.php?error=sqlerror'insert'");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "isidis", $userID, $exerciseType, $exerciseDuration, $userWeight, $userCaloriesBurned, $date);
        mysqli_stmt_execute($stmt);
        header("Location: ../PAGES/exerciseCaloriesWebPage.php?success=exerciseadded");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
};
