<?php
session_start();
$userID = $_SESSION['userID'];

require '../PHP/dbConnection.php';

$sql = "SELECT * FROM userinfo WHERE userID=?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo json_encode(["error" => "sqlError"]);
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $storedPassword = $row['password'];
        $storedSalt = $row['salt'];
        echo json_encode([
            "storedPassword" => $storedPassword,
            "storedSalt" => $storedSalt
        ]);
        exit();
    } else {
        echo json_encode(["error" => "noUser"]);
        exit();
    }
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
