<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //If the POST was submitted/successful ...
    if (isset($_POST['trackCaloriesButton'])) {

        $cURL = curl_init();

        $exerciseType = $_POST['exerciseType'];
        $exerciseDuration = $_POST['exerciseDuration'];
        $exerciseDurationInHours = $exerciseDuration / 60;
        $userWeight = $_POST['userWeight'];
        $caloriesBurned = 0;

        $apiKey = 'uqvXuwvG+dMRJNNvCK/eDw==MSB3hIFeNEbBSWx3';

        $url = "https://api.api-ninjas.com/v1/caloriesburned?activity=" .  urlencode($exerciseType) . "&weight=" . urlencode($userWeight);

        curl_setopt($cURL, CURLOPT_URL, $url); //Method to fetch the desired url
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array( //Allows to validate the apiKey, to access the url
            'X-Api-Key:' . $apiKey,
            'Content-Type: application/json'
        ));
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true); //Makes the data more readable

        $resp = curl_exec($cURL);

        if ($e = curl_error($cURL)) { //Error handling
            echo $e;
        } else {
            $decoded = json_decode($resp, true);
            $caloriesburned = $decoded["0"]["calories_per_hour"];
            $userburnedcalories = $caloriesburned * $exerciseDurationInHours;
            header("Location: ../PAGES/exerciseCaloriesWebPage.php?success=getrequest");
        }

        curl_close($cURL);
    } else {

        header("Location: ../PAGES/exerciseCaloriesWebPage.php?error=trackbutton");
        echo '<script type="text/javascript"> window.onload = function () { alert("Submission Unsuccessful :("); } </script>';
    }
} else {
    header("Location: exerciseCaloriesWebPage.php?error=request_method");
    '<script type="text/javascript"> window. onload = function () { alert("Submission Unsuccessful :("); } </script>';
}
