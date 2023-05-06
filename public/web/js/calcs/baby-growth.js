function calculateGrowth() {
    // Get input values
    const age = document.getElementById("current-age").value;
    const weight = document.getElementById("weight").value;
    const height = document.getElementById("height").value;
    const gender = document.getElementById("gender").value;

    // Calculate growth percentiles based on input values (sample calculations)
    const weightPercentile = (weight / (age * age)) * 100;
    const heightPercentile = (height / (age * age)) * 100;
    let headCircumferencePercentile;
    if (gender === "male") {
        headCircumferencePercentile = (age * 2 + 9) / 2;
    } else if (gender === "female") {
        headCircumferencePercentile = (age * 2 - 9) / 2;
    }

    // Display growth percentiles to user
    document.getElementById("weight-percentile").innerHTML = weightPercentile.toFixed(2);
    document.getElementById("height-percentile").innerHTML = heightPercentile.toFixed(2);
    document.getElementById("head-circumference-percentile").innerHTML = headCircumferencePercentile.toFixed(2);
}
