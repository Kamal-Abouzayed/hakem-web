$(document).ready(function () {
    $("#createOrganForm").validate({
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
            body_system_id: {
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

    $("#updateOrganForm").validate({
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
            body_system_id: {
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
