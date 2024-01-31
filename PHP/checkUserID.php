<?php
session_start();
$userID = $_SESSION['userID'];

if (!isset($userID)) {
    echo json_encode(["error" => "userID undefined"]);
} else {
    echo json_encode(["success" => $userID]);
};
