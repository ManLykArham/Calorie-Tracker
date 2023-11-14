// const exercises = [
//     "Running",
//     "Cycling",
//     "Swimming",
//     "Weightlifting",
//     "Yoga",
//     "Skiing",
//     "Jumping Rope",
//     "Walking",
//     "Rowing",
//     "Hiking",
//     "Pilates",
//     "CrossFit",
//     "Zumba",
//     "Rock Climbing",
//     "Boxing",
//     "Dancing",
//     "Aerobics",
//     "Martial Arts (e.g., Karate, Taekwondo)",
//     "Paddleboarding",
//     "Surfing",
//     "checkingWhetherThisIsWorking"

// ];

// const apiKey = 'uqvXuwvG+dMRJNNvCK/eDw==MSB3hIFeNEbBSWx3';
// const url = "https://api.api-ninjas.com/v1/caloriesburned?activity=";

// async function checkExercisesInDatabase() {
//     const exercisesInDatabase = [];
//     const exercisesNotInDatabase = [];

//     for (const exercise of exercises) {
//         const response = await fetch(`${url}${exercise}`, {
//             method: "GET",
//             headers: {
//                 "X-Api-Key": apiKey,
//                 "Content-Type": "application/json",
//             },

//         });

//         if (response.status === 200) {
//             // Exercise is in the database
//             exercisesInDatabase.push(exercise);
//         } else {
//             // Exercise is not in the database
//             exercisesNotInDatabase.push(exercise);
//         }
//     }

//     console.log("Exercises in the database:", exercisesInDatabase);
//     console.log("Exercises not in the database:", exercisesNotInDatabase);
// }

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
        container.innerHTML = '<p class="noText">There are no exercises for this day :)</p>';
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

const exerciseInput = document.getElementById("etID");
const exerciseDropdown = document.getElementById("exerciseDropdown");

// Fetch exercise data from JSON file
async function fetchExerciseData() {
    try {
        const response = await fetch("../JSON/exerciseData.json");
        const data = await response.json();
        return data;
    } catch (error) {
        console.error("Error fetching exercise data:", error);
        return [];
    }
}

// Dummy exercise data for testing
// const exercisess = ["Running", "Cycling", "Swimming", "Weightlifting", "Yoga", "Skiing"];
// console.log(exercisess)


// Function to populate dropdown with exercise names
function populateDropdown(exercises) {
    exerciseDropdown.innerHTML = "";

    exercises.forEach(exercise => {
        const exerciseItem = document.createElement("div");
        exerciseItem.className = "exercise-dropdown-item";
        exerciseItem.textContent = exercise;

        exerciseItem.addEventListener("click", function() {
            exerciseInput.value = exercise;
            hideDropdown();
        });

        exerciseDropdown.appendChild(exerciseItem);
    });

    showDropdown();
}

// Function to show the dropdown
function showDropdown() {
    const inputRect = exerciseInput.getBoundingClientRect();
    exerciseDropdown.style.top = inputRect.bottom + "1000px";
    exerciseDropdown.style.left = inputRect.left + "1000px";
    exerciseDropdown.classList.add("show");
}

// Function to hide the dropdown
function hideDropdown() {
    exerciseDropdown.classList.remove("show");
}

// Function to update the dropdown based on user input
async function updateDropdown(filter) {
    fetchExerciseData().then(exercises => {
        const filteredExercises = exercises.filter(exercise =>
            exercise.toLowerCase().includes(filter.toLowerCase())
        );
        populateDropdown(filteredExercises);
    });
}

function checkInputNDDropdown(exerciseName) {
    fetchExerciseData().then(exercises => {
        const filteredExercises = exercises.filter(exercise =>
            exercise.toLowerCase().includes(filter.toLowerCase())
        );
    });
}

//Show list of exercises when plage loads 
window.addEventListener('load', function(e) {
    //checkExercisesInDatabase();
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

// Event listener for input changes
exerciseInput.addEventListener("input", function() {
    // Initial fetch and populate dropdown
    fetchExerciseData().then(exercises => {
        populateDropdown(exercises);
    });

    const filter = exerciseInput.value.toLowerCase();
    updateDropdown(filter);
});


exerciseInput.addEventListener("click", function() {
    // Initial fetch and populate dropdown
    fetchExerciseData().then(exercises => {
        populateDropdown(exercises);
    });
});

document.addEventListener("click", function(event) {
    if (!event.target.closest(".exercise-dropdown") && event.target !== exerciseInput) {
        const selectedExercise = exerciseInput.value;
        const dropdownExercises = Array.from(exerciseDropdown.children)
            .map(item => item.textContent);

        if (!dropdownExercises.includes(selectedExercise) && selectedExercise !== "") {
            exerciseInput.value = "";
            alert("Please select an exercise from the dropdown menu :)")
        }

        hideDropdown();
    }
});




// exerciseInput.addEventListener('click', function(e) {
//     e.preventDefault();
//     const exTypeList = document.getElementById("ulExType");
//     exTypeList.style.display = "flex";
// })

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