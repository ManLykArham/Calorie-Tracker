<?php

function storeVariablesFood($foodName, $foodAmount, $caloriesGained, $date)
{
    require '../PHP/dbConnection.php';
    session_start();
    $userID = $_SESSION['userID'];

    $sql = "INSERT INTO foodlog (userID, mealName, amountGrams, caloriesGained, logTime	) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../PAGES/foodLogWebPage.php?error=sqlerror'insert'");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "isiis", $userID, $foodName, $foodAmount, $caloriesGained, $date);
        mysqli_stmt_execute($stmt);
        header("Location: ../PAGES/foodLogWebPage.php?success=mealadded");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
};