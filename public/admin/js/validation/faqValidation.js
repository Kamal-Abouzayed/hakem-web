$(document).ready(function () {
    $("#createFaqForm").validate({
        // initialize the plugin

        rules: {
            question_ar: {
                required: true,
            },
            question_en: {
                required: true,
            },
            answer_ar: {
                required: true,
            },
            answer_en: {
                required: true,
            },
        },

        errorElement: "span",
        errorLabelContainer: ".errorTxt",

        submitHandler: function (form) {
            form.submit();
        },
    });

    $("#updateFaqForm").validate({
        // initialize the plugin

        rules: {
            question_ar: {
                required: true,
            },
            question_en: {
                required: true,
            },
            answer_ar: {
                required: true,
            },
            answer_en: {
                required: true,
            },
        },

        errorElement: "span",
        errorLabelContainer: ".errorTxt",

        submitHandler: function (form) {
            form.submit();
        },
    });
});
