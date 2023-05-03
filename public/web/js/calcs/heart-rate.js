const heartRateForm = document.querySelector('#heart-rate-form');
const result = document.querySelector('#result');

heartRateForm.addEventListener('submit', e => {
    e.preventDefault();

    const age = parseInt(document.querySelector('#age').value);
    const restingHeartRate = parseInt(document.querySelector('#resting-heart-rate').value);

    let lang = $('html').attr('lang')


    let err = lang === 'ar' ? `يرجى ملء جميع الحقول المطلوبة.` : `Please fill all the required fields.`

    if (!age || !restingHeartRate) {
        result.innerHTML = `<p>${err}</p>`;
        return;
    }

    const maxHeartRate = 220 - age;
    const targetHeartRateMin = Math.round(0.6 * (maxHeartRate - restingHeartRate) + restingHeartRate);
    const targetHeartRateMax = Math.round(0.8 * (maxHeartRate - restingHeartRate) + restingHeartRate);

    let maxRateTxt = lang === 'ar' ? `أقصى معدل لضربات القلب` : `Maximum Heart Rate`
    let targetRateTxt = lang === 'ar' ? `معدل ضربات القلب المستهدف` : `Target Heart Rate`

    result.innerHTML = `
        <p>${maxRateTxt}: ${maxHeartRate}</p>
        <p>${targetRateTxt}: ${targetHeartRateMin} - ${targetHeartRateMax}</p>
    `;
});
