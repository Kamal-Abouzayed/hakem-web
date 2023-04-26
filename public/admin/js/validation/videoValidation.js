$(document).ready(function () {
    $("#createVideoForm").validate({
        // initialize the plugin

        rules: {
            name_ar: {
                required: true,
            },
            name_en: {
                required: true,
            },
            desc_ar: {
                required: true,
            },
            desc_en: {
                required: true,
            },
            url: {
                required: true,
            },
        },

        errorElement: "span",
        errorLabelContainer: ".errorTxt",

        submitHandler: function (form) {
            form.submit();
        },
    });

    $("#updateVideoForm").validate({
        // initialize the plugin

        rules: {
            name_ar: {
                required: true,
            },
            name_en: {
                required: true,
            },
            desc_ar: {
                required: true,
            },
            desc_en: {
                required: true,
            },
            url: {
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
