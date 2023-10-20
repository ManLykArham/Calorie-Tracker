<?php
// Include your database connection logic here
require '../PHP/dbConnection.php';

function getTodaysCalories($pdo, $userID)
{
    // Get the current date (assuming your log_date is stored as a DATE)
    $currentDate = date("Y-m-d");

    // Calculate total calories gained from foodLog for the current day
    $sqlCaloriesGained = "SELECT IFNULL(SUM(caloriesGained), 0) as total_calories_gained FROM foodlog WHERE userID = :userId AND DATE(logTime) = :currentDate";
    $statement = $pdo->prepare($sqlCaloriesGained);
    $statement->execute(array(':userId' => $userID, ':currentDate' => $currentDate));
    $rowCaloriesGained = $statement->fetch();
    $totalCaloriesGained = $rowCaloriesGained['total_calories_gained'];

    // Calculate total calories lost from exerciseType for the current day
    $sqlCaloriesLost = "SELECT IFNULL(SUM(caloriesLost), 0) as total_calories_lost FROM exercisetype WHERE userID = :userId AND DATE(logDate) = :currentDate";
    $statement = $pdo->prepare($sqlCaloriesLost);
    $statement->execute(array(':userId' => $userID, ':currentDate' => $currentDate));
    $rowCaloriesLost = $statement->fetch();
    $totalCaloriesLost = $rowCaloriesLost['total_calories_lost'];

    return [
        'caloriesGained' => $totalCaloriesGained,
        'caloriesLost' => $totalCaloriesLost,
    ];
}
