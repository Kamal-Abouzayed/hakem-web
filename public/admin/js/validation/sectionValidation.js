$(document).ready(function () {
    $("#createSectionForm").validate({
        // initialize the plugin

        rules: {
            name_ar: {
                required: true,
            },
            name_en: {
                required: true,
            },
            image: {
                required: true,
            },
        },

        errorElement: "span",
        errorLabelContainer: ".errorTxt",

        submitHandler: function (form) {
            form.submit();
        },
    });

    $("#updateSectionForm").validate({
        // initialize the plugin

        rules: {
            name_ar: {
                required: true,
            },
            name_en: {
                required: true,
            },
            // image: {
            //     required: true,
            // },
        },

        errorElement: "span",
        errorLabelContainer: ".errorTxt",

        submitHandler: function (form) {
            form.submit();
        },
    });
});
