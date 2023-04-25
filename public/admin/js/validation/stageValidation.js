$(document).ready(function () {
    $("#createArticleForm").validate({
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
            // parent_id: {
            //     required: true,
            // },
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

    $("#updateArticleForm").validate({
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
            // parent_id: {
            //     required: true,
            // },
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
