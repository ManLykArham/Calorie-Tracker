function hmlRequest(exerciseID) {
    let exercise = {
        "exerID": exerciseID
    }

    fetch("../PHP/deleteExercise.php", {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json;"
        },
        "body": JSON.stringify(exercise)
    })
}


const deleteExercise = document.getElementById('deleteExBttn');

deleteExercise.addEventListener("click", function(e) {
    e.preventDefault();
    const exerciseID = document.getElementById('exerID').value;
    console.log(exerciseID);
    hmlRequest(exerciseID);
})