<?php

// if (isset($_POST)) {
//     $data = file_get_contents("php://input");
//     $meal = json_decode($data, true);
//     print_r($meal["name"]);
// }

if (isset($_POST)) {

    require '../PHP/insertFoodDatabase.php';

    $data = file_get_contents("php://input");
    $meal = json_decode($data, true);

    // echo $meal;

    $foodName = $meal["name"];
    $foodAmount = $meal["amount"];
    $date = $meal["date"];
    $caloriesGained = $meal["caloriesGained"];

    storeVariablesFood($foodName, $foodAmount, $caloriesGained, $date);
}
//     $cURL = curl_init();

//     $apiKey = 'uqvXuwvG+dMRJNNvCK/eDw==MSB3hIFeNEbBSWx3';

//     $url = "https://api.api-ninjas.com/v1/nutrition?query=" . urlencode($food);

//     curl_setopt($cURL, CURLOPT_URL, $url); //Method to fetch the desired url
//     curl_setopt(
//         $cURL,
//         CURLOPT_HTTPHEADER,
//         array(
//             //Allows to validate the apiKey, to access the url
//             'X-Api-Key:' . $apiKey,
//             'Content-Type: application/json'
//         )
//     );
//     curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true); //Makes the data more readable

//     $resp = curl_exec($cURL);

//     if ($e = curl_error($cURL)) { //Error handling
//         echo $e;
//     } else {
//         $decoded = json_decode($resp, true);
//         $totalCalories = 0;
//         foreach ($decoded as $foodItem) {
//             $totalCalories += $foodItem["calories"];
//         }
//         // header("Location: ../HTML/foodLogWebPage.php?success=getrequest");
//         //print_r("Total Calories: " . $totalCalories);
//         storeVariablesFood($foodName, $foodAmount, $totalCalories, $date);
//     }

//     curl_close($cURL);
// } else {
//     header("Location: ../PAGES/foodLogWebPage.php?error=request_method");
//     '<script type="text/javascript"> window. onload = function () { alert("Submission Unsuccessful :("); } </script>';
// }
