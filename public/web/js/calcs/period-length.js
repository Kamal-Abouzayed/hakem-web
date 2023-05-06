function calculateOvulationPeriod() {
    const cycleLength = parseInt(document.getElementById("cycle-length").value);
    const periodLength = parseInt(document.getElementById("period-length").value);
    const lastPeriodDate = new Date(document.getElementById("last-period-date").value);

    // Calculate the earliest and latest ovulation days based on the last period date and cycle length
    const earliestOvulationDay = new Date(lastPeriodDate.getTime() + 11 * 24 * 60 * 60 * 1000);
    const latestOvulationDay = new Date(lastPeriodDate.getTime() + (cycleLength - periodLength - 18) * 24 * 60 * 60 * 1000);

    // Display the results
    document.getElementById("earliest-ovulation-day").textContent = formatDate(earliestOvulationDay);
    document.getElementById("latest-ovulation-day").textContent = formatDate(latestOvulationDay);
}

function formatDate(date) {
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, "0");
    const day = String(date.getDate()).padStart(2, "0");
    return `${year}-${month}-${day}`;
}
