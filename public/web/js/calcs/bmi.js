const form = document.getElementById("bmi-form");
const resultDiv = document.getElementById("result");

form.addEventListener("submit", (e) => {
    e.preventDefault();

    const age = parseInt(document.getElementById("age").value);
    const height = parseInt(document.getElementById("height").value);
    const weight = parseInt(document.getElementById("weight").value);
    const gender = document.getElementById("gender").value;

    const heightInMeters = height / 100;
    const bmi = weight / (heightInMeters ** 2);

    let interpretation;

    let lang = $('html').attr('lang')

    if (bmi < 18.5) {
        interpretation = lang === 'ar' ? "نقص الوزن" : "Underweight";
    } else if (bmi < 25) {
        interpretation = lang === 'ar' ? "الوزن الطبيعي" : "Normal weight";
    } else if (bmi < 30) {
        interpretation = lang === 'ar' ? "وزن زائد" : "Overweight";
    } else {
        interpretation = lang === 'ar' ? "سمين" : "Obese";
    }

    const result = `
    <p>BMI: ${bmi.toFixed(2)}</p>
    <p>Interpretation: ${interpretation}</p>
  `;

    resultDiv.innerHTML = result;
});
