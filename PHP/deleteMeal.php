<?php
if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $meal = json_decode($data, true);
    echo $mealID = $meal["mealID"];
    deleteMealVariables($mealID);
} else {
    echo "POST Request Failed.";
}


function deleteMealVariables($mealID)
{

    require '../PHP/dbConnection.php';
    session_start();
    $userID = $_SESSION['userID'];

    $foodLogID = $mealID;

    $sql = "DELETE FROM foodlog WHERE foodLogID = ? AND userID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../PAGES/foodLogWebPage.php?error=sqlerrordelete");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ii", $foodLogID, $userID);
        mysqli_stmt_execute($stmt);
        header("Location: ../PAGES/foodLogWebPage.php?sucess=mealdeleted");
        exit();
    }
}
