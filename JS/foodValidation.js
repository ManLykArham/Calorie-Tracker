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
    } else if (testName && testAmount) {
        return true;
    } else {
        alert("Please try again");
        location.reload();
    }
}

function mealHMLRequest(mealName, mealAmount, date, trackBttn) {
    let meal = {
        "name": mealName,
        "amount": mealAmount,
        "date": date,
        "trackCaloriesButton": trackBttn
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
    const trackBttn = document.getElementById('trackFoodBttnID')


    if (validateMealInputs(mealName, mealAmount) == true) {
        mealHMLRequest(mealName, mealAmount, date, trackBttn);
    }
})