<?php
session_start();
if (!isset($_SESSION['userID'])) {
    header("Location: ../PAGES/registerWebPage.php?error=signin");
    exit();
} else {
    // User is logged in, obtain $_SESSION['userID']
    $userID = $_SESSION['userID'];
    // Continue processing
}
