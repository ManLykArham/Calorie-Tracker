function validateInputs(exType, exDuration, usrWeight) {

    //console.log(exType.length, exDuration, usrWeight);


    const regexString = /^[a-zA-Z]+$/;
    const regexNumbers = /^[0-9]+$/;
    const regexWeight = /^([1-9]\d*)(.\d+)?$/;

    const testType = regexString.test(exType);
    const testDuration = regexNumbers.test(exDuration);
    const testWeight = regexWeight.test(usrWeight);

    if (!testType) {
        alert("Type a proper exercise");
    } else if (!testDuration) {
        alert("Type a proper duration");
    } else if (!testWeight) {
        alert("Type a proper user weight");
    } else if (testType && testDuration && testWeight) {
        return true;
    } else {
        alert("Please try again");
        location.reload();
    }
}

function launchDelScript() {

    var deleteScript = document.createElement('script');
    deleteScript.src = '../JS/deleteEx.js';
    document.body.appendChild(deleteScript);

}

function hmlRequest(exType, exDuration, usrWeight, date, trackBttn) {
    let exercise = {
        "type": exType,
        "duration": exDuration,
        "weight": usrWeight,
        "date": date,
        "trackCaloriesButton": trackBttn
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
                // launchDelScript();
                console.log("del script");
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
    const trackBttn = document.getElementById('trackCalBttnID')


    if (validateInputs(exType, exDuration, usrWeight) == true) {
        hmlRequest(exType, exDuration, usrWeight, date, trackBttn);
    }
})