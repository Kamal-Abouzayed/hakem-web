const calorieForm = document.querySelector('#calorie-form');
const weightInput = document.querySelector('#weight');
const durationInput = document.querySelector('#duration');
const activityInput = document.querySelector('#activity');
const genderInput = document.querySelector('#gender');
const resultDiv = document.querySelector('#result');

calorieForm.addEventListener('submit', e => {
    e.preventDefault();

    const weight = weightInput.value;
    const duration = durationInput.value;
    const activity = activityInput.value;
    const gender = genderInput.value;

    let caloriesBurned = 0;
    if (gender === 'male') {
        caloriesBurned = ((-55.0969 + (0.6309 * activity) + (0.1988 * weight) + (0.2017 * duration)) / 4.184) * duration;
    } else if (gender === 'female') {
        caloriesBurned = ((-20.4022 + (0.4472 * activity) + (0.1263 * weight) + (0.074 * duration)) / 4.184) * duration;
    }

    let lang = $('html').attr('lang')

    let txt = lang === 'ar' ? 'سعرات حرارية محروقة' : 'calories burned'

    resultDiv.innerHTML = `<p>${caloriesBurned.toFixed(2)} ${txt}</p>`;
});
