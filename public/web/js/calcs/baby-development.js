function calculateBabyDevelopment() {
    const dueDate = new Date(document.getElementById("due-date").value);
    const currentDate = new Date();

    // Calculate the number of weeks and days remaining until the due date
    const weeksRemaining = Math.floor((dueDate.getTime() - currentDate.getTime()) / (7 * 24 * 60 * 60 * 1000));
    const daysRemaining = Math.floor((dueDate.getTime() - currentDate.getTime()) / (24 * 60 * 60 * 1000) % 7);

    // Calculate the estimated fetal age based on the number of weeks and days remaining
    const fetalAgeInWeeks = 40 - weeksRemaining;
    const fetalAgeInDays = 7 - daysRemaining;
    const fetalAgeInTotalDays = fetalAgeInWeeks * 7 + fetalAgeInDays;

    // Retrieve the baby's weight, height, age, and head circumference from the form
    const weight = parseFloat(document.getElementById("weight").value);
    const height = parseFloat(document.getElementById("height").value);
    const age = parseFloat(document.getElementById("age").value);
    const headCircumference = parseFloat(document.getElementById("head-circumference").value);

    // Perform calculations based on the input values
    const bmi = weight / ((height / 100) ** 2);
    const adjustedAge = age + (fetalAgeInTotalDays / 365);
    const adjustedHeadCircumference = headCircumference * ((fetalAgeInTotalDays / 365) ** 0.5);

    // Display the results
    document.getElementById("weeks-remaining").textContent = fetalAgeInWeeks;
    document.getElementById("days-remaining").textContent = fetalAgeInDays;
    document.getElementById("fetal-age-in-total-days").textContent = fetalAgeInTotalDays;
    document.getElementById("bmi").textContent = bmi.toFixed(1);
    document.getElementById("adjusted-age").textContent = adjustedAge.toFixed(2);
    document.getElementById("adjusted-head-circumference").textContent = adjustedHeadCircumference.toFixed(1);
}
