<?php

function storeVariablesFood($foodType, $foodName, $caloriesGained, $DATE)
{
    require '../PHP/dbConnection.php';
    session_start();
    $userID = $_SESSION['userID'];

    // Convert the date string to a Unix timestamp
    $timestamp = strtotime($DATE);

    // Extract and format the date
    $date = date('Y/m/d', $timestamp);

    // Extract and format the time
    $time = date('H:i', $timestamp);
    
    $sql = "INSERT INTO foodlog (userID, mealType, mealName, caloriesGained, logDate, logTime	) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../PAGES/foodLogWebPage.php?error=sqlerror'insert'");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ississ", $userID, $foodType, $foodName, $caloriesGained, $date, $time);
        mysqli_stmt_execute($stmt);
        header("Location: ../PAGES/foodLogWebPage.php?success=mealadded");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
;