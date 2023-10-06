<?php

// ... Rest of your PHP code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['exerciseType']) && isset($_POST['exerciseDuration']) && isset($_POST['userWeight'])) { // Checking whether the data has been recieved from xhr.send(data)
        $exerciseType = $_POST['exerciseType'];
        $exerciseDuration = $_POST['exerciseDuration'];
        $exerciseDurationInHours = $exerciseDuration / 60;
        $userWeight = $_POST['userWeight'];
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
            $userburnedcalories = $caloriesburned * $exerciseDurationInHours;
            echo $userburnedcalories; //Returning $userburnedCalories, to change state, to then update the caloriesBurned variable in JS
        }

        curl_close($cURL);
    } else {
        header("Location: ../PAGES/exerciseCaloriesWebPage.php?error=missing_params");
        echo '<script type="text/javascript"> window.onload = function () { alert("Submission Unsuccessful :("); } </script>';
    }
} else {
    header("Location: exerciseCaloriesWebPage.php?error=request_method");
    echo '<script type="text/javascript"> window.onload = function () { alert("Submission Unsuccessful :("); } </script>';
}
