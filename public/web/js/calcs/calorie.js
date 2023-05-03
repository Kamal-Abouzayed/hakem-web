const form = document.getElementById('calorie-form');
form.addEventListener('submit', calculateCalories);

let lang = $('html').attr('lang')

function calculateCalories(event) {
    event.preventDefault();

    const age = parseInt(document.getElementById('age').value);
    const height = parseInt(document.getElementById('height').value);
    const weight = parseInt(document.getElementById('weight').value);
    const gender = document.getElementById('gender').value;

    let bmr;
    if (gender === 'male') {
        bmr = 10 * weight + 6.25 * height - 5 * age + 5;
    } else {
        bmr = 10 * weight + 6.25 * height - 5 * age - 161;
    }

    let text = lang === 'ar' ? 'احتياجاتك اليومية من السعرات الحرارية' : 'Your daily calorie needs'

    const resultElement = document.getElementById('result');
    resultElement.innerHTML = `${text} : ${bmr.toFixed(2)}`;
}
