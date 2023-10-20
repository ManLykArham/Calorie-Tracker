<?php

require '../PHP/dbConnection.php';
session_start();
$userID = $_SESSION['userID'];

if (isset($_POST['resetBttn'])) {
    $confirmPassword = $_POST['confirmPasswrd'];
    $newPassword = $_POST['newPasswrd'];
    $confirmNewPassword = $_POST['confirmNewPasswrd'];

    if (empty($confirmPassword) || empty($newPassword) || empty($confirmNewPassword)) {
        header("Location: ../PAGES/settingRPWebPage.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT password FROM userinfo WHERE UserID = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../PAGES/settingRPWebPage.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "i", $userID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $confirmPasswordCheck = password_verify($confirmPassword, $row['password']);
                if ($confirmPasswordCheck == false) {
                    header("Location: ../PAGES/settingRPWebPage.php?error=confirmpassword-wrong");
                    exit();
                } elseif ($confirmPasswordCheck == true) {
                    if ($newPassword !== $confirmNewPassword) {
                        header("Location: ../PAGES/settingRPWebPage.php?error=confirmnewpassword-wrong");
                        exit();
                    } elseif ($newPassword == $confirmNewPassword) {
                        $sql = "UPDATE userinfo SET password = ? WHERE userID = ?;";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../PAGES/settingRPWebPage.php?error=sqlerror");
                            exit();
                        } else {
                            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                            mysqli_stmt_bind_param($stmt, "si", $hashedPassword, $userID);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            header("Location: ../PAGES/settingRPWebPage.php?success=passwordupdated");
                            exit();
                        }
                    } else {
                        header("Location: ../PAGES/settingRPWebPage.php?error=pleasetryagain-cnp");
                        exit();
                    }
                } else {
                    header("Location: ../PAGES/settingRPWebPage.php?error=pleasetryagain-cp");
                    exit();
                }
            } else {
                header("Location: ../PAGES/settingRPWebPage.php?error=no-user");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
