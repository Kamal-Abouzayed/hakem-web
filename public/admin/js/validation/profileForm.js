$(document).ready(function () {
    $("#profileForm").validate({
        // initialize the plugin

        rules: {
            fname: {
                required: true,
            },
            lname: {
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
