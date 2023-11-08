function validateMealInputs(mealName, mealAmount) {

    //console.log(exType.length, exDuration, usrWeight);


    const regexString = /^[a-zA-Z\s]+$/;
    const regexDecimalNumber = /^([1-9]\d*)(.\d+)?$/;

    console.log(typeof mealName);
    const testName = regexString.test(mealName);
    console.log("testMealName = " + testName);
    const testAmount = regexDecimalNumber.test(mealAmount);

    if (!testName) {
        alert("Type a proper meal name :)");
    } else if (!testAmount) {
        alert("Type a proper meal amount :)");
    } else if (mealAmount > 999.99) {
        alert("Maximum amount: 999.99 grams");
    } else if (testName && testAmount) {
        return true;
    } else {
        alert("Please try again");
        location.reload();
    }
}

async function fetchRequestToAPIMeal(mealName, mealAmount, date) {
    let food = mealAmount + "g " + "" + mealName;
    let caloriesGained;
    console.log(food);

    const apiKey = 'uqvXuwvG+dMRJNNvCK/eDw==MSB3hIFeNEbBSWx3';
    const url = "https://api.api-ninjas.com/v1/nutrition?query=" + food;
    try {
        const response = await fetch(url, {
            method: "GET",
            headers: {
                "X-Api-Key": apiKey,
            }
        });
        if (response.status === 302) {
            console.log("302");
            alert("Status Error: Meal Not found, please try again")
        } else if (response.status === 200) {
            const data = await response.json();
            let totalCalories = 0;
            data.forEach(foodItem => {
                totalCalories += foodItem.calories;
            });
            return mealHMLRequest(mealName, mealAmount, totalCalories, date);

        }
    } catch (error) {
        console.error("Error: ", error);
        throw error;
    }
}

function mealHMLRequest(mealName, mealAmount, caloriesGained, date) {
    let meal = {
        "name": mealName,
        "amount": mealAmount,
        "date": date,
        "caloriesGained": caloriesGained
    }

    fetch("../PHP/foodLog.php", {
            "method": "POST",
            "headers": {
                "Content-Type": "application/json;"
            },
            "body": JSON.stringify(meal)
        })
        .then(response => response.text())
        .then(() => {
            var mealScript = document.createElement('script');
            mealScript.src = '../JS/foodLogPHP.js'; // Replace with the actual path to your exerciseCalories.js file
            mealScript.type = 'text/javascript';

            mealScript.onload = function() {
                loadMealData();
            };
            document.head.appendChild(mealScript);
        })
        .catch(error => console.error("Error:", error));
}

document.getElementById('trackFoodBttnID').addEventListener("click", function(e) {
    e.preventDefault();

    const mealName = document.getElementById('mealName').value;
    const mealAmount = document.getElementById('mealAmount').value;
    const date = document.getElementById('mealDateID').value;
    //const trackBttn = document.getElementById('trackFoodBttnID')


    if (validateMealInputs(mealName, mealAmount) == true) {
        fetchRequestToAPIMeal(mealName, mealAmount, date);
    }
})