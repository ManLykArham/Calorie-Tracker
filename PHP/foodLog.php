<?php


if (isset($_POST['trackFoodButton'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") { //If the POST was submitted/successful ...

        require '../PHP/insertFoodDatabase.php';

        $cURL = curl_init();

        $foodName = $_POST['foodName'];
        $foodAmount = $_POST['foodAmount'];
        $food = $foodAmount . "g" . " " . $foodName;
        $date = $_POST['dateLog'];
        $caloriesIN = 0;

        $apiKey = 'uqvXuwvG+dMRJNNvCK/eDw==MSB3hIFeNEbBSWx3';

        $url = "https://api.api-ninjas.com/v1/nutrition?query=" . urlencode($food);

        curl_setopt($cURL, CURLOPT_URL, $url); //Method to fetch the desired url
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
            //Allows to validate the apiKey, to access the url
            'X-Api-Key:' . $apiKey,
            'Content-Type: application/json'
        )
        );
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true); //Makes the data more readable

        $resp = curl_exec($cURL);

        if ($e = curl_error($cURL)) { //Error handling
            echo $e;
        } else {
            $decoded = json_decode($resp, true);
            $totalCalories = 0;
            foreach ($decoded as $foodItem) {
                $totalCalories += $foodItem["calories"];
            }
            // header("Location: ../HTML/foodLogWebPage.php?success=getrequest");
            //print_r("Total Calories: " . $totalCalories);
            storeVariablesFood($foodName, $foodAmount, $totalCalories, $date);

        }

        curl_close($cURL);
    } else {

        header("Location: ../PAGES/foodLogWebPage.php?error=trackbutton");
        echo '<script type="text/javascript"> window.onload = function () { alert("Submission Unsuccessful :("); } </script>';
    }
}
 else {
    header("Location: ../PAGES/foodLogWebPage.php?error=request_method");
    '<script type="text/javascript"> window. onload = function () { alert("Submission Unsuccessful :("); } </script>';
}
