<?php

// if (isset($_POST)) {
//     $data = file_get_contents("php://input");
//     $buttonData = json_decode($data, true);
//     echo $buttonData["resetButton"];
// }

require '../PHP/dbConnection.php';
session_start();
$userID = $_SESSION['userID'];

$data = file_get_contents("php://input");
$buttonData = json_decode($data, true);
if (!isset($buttonData["logOutButton"])) {
    $buttonData["logOutButton"] = 0;
}
if (!isset($buttonData["deleteAccountButton"])) {
    $buttonData["deleteAccountButton"] = 0;
}
if (!isset($buttonData["resetButton"])) {
    $buttonData["resetButton"] = 0;
}

$logOutButton = $buttonData["logOutButton"];
$deleteAccountButton = $buttonData["deleteAccountButton"];
$resetDataButton = $buttonData["resetButton"];

if ($logOutButton == 1) {
    session_unset();
    session_destroy();
    //header("Location: ../PAGES/registerWebPage.php?success=logout");
    echo json_encode(["success" => "logout"]);
} elseif ($resetDataButton == 1) {

    $sql = "DELETE FROM exerciseType WHERE userID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("Location: ../PAGES/settingWebPage.php?error=sqlerror");
        echo json_encode(["error" => "resetExercise"]);
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "DELETE FROM foodLog WHERE userID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("Location: ../PAGES/settingWebPage.php?error=sqlerror");
        echo json_encode(["error" => "resetFood"]);
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $sql = "DELETE FROM userstat WHERE userID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("Location: ../PAGES/settingWebPage.php?error=sqlerror");
        echo json_encode(["error" => "resetStat"]);
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    echo json_encode(["success" => "dataReset"]);
    exit();
} elseif ($deleteAccountButton == 1) {
    $sql = "DELETE FROM userinfo WHERE userID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("Location: ../PAGES/settingWebPage.php?error=sqlerror");
        echo json_encode(["error" => "delAccount"]);
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    //header("Location: ../PAGES/registerWebPage.php?success=useraccountdeleted");
    echo json_encode(["success" => "accDelete"]);

    exit();
}
mysqli_close($conn);
