<?php

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $exercise = json_decode($data, true);
    echo json_encode($exercise);
}



if (isset($_POST)) {

    require '../PHP/exCalDatabase.php';

    $data = file_get_contents("php://input");
    $exercise = json_decode($data, true);

    $exerciseType = $exercise["type"];
    $exerciseDuration = $exercise["duration"];
    $exerciseDurationInHours = $exerciseDuration / 60;
    $userWeight = $exercise["weight"];
    $date = $exercise["date"];
    $caloriesBurned = 0;

    $apiKey = 'uqvXuwvG+dMRJNNvCK/eDw==MSB3hIFeNEbBSWx3';

    $url = "https://api.api-ninjas.com/v1/caloriesburned?activity=" . urlencode($exerciseType) . "&weight=" . urlencode($userWeight);

    $cURL = curl_init();

    curl_setopt($cURL, CURLOPT_URL, $url);
    curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
        'X-Api-Key:' . $apiKey,
        'Content-Type: application/json'
    ));
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($cURL);

    if ($e = curl_error($cURL)) {
        echo $e;
    } else {
        $decoded = json_decode($resp, true);
        $caloriesburned = $decoded["0"]["calories_per_hour"];
        $userBurnedCalories = $caloriesburned * $exerciseDurationInHours;
        //echo $userburnedcalories; //Returning $userburnedCalories, to change state, to then update the caloriesBurned variable in JS
        storeVariables($exerciseType, $exerciseDuration, $userWeight, $date, $userBurnedCalories);
    }

    curl_close($cURL);
} else {
    header("Location: exerciseCaloriesWebPage.php?error=request_method");
    echo "Submission Unsuccessful :(";
};
