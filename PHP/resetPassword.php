<?php

// if (isset($_POST)) {
//     $data = file_get_contents("php://input");
//     $newData = json_decode($data, true);
//     echo json_encode($newData["newPassword"]);
// }
if (isset($_POST)) {

    $data = file_get_contents("php://input");
    $newData = json_decode($data, true);
    $newPassword = $newData['newPassword'];
    $newSalt = $newData['newSalt'];
    $newSaltEncoded = json_encode($newSalt);
 //echo json_encode($newPassword);

    require '../PHP/dbConnection.php';
    session_start();
    $userID = $_SESSION['userID'];

    $sql = "UPDATE userinfo SET password = ?, salt = ? WHERE userID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo json_encode(["error" => "sqlError"]);
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ssi", $newPassword, $newSaltEncoded, $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        echo json_encode(["success" => "passwordUpdated"]);
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo json_encode(["error" => "fetchPOSTerror"]);
    exit();
}
