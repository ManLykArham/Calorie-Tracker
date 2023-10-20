<?php
if (isset($_POST['deleteExercise'])) {

    require '../PHP/dbConnection.php';
    session_start();
    $userID = $_SESSION['userID'];

    $exerciseID = $_POST['exerciseID'];

    $sql = "DELETE FROM exercisetype WHERE exerciseID = ? AND userID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../PAGES/exerciseCaloriesWebPage.php?error=sqlerrordelete");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ii", $exerciseID, $userID);
        mysqli_stmt_execute($stmt);
        header("Location: ../PAGES/exerciseCaloriesWebPage.php?sucess=exercisedeleted");
        exit();
    }
}
