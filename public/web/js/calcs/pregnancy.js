// Get the year dropdown element
const yearDropdown = document.querySelector("#year-select");

// Set the starting year to 1950
const startYear = 1950;

// Get the current year
const currentYear = new Date().getFullYear();

// Loop through the years from the starting year to the current year
for (let year = currentYear; year >= startYear; year--) {
    // Create a new option element
    const option = document.createElement("option");

    // Set the value and text of the option element to the current year
    option.value = year;
    option.text = year;

    // Add the option element to the year dropdown
    yearDropdown.appendChild(option);
}

let lang = $("html").attr("lang");

const calculateDueDate = () => {
    const lmpDay = parseInt(document.querySelector("#day-select").value);
    const lmpMonth =
        parseInt(document.querySelector("#month-select").value) - 1;
    const lmpYear = parseInt(document.querySelector("#year-select").value);

    const lmp = new Date(lmpYear, lmpMonth, lmpDay);
    const dueDate = new Date(lmp.getTime() + 280 * 24 * 60 * 60 * 1000); // add 280 days in milliseconds
    const dueDateString = dueDate.toLocaleDateString();

    let text = lang === "ar" ? "تاريخ الولادة المتوقع" : "Expected birth date";
    let from = lang === "ar" ? "من" : "From";
    let to   = lang === "ar" ? "إلى" : "To";

    const trimester1StartDate = new Date(dueDateString);
    const trimester1EndDate = new Date(dueDateString);
    trimester1EndDate.setDate(trimester1EndDate.getDate() + 92);

    const trimester2StartDate = new Date(trimester1EndDate);
    trimester2StartDate.setDate(trimester2StartDate.getDate() + 1);
    const trimester2EndDate = new Date(trimester1EndDate);
    trimester2EndDate.setDate(trimester2EndDate.getDate() + 91);

    const trimester3StartDate = new Date(trimester2EndDate);
    trimester3StartDate.setDate(trimester3StartDate.getDate() + 1);
    const trimester3EndDate = new Date(trimester2EndDate);
    trimester3EndDate.setDate(trimester3EndDate.getDate() + 92);

    const trimester1Text = `${from} ${trimester1StartDate.toLocaleDateString()} ${to} ${trimester1EndDate.toLocaleDateString()}`;
    const trimester2Text = `${from} ${trimester2StartDate.toLocaleDateString()} ${to} ${trimester2EndDate.toLocaleDateString()}`;
    const trimester3Text = `${from} ${trimester3StartDate.toLocaleDateString()} ${to} ${trimester3EndDate.toLocaleDateString()}`;

    document.querySelector("#result").innerHTML = `<div class="col-lg-12">
    <div class="main-pregnancy-calculator-details">

        <div class="sub-pregnancy-calculator-details">
            <div class="img-calculator-details">
                <h2>
                    ${text}
                    <span>الجمعة</span>
                    <p>.${dueDateString}.</p>
                </h2>

            </div>

            <div class="text-calculator-details">
                <div class="sub-text-calculator-details">
                    <h2>الثلث الأول من الحمل</h2>
                    <div class="date-pregnancy">
                        ${trimester1Text}
                    </div>
                </div>
                <div class="sub-text-calculator-details">
                    <h2>الثلث الثاني من
                        الحمل</h2>
                    <div class="date-pregnancy">
                        ${trimester2Text}
                    </div>
                </div>
                <div class="sub-text-calculator-details">
                    <h2>الثلث الثالث من
                        الحمل</h2>
                    <div class="date-pregnancy">
                        ${trimester3Text}
                    </div>
                </div>
            </div>
        </div>
        </div>`;
};

document.querySelector(".ctm-btn").addEventListener("click", (event) => {
    event.preventDefault(); // Prevent the default form submission behavior
    calculateDueDate(); // Call the calculateDueDate function
});
