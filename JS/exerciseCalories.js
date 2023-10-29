//Show list of exercises when showButton is clicked
document.getElementById('showExercisesButtn').addEventListener('click', function(e) {
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

//Show list of exercises when plage loads 
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

//loadData() is referenced in foodValidation.js
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

//POST request being made to deleteExercise.php
function hmlRequest(exerciseID) {
    console.log("inside hmlrequest");
    let exercise = {
        "exerID": exerciseID
    }

    console.log(exercise);

    fetch("../PHP/deleteExercise.php", {
            "method": "POST",
            "headers": {
                "Content-Type": "application/json;"
            },
            "body": JSON.stringify(exercise)
        }).then((response) => {
            return response.text();
        }).then(newResponse => console.log(newResponse))
        .then(() => {
            var script = document.createElement('script');
            script.src = '../JS/exerciseCalories.js'; // Replace with the actual path to your exerciseCalories.js file
            script.type = 'text/javascript';

            script.onload = function() {
                loadData();
            };
            document.head.appendChild(script);
        })
        .catch(error => console.error("Error:", error));
}

//Populating exercises
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
            //When delete button is clicked POST request will be made to deleteExercise.php
            const deleteButton = trackedCaloriesList.querySelector('.deleteButton');
            deleteButton.addEventListener('click', function(e) {
                e.preventDefault();
                const exerciseID = exercise.exerciseID;
                hmlRequest(exerciseID);
            });

        });
    }
};