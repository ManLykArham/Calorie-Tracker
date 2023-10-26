<?php

require '../PHP/dbConnection.php';
session_start();
$userID = $_SESSION['userID'];
$currDate = date('Y-m-d');

$sql = "SELECT caloriesLost FROM exercisetype WHERE userID = ? AND logDate = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: dashboardWebPage.php?error=sqlerror-select");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "is", $userID, $currDate);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $exerciseData = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $exerciseData[] = $row;
    }

    echo json_encode($exerciseData, true);
}
