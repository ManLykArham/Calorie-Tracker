<?php
if (isset($_POST['deleteMeal'])) {

    require '../PHP/dbConnection.php';
    session_start();
    $userID = $_SESSION['userID'];

    $foodLogID = $_POST['foodLogID'];

    $sql = "DELETE FROM foodlog WHERE foodLogID = ? AND userID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../PAGES/foodLogWebPage.php?error=sqlerrordelete");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ii", $foodLogID, $userID);
        mysqli_stmt_execute($stmt);
        header("Location: ../PAGES/foodLogWebPage.php?sucess=mealdeleted");
        exit();
    }
}