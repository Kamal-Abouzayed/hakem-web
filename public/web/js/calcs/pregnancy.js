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

let lang = $('html').attr('lang')

const calculateDueDate = () => {
    const lmpDay = parseInt(document.querySelector('#day-select').value);
    const lmpMonth = parseInt(document.querySelector('#month-select').value) - 1;
    const lmpYear = parseInt(document.querySelector('#year-select').value);

    const lmp = new Date(lmpYear, lmpMonth, lmpDay);
    const dueDate = new Date(lmp.getTime() + (280 * 24 * 60 * 60 * 1000)); // add 280 days in milliseconds
    const dueDateString = dueDate.toLocaleDateString();

    let text = lang === 'ar' ? 'تاريخ الولادة المتوقع' : 'Expected birth date'

    document.querySelector('#result').innerHTML = ` ${text} : ${dueDateString}`;
};

document.querySelector('.ctm-btn').addEventListener('click', (event) => {
    event.preventDefault(); // Prevent the default form submission behavior
    calculateDueDate(); // Call the calculateDueDate function
});
