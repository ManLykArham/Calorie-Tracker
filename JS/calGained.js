window.addEventListener('load', function(e) {
    e.preventDefault();
    const currDate = new Date();
    const year = currDate.getFullYear(); // Get the current year
    const month = String(currDate.getMonth() + 1).padStart(2, '0'); // Get the current month (adding 1 because months are 0-based), and ensure it's zero-padded
    const day = String(currDate.getDate()).padStart(2, '0'); // Get the current day of the month and ensure it's zero-padded
    const formattedDate = `${year}-${month}-${day}`;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../PHP/calGained.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const foodData = JSON.parse(xhr.responseText);
            console.log(foodData);
            displayCaloriesLost(foodData);
        }
    }

    const data = `todaysDate=${formattedDate}`;
    xhr.send(data);
})


function displayCaloriesLost(foodData) {
    const container = document.getElementById('caloriesGained');
    let totalCaloriesGained = 0;
    container.innerHTML = ''; //Empty out the data

    if (foodData.length === 0) {
        const caloriesEMPTY = 0;
        const caloriesGained = document.createElement('div');
        caloriesGained.classList.add('caloriesGainedDIV');
        caloriesGained.innerHTML = `
        <label for="totalCalIn">
        <p>Calories Gained:</p>
        </label>
        <input type="text" id="caloriesIn" name="caloriesIn" value="${caloriesEMPTY}" readonly>`;
        container.appendChild(caloriesGained);
    } else {
        foodData.forEach(function(food) { //for each data in the array (foodData) will be stored in exercise, and then the function will be carried out on exercise 
            container.innerHTML = '';
            totalCaloriesGained += food.caloriesGained;
            const caloriesGained = document.createElement('div');
            caloriesGained.classList.add('caloriesGainedDIV');
            caloriesGained.innerHTML = `
            <label for="totalCalIn">
            <p>Calories Gained:</p>
            </label>
            <input type="text" id="caloriesIn" name="caloriesIn" value="${totalCaloriesGained}" readonly>`;
            container.appendChild(caloriesGained);
        })
    }
}