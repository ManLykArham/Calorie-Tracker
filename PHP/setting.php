<?php

require '../PHP/dbConnection.php';
session_start();
$userID = $_SESSION['userID'];

if (isset($_POST['logoutBttn'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../PAGES/registerWebPage.php?success=logout");
} elseif (isset($_POST['resetDataBttn'])) {

    $sql = "DELETE FROM exerciseType WHERE userID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../PAGES/settingWebPage.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "DELETE FROM foodLog WHERE userID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../PAGES/settingWebPage.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "DELETE FROM userstat WHERE userID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../PAGES/settingWebPage.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    header("Location: ../PAGES/settingWebPage.php?success=userdatareset");
    exit();
} elseif (isset($_POST['delAccount'])) {
    $sql = "DELETE FROM userinfo WHERE userID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../PAGES/settingWebPage.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    header("Location: ../PAGES/registerWebPage.php?success=useraccountdeleted");
    exit();
}
