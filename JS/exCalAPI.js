function validateInputs(exType, exDuration, usrWeight) {

    //console.log(exType.length, exDuration, usrWeight);
    const regexString = /^[a-zA-Z\s,]+$/;
    const regexNumbers = /^[0-9]+$/;
    const regexWeight = /^([1-9]\d*)(.\d+)?$/;

    const testType = regexString.test(exType);
    const testDuration = regexNumbers.test(exDuration);
    const testWeight = regexWeight.test(usrWeight);

    if (!testType) {
        alert("Type a proper exercise");
    } else if (!testDuration) {
        alert("Type a proper duration");
    } else if (exDuration > 1000) {
        alert("Maximum duration: 1000 mins");
    } else if (!testWeight || usrWeight > 400) {
        alert("Type a proper user weight");
    } else if (usrWeight > 400) {
        alert("Maximum weight: 400 lbs");
    } else if (testType && testDuration && testWeight) {
        return true;
    } else {
        alert("Please try again");
        location.reload();
    }
}

// function launchDelScript() {
//     var deleteScript = document.createElement('script');
//     deleteScript.src = '../JS/deleteEx.js';
//     document.body.appendChild(deleteScript);

// }

async function fetchRequestToAPI(exType, exDuration, usrWeight, date) {

    const durationInHours = exDuration / 60;
    let caloriesBurned;

    const apiKey = 'uqvXuwvG+dMRJNNvCK/eDw==MSB3hIFeNEbBSWx3';
    const url = "https://api.api-ninjas.com/v1/caloriesburned?activity=" + exType + "&weight=" + usrWeight;
    try {
        const response = await fetch(url, {
            method: "GET",
            headers: {
                "X-Api-Key": apiKey,
            }
        });
        if (response.status === 302) {
            console.log("302");
            alert("Status Error: Exercise Not found, please try again")
        } else if (response.status === 200) {
            const data = await response.json();
            caloriesBurned = data[0].calories_per_hour;
            const userCaloriesBurned = caloriesBurned * durationInHours;
            return hmlRequest(exType, exDuration, usrWeight, date, userCaloriesBurned);

        }
    } catch (error) {
        console.error("Error: ", error);
        throw error;
    }
}

function hmlRequest(exType, exDuration, usrWeight, date, userCaloriesBurned) {
    let exercise = {
        "type": exType,
        "duration": exDuration,
        "weight": usrWeight,
        "date": date,
        "caloriesBurned": userCaloriesBurned
    }

    fetch("../PHP/exerciseCalories.php", {
            "method": "POST",
            "headers": {
                "Content-Type": "application/json;"
            },
            "body": JSON.stringify(exercise)
        })
        .then(response => response.text())
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

document.getElementById('trackCalBttnID').addEventListener("click", function(e) {
    e.preventDefault();

    const exType = document.getElementById('etID').value;
    const exDuration = document.getElementById('edID').value;
    const usrWeight = document.getElementById('uwID').value;
    const date = document.getElementById('exDateID').value;
    //const trackBttn = document.getElementById('trackCalBttnID')


    if (validateInputs(exType, exDuration, usrWeight) == true) {
        fetchRequestToAPI(exType, exDuration, usrWeight, date);
    }
})