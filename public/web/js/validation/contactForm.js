$(document).ready(function () {
    $("#contactForm").validate({
        // initialize the plugin

        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
            },
            phone: {
                required: true,
                number: true,
                minlength: 9,
                maxlength: 14,
            },
            msg: {
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
