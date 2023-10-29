//Show list of meals when showButton is clicked
document.getElementById('showMealBttn').addEventListener('click', function(e) {
    e.preventDefault();

    const showDate = document.getElementById('showLogID').value;

    // Make an AJAX request to fetch exercise data
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../PHP/showFoodLog.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const foodData = JSON.parse(xhr.responseText);
            displayFoodLogData(foodData);
        }
    };

    const data = `showLog=${showDate}&showMealButton=1`;
    xhr.send(data);
});
//Show list of meals when plage loads 
window.addEventListener('load', function(e) {
    e.preventDefault();

    const showDate = document.getElementById('showLogID').value;

    // Make an AJAX request to fetch exercise data
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../PHP/showFoodLog.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const foodData = JSON.parse(xhr.responseText);
            displayFoodLogData(foodData);
        }
    };

    const data = `showLog=${showDate}&showMealButton=1`;
    xhr.send(data);
});

//loadData() is referenced in foodValidation.js
function loadMealData() {
    getMealData();
}

function getMealData() {
    const showDate = document.getElementById('showLogID').value;

    // Make an AJAX request to fetch exercise data
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../PHP/showFoodLog.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const foodData = JSON.parse(xhr.responseText);
            displayFoodLogData(foodData);
        }
    };

    const data = `showLog=${showDate}&showMealButton=1`;
    xhr.send(data);
}

//POST request being made to deleteMeal.php
function hmlRequest(mealID) {
    let meal = {
        "mealID": mealID
    }
    fetch("../PHP/deleteMeal.php", {
            "method": "POST",
            "headers": {
                "Content-Type": "application/json;"
            },
            "body": JSON.stringify(meal)
        }).then((response) => response.text())
        .then(() => {
            var script = document.createElement('script');
            script.src = '../JS/foodLogPHP.js'; // Replace with the actual path to your exerciseCalories.js file
            script.type = 'text/javascript';

            script.onload = function() {
                loadMealData();
            };
            document.head.appendChild(script);
        })
        .catch(error => console.error("Error:", error));
}

//Populating meals
function displayFoodLogData(foodData) {
    const container = document.getElementById('trackedFoodContDiv');
    container.innerHTML = ''; // Clear existing data

    if (foodData.length === 0) {
        container.innerHTML = '<div class="noLogTextContainer"><p class="noLogText">There are no meals logged in for this day :)</p></div>';
    } else {
        foodData.forEach(function(food) {
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
                    <input type="hidden" name="foodLogID" id="mealID" value="${food.foodLogID}">
                    <button class="deleteButton" id="deleteMealButton" name="deleteMeal">Delete</button>
                </li>
            </div>
            `;
            container.appendChild(trackedFoodList);
            //When delete button is clicked POST request will be made to deleteMeal.php
            const deleteButton = trackedFoodList.querySelector('.deleteButton');
            deleteButton.addEventListener('click', function(e) {
                e.preventDefault();
                const mealID = food.foodLogID;
                hmlRequest(mealID);
            });
        });
    }
};