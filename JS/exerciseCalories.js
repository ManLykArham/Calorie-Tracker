function addExerciseToList() {
    console.log("ded")
        //Adding a 'click' event listener to trackButton
    const exerciseType = document.getElementById("etID").value;
    const exerciseDuration = document.getElementById("edID").value;
    const userWeight = document.getElementById("uwID").value;
    const caloriesBurned = document.getElementById("cbID").value;

    const container = document.getElementById("trackedCalContDiv");

    const trackedCaloriesList = document.createElement("div");
    trackedCaloriesList.classList.add("trackedCalories");
    trackedCaloriesList.innerHTML =
        `<ul class="trackedCalories">
                <li>
                    <label for="storedExerciseType">Exercise type:</label>
                    <input name="storedExerciseType" class="exerciseTypeInput" value="${exerciseType}" readonly>
                </li>
                <li>
                    <label for="storedExerciseDuration">Duration (mins):</label>
                    <input name="storedExerciseDuration" class="exerciseDurationInput" value="${exerciseDuration}" readonly>
                </li>
                <li>
                    <label for="storedUserWeight">Weight (pounds):</label>
                    <input name="storedUserWeight" class="userWeightInput" value="${userWeight}" readonly>
                </li>
                <li>
                    <label for="storedCaloriesBurned">Calories Burned (kcal):</label>
                    <input name="storedCaloriesBurned" class="caloriesBurnedInput" value="${caloriesBurned}" readonly>
                </li>
                <li>
                    <button class="trackCaloriesButton" name="deleteExercise">Delete</button>
                </li>
            </ul>`
    container.appendChild(trackedCaloriesList);
}

const trackButton = document.getElementById("trackCalBttnID");

trackButton.addEventListener("click", addExerciseToList);