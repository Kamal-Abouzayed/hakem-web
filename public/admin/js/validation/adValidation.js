$(document).ready(function () {
    $("#createAdForm").validate({
        // initialize the plugin

        rules: {
            btn_text_ar: {
                required: true,
            },
            btn_text_en: {
                required: true,
            },
            desc_ar: {
                required: true,
            },
            desc_en: {
                required: true,
            },
            link: {
                required: true,
            },
            img: {
                required: true,
            },
        },

        errorElement: "span",
        errorLabelContainer: ".errorTxt",

        submitHandler: function (form) {
            form.submit();
        },
    });

    $("#updateAdForm").validate({
        // initialize the plugin

        rules: {
            btn_text_ar: {
                required: true,
            },
            btn_text_en: {
                required: true,
            },
            desc_ar: {
                required: true,
            },
            desc_en: {
                required: true,
            },
            link: {
                required: true,
            },
            // img: {
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
