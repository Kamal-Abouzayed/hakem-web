$(document).ready(function () {
    $("#profileForm").validate({
        // initialize the plugin

        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
            },
            password: {
                minlength: 8,
            },
            password_confirmation: {
                minlength: 8,
                equalTo: "#password",
            },
        },

        errorElement: "span",
        errorLabelContainer: ".errorTxt",

        submitHandler: function (form) {
            form.submit();
        },
    });
});
