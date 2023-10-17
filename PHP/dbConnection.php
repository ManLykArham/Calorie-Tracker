<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "caloriecounter";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection Filed: " . mysqli_connect_error());
}
