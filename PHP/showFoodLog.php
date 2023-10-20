<?php

require '../PHP/dbConnection.php';
session_start();
$userID = $_SESSION['userID'];
$showLog = $_POST['showLog'];

$sql = "SELECT foodLogID, mealName, amountGrams, caloriesGained, logTime FROM foodlog WHERE userID=? AND logDate = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: foodLogWebPage.php?error=sqlerror-select");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "is", $userID, $showLog);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $foodLogData = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $foodLogData[] = $row;
    }

    echo json_encode($foodLogData, true);
}