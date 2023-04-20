$(document).ready(function () {
    $("#createProductForm").validate({
        // initialize the plugin

        rules: {
            title_ar: {
                required: true,
            },
            title_en: {
                required: true,
            },
            desc_ar: {
                required: true,
            },
            desc_en: {
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

    $("#updateProductForm").validate({
        // initialize the plugin

        rules: {
            title_ar: {
                required: true,
            },
            title_en: {
                required: true,
            },
            desc_ar: {
                required: true,
            },
            desc_en: {
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
