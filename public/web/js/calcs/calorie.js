const form = document.getElementById("calorie-form");
form.addEventListener("submit", calculateCalories);

let lang = $("html").attr("lang");

function calculateCalories(event) {
    event.preventDefault();

    const age = parseFloat(document.getElementById("age").value);
    const height = parseFloat(document.getElementById("height").value);
    const weight = parseFloat(document.getElementById("weight").value);
    const gender = document.getElementById("gender").value;
    const activity = parseFloat(document.getElementById("activity").value);

    let bmr;
    if (gender === 'male') {
        bmr = 88.36 + (13.4 * weight) + (4.8 * height) - (5.7 * age);
    } else {
        bmr = 447.6 + (9.2 * weight) + (3.1 * height) - (4.3 * age);
    }

    const dailyCalories = Math.round(bmr * activity);

    let text =
        lang === "ar"
            ? "احتياجاتك اليومية من السعرات الحرارية"
            : "Your daily calorie needs";

    let calorieCalculator =
        lang === "ar" ? "حاسبة السعرات الحرارية" : "Calories Calculator";

    let roundText =
        lang === "ar"
            ? "احتياجاتك اليومية من السعرات الحرارية (تم تقريب النتائج لأقرب 50 سعرة) هي"
            : "Your daily caloric needs (results have been rounded to the nearest 50 calories) are:";

    let changeText =
        lang === "ar"
            ? "تتغير احتياجاتك من السعرات الحرارية اليومية مع تغيّر مستوى نشاطك البدني"
            : "Your daily calorie needs change with your level of physical activity";


    let idle = lang === 'ar' ? 'خامل' : 'idle'
    let lightActive = lang === 'ar' ? 'نشيط من حين لآخر' : 'Active from time to time'
    let active = lang === 'ar' ? 'نشط' : 'Active'
    let veryActive = lang === 'ar' ? 'نشط للغاية' : 'Very Active'

    const resultElement = document.getElementById("result");

    resultElement.innerHTML = `<div class="col-lg-12">
        <div class="main-calorie-calculator-details">

        <div class="sub-calorie-calculator-details">
            <div class="title-calorie-calculator-details">
                <h2>${calorieCalculator}</h2>
            </div>

            <div class="need-calorie">
                <h3> ${roundText} :</h3>
                <span>${dailyCalories} ${text} </span>
            </div>

        <div class="number-calorie">
            <h2> ${changeText} : </h2>
            <ul>
               <li class="${
                   Math.round(bmr * 1.2) == dailyCalories ? "active" : ""
               }"> ${Math.round(bmr * 1.2)} ${idle}</li>
               <li class="${
                   Math.round(bmr * 1.375) == dailyCalories ? "active" : ""
               }" > ${Math.round(bmr * 1.375)} ${lightActive}</li>
               <li class="${
                   Math.round(bmr * 1.55) == dailyCalories ? "active" : ""
               }"> ${Math.round(bmr * 1.55)}  ${active}</li>
               <li class="${
                   Math.round(bmr * 1.725) == dailyCalories ? "active" : ""
               }" >${Math.round(bmr * 1.725)} ${veryActive} </li>
            </ul>
        </div>

        </div>
        </div>`;
}
