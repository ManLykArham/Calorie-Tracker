<?php

if (isset($_POST['signup-bttn'])) {

    require '../PHP/dbConnection.php';

    $userName = $_POST['userName'];
    $userSurname = $_POST['userSurname'];
    $userEmail = $_POST['userEmail-SU'];
    $userPassword = $_POST['userPassword-SU'];

    //Checking wether all fields are empty or not
    if (empty($userName) || empty($userSurname) || empty($userEmail) || empty($userPassword)) {
        header("Location: ../PAGES/registerWebPage.php?error=emptyfields");
        exit();
    } elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../PAGES/registerWebPage.php?error=invalidemail");
        exit();
    } elseif (!preg_match("/^[a-zA-Z]*$/", $userName)) {
        header("Location: ../PAGES/registerWebPage.php?error=invalidusername");
        exit();
    } elseif (!preg_match("/^[a-zA-Z]*$/", $userSurname)) {
        header("Location: ../PAGES/registerWebPage.php?error=invalidusersurname");
        exit();
    } else { //if validation successful...
        $sql = "SELECT name FROM userinfo WHERE name=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../PAGES/registerWebPage.php?error=sqlerror'select'");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../PAGES/registerWebPage.php?error=usertaken&email");
                exit();
            } else {
                $sql = "INSERT INTO userinfo (name, surname, email, password) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../PAGES/registerWebPage.php?error=sqlerror'insert'");
                    exit();
                } else {
                    $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssss", $userName, $userSurname, $userEmail, $hashedPassword);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../PAGES/registerWebPage.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../PAGES/registerWebPage.php");
    exit();
}
