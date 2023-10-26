window.addEventListener('load', function(e) {
    e.preventDefault();
    const currDate = new Date();
    const year = currDate.getFullYear(); // Get the current year
    const month = String(currDate.getMonth() + 1).padStart(2, '0'); // Get the current month (adding 1 because months are 0-based), and ensure it's zero-padded
    const day = String(currDate.getDate()).padStart(2, '0'); // Get the current day of the month and ensure it's zero-padded
    const formattedDate = `${year}-${month}-${day}`;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../PHP/calLost.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const exerciseData = JSON.parse(xhr.responseText);
            console.log(exerciseData);
            displayCaloriesLost(exerciseData);
        }
    }

    const data = `todaysDate=${formattedDate}`;
    xhr.send(data);
})


function displayCaloriesLost(exerciseData) {
    const container = document.getElementById('caloriesLost');
    let totalCaloriesLost = 0;
    container.innerHTML = ''; //Empty out the data

    if (exerciseData.length === 0) {
        const caloriesEMPTY = 0;
        const caloriesLost = document.createElement('div');
        caloriesLost.classList.add('caloriesLostDIV');
        caloriesLost.innerHTML = `
        <label for="totalCalOut">
        <p>Calories Burned:</p>
        </label>
        <input type="text" id="caloriesOut" name="caloriesOut" value="${caloriesEMPTY}" readonly>`;
        container.appendChild(caloriesLost);
    } else {
        exerciseData.forEach(function(exercise) { //for each data in the array (exerciseData) will be stored in exercise, and then the function will be carried out on exercise 
            container.innerHTML = '';
            totalCaloriesLost += exercise.caloriesLost;
            const caloriesLost = document.createElement('div');
            caloriesLost.classList.add('caloriesLostDIV');
            caloriesLost.innerHTML = `
            <label for="totalCalOut">
            <p>Calories Burned:</p>
            </label>
            <input type="text" id="caloriesOut" name="caloriesOut" value="${totalCaloriesLost}" readonly>`;
            container.appendChild(caloriesLost);
        })
    }
}