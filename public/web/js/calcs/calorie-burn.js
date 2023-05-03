const calorieForm = document.querySelector('#calorie-form');
const weightInput = document.querySelector('#weight');
const durationInput = document.querySelector('#duration');
const activityInput = document.querySelector('#activity');
const genderInput = document.querySelector('#gender');

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

    let rounded = Math.round(caloriesBurned / 50) * 50;

    let text =
        lang === "ar"
            ? "احتياجاتك اليومية من السعرات الحرارية"
            : "Your daily calorie needs";

    let calorieCalculator =
        lang === "ar" ? "حاسبة السعرات الحرارية" : "Calories Calculator";

    let calorie = lang === "ar" ? "سعر حراري" : "Calorie";

    let roundText = lang === "ar" ? "احتياجاتك اليومية من السعرات الحرارية (تم تقريب النتائج لأقرب 50 سعرة) هي" : "Your daily caloric needs (results have been rounded to the nearest 50 calories) are:";

    let changeText = lang === "ar" ? "تتغير احتياجاتك من السعرات الحرارية اليومية مع تغيّر مستوى نشاطك البدني" : "Your daily calorie needs change with your level of physical activity";

    const resultElement = document.getElementById("result");

    // ${text} : ${rounded.toFixed(2)}

    resultElement.innerHTML = `<div class="col-lg-12">
    <div class="main-calorie-calculator-details">

    <div class="sub-calorie-calculator-details">
        <div class="title-calorie-calculator-details">
            <h2>${calorieCalculator}</h2>
        </div>

        <div class="need-calorie">
            <h3> ${roundText} :</h3>
            <span>${rounded.toFixed(2)} ${calorie} </span>
        </div>

        <div class="number-calorie">
            <h2> ${changeText} : </h2>
            <ul>
               <li class="${rounded.toFixed(2) <= 2000 ? 'active' : ''}"> 2000 خامل</li>
               <li class="${rounded.toFixed(2) > 2000 && rounded.toFixed(2) <= 2200 ? 'active' : ''}" > 2200 نشيط من حين لآخر</li>
               <li class="${rounded.toFixed(2) > 2200 && rounded.toFixed(2) <= 2400 ? 'active' : ''}"> 2400  نشط</li>
               <li class="${rounded.toFixed(2) > 2400 ? 'active' : ''}" >2800 نشط للغاية </li>
            </ul>
        </div>
    </div>
    </div>`;
});
