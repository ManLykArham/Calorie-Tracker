<?php

if ((isset($_POST['login-bttn']))) {

    require '../PHP/dbConnection.php';

    $email = $_POST['userEmail-SI'];
    $password = $_POST['userPassword-SI'];

    if (empty($email) || empty($password)) {
        header("Location: ../PAGES/registerWebPage.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM userinfo WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../PAGES/registerWebPage.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passwordCheck = password_verify($password, $row['password']);
                if ($passwordCheck == false) {
                    header("Location: ../PAGES/registerWebPage.php?error=wrongpassword");
                    exit();
                } elseif ($passwordCheck == true) {
                    session_start();
                    $_SESSION['userid'] = $row['UserID'];
                    header("Location: ../PAGES/dashboardWebPage.php?login=success");
                    exit();
                } else {
                    header("Location: ../PAGES/registerWebPage.php?error=wrongpassword");
                    exit();
                }
            } else {
                header("Location: ../PAGES/registerWebPage.php?error=no-user");
                exit();
            }
        }
    }
} else {
    header("Location: ../PAGES/registerWebPage.php");
    exit();
}
