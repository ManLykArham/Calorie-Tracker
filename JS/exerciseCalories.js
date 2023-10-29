// Your JavaScript code that creates and modifies elements goes here
document.getElementById('showExercisesBttn').addEventListener('click', function(e) {
    e.preventDefault();

    const showDate = document.getElementById('exShowDateID').value;

    // Make an AJAX request to fetch exercise data
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../PHP/showExercise.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const exerciseData = JSON.parse(xhr.responseText);
            displayExerciseData(exerciseData);
        }
    };

    const data = `showDate=${showDate}&showExerciseButton=1`;
    xhr.send(data);
});

window.addEventListener('load', function(e) {
    e.preventDefault();

    const showDate = document.getElementById('exShowDateID').value;

    // Make an AJAX request to fetch exercise data
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../PHP/showExercise.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const exerciseData = JSON.parse(xhr.responseText);
            displayExerciseData(exerciseData);
        }
    };


    const data = `showDate=${showDate}&showExerciseButton=1`;
    xhr.send(data);
});

function loadData() {
    getData();
}

function getData() {
    const showDate = document.getElementById('exShowDateID').value;

    // Make an AJAX request to fetch exercise data
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../PHP/showExercise.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const exerciseData = JSON.parse(xhr.responseText);
            displayExerciseData(exerciseData);
        }
    };
    const data = `showDate=${showDate}&showExerciseButton=1`;
    xhr.send(data);
}


function displayExerciseData(exerciseData) {
    const container = document.getElementById('trackedCalContDiv');
    container.innerHTML = ''; // Clear existing data

    if (exerciseData.length === 0) {
        container.innerHTML = '<div class="noExerciseTextContainer"><p class="noExercisesText">There are no exercises for this day :)</p></div>';
    } else {
        exerciseData.forEach(function(exercise) {
            const trackedCaloriesList = document.createElement('ul');
            trackedCaloriesList.classList.add('trackedList');
            trackedCaloriesList.innerHTML = `

                        <div class="individualListContainer">
                            <li class="listItem">
                                <label for="storedExerciseType">
                                    <p>Exercise type:</p>
                                </label>
                                <input type="text" name="storedExerciseType" class="exerciseTypeInput" value="${exercise.exerciseType}" readonly>
                            </li>
                            <li class="listItem">
                                <label for="storedExerciseDuration">
                                    <p>Duration (mins):</p>
                                </label>
                                <input type="text" name="storedExerciseDuration" class="exerciseDurationInput" value="${exercise.duration}" readonly>
                            </li>
                            <li class="listItem">
                                <label for="storedUserWeight">
                                    <p>Weight (pounds):</p>
                                </label>
                                <input type="text" name="storedUserWeight" class="userWeightInput" value="${exercise.weight}" readonly>
                            </li>
                            <li class="listItem">
                                <label for="storedCaloriesBurned">
                                    <p>Calories Burned (kcal):</p>
                                </label>
                                <input type="text" name="storedCaloriesBurned" class="caloriesBurnedInput" value="${exercise.caloriesLost}" readonly>
                            </li>
                            <li class="listItem">
                                <input type="hidden" id="exerID" name="exerciseID" value="${exercise.exerciseID}">
                                <button class="deleteButton" id="deleteExBttn" name="deleteExercise">Delete</button>
                            </li>
                        </div>
            `;

            container.appendChild(trackedCaloriesList);
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