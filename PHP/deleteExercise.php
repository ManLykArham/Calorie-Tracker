<?php
if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $exercise = json_decode($data, true);
    $exerciseID = $exercise["exerID"];
    deleteVariables($exerciseID);
} else {
    echo "POST Request Failed.";
}


function deleteVariables($exerciseID)
{
    require '../PHP/dbConnection.php';

    session_start();
    $userID = $_SESSION['userID'];
    //$exerciseID = $_POST['exerID'];
    $successDelete = "exercise deleted";

    $sql = "DELETE FROM exercisetype WHERE exerciseID = ? AND userID = ?";
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../PAGES/exerciseCaloriesWebPage.php?error=sqlerrordelete");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ii", $exerciseID, $userID);
        mysqli_stmt_execute($stmt);
        echo $successDelete;
    }
}
