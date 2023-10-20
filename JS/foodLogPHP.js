
// Your JavaScript code that creates and modifies elements goes here
document.getElementById('showMealBttn').addEventListener('click', function (e) {
    e.preventDefault();

    const showDate = document.getElementById('showLogID').value;

    // Make an AJAX request to fetch exercise data
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../PHP/showFoodLog.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const foodData = JSON.parse(xhr.responseText);
            displayFoodLogData(foodData);
        }
    };

    const data = `showLog=${showDate}&showMealButton=1`;
    xhr.send(data);
});
window.addEventListener('load', function (e) {
    e.preventDefault();

    const showDate = document.getElementById('showLogID').value;

    // Make an AJAX request to fetch exercise data
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../PHP/showFoodLog.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const foodData = JSON.parse(xhr.responseText);
            console.log("hello");
            displayFoodLogData(foodData);
        }
    };

    const data = `showLog=${showDate}&showMealButton=1`;
    xhr.send(data);
});


function displayFoodLogData(foodData) {
    const container = document.getElementById('trackedFoodContDiv');
    container.innerHTML = ''; // Clear existing data

    if (foodData.length === 0) {
        container.innerHTML = '<div class="noLogTextContainer"><p class="noLogText">There are no meals logged in for this day :)</p></div>';
    } else {
        foodData.forEach(function (food) {
            const trackedFoodList = document.createElement('ul');
            trackedFoodList.classList.add('trackedList');
            trackedFoodList.innerHTML = `

                <div class="individualListContainer">
                <li class="listItem">
                    <label for="storedMealTime">
                        <p>Time:</p>
                    </label>
                    <input type="time" name="storedMealTime" value="${food.logTime}" readonly>
                </li>
                <li class="listItem">
                    <label for="storedMealName">
                        <p>Food Name:</p>
                    </label>
                    <input type="text" name="storedMealName" value="${food.mealName}" readonly>
                </li>
                <li class="listItem">
                    <label for="storedAmount">
                        <p>Amount (grams):</p>
                    </label>
                    <input type="text" name="storedAmount" value="${food.amountGrams}" readonly>
                </li>
                <li class="listItem">
                    <label for="storedCaloriesBurned">
                        <p>Calories Gained (kcal):</p>
                    </label>
                    <input type="text" name="storedCaloriesGained" value="${food.caloriesGained}" readonly>
                </li>
                <li class="listItem">
                    <input type="hidden" name="foodLogID" value="${food.foodLogID}">
                    <button class="deleteButton" name="deleteMeal">Delete</button>
                </li>
            </div>
            `;
            container.appendChild(trackedFoodList);
        });
    }
};




//----------------------------------------------------------------------------------------------



// document.getElementById('exDateID').valueAsDate = new Date();
// document.getElementById('exShowDateID').valueAsDate = new Date();


// function addExerciseToList(e) {
//     e.preventDefault();

//     const exerciseType = document.getElementById("etID").value;
//     const exerciseDuration = document.getElementById("edID").value;
//     const userWeight = document.getElementById("uwID").value;

//     // Make an AJAX request to your PHP script
//     //Step 1: Open request to end data to the php file
//     const xhr = new XMLHttpRequest();
//     xhr.open("POST", "../PHP/exerciseCalories.php", true);
//     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

//     //Step 3: Once the api request is complete, the state will change, therefore it will update the caloriesBurned(jsVariable)
//     //to the $userCaloriesBurned value, which will then be used to populate the storedTrackList
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState === 4 && xhr.status === 200) {
//             const caloriesBurned = xhr.responseText; // Retrieve the calories burned from the response
//             updateCaloriesList(exerciseType, exerciseDuration, userWeight, caloriesBurned);
//         }
//     };

//     // Send the request with the exercise details
//     //Step 2: Send the data that will be used to run the api and get the userCaloriesBurned value
//     const data = `exerciseType=${exerciseType}&exerciseDuration=${exerciseDuration}&userWeight=${userWeight}`;
//     xhr.send(data);
// }

// function updateCaloriesList(exerciseType, exerciseDuration, userWeight, caloriesBurned) {
//     const container = document.getElementById("trackedCalContDiv");

//     const trackedCaloriesList = document.createElement("div");
//     trackedCaloriesList.classList.add("trackedCalories");
//     trackedCaloriesList.innerHTML = `
//         <ul class="trackedCalories">
//             <li>
//                 <label for="storedExerciseType">Exercise type:</label>
//                 <input name="storedExerciseType" class="exerciseTypeInput" value="${exerciseType}" readonly>
//             </li>
//             <li>
//                 <label for="storedExerciseDuration">Duration (mins):</label>
//                 <input name="storedExerciseDuration" class="exerciseDurationInput" value="${exerciseDuration}" readonly>
//             </li>
//             <li>
//                 <label for="storedUserWeight">Weight (pounds):</label>
//                 <input name="storedUserWeight" class="userWeightInput" value="${userWeight}" readonly>
//             </li>
//             <li>
//                 <label for="storedCaloriesBurned">Calories Burned (kcal):</label>
//                 <input name="storedCaloriesBurned" class="caloriesBurnedInput" value="${caloriesBurned}" readonly>
//             </li>
//             <li>
//                 <button class="trackCaloriesButton" name="deleteExercise">Delete</button>
//             </li>
//         </ul>`;

//     container.appendChild(trackedCaloriesList);
// }


// // const trackButton = document.getElementById("trackCalBttnID");

// // trackButton.addEventListener("click", addExerciseToList);