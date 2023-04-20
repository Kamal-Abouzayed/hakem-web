
//contact form 

var $form = $(".contact-modal-form");
$form.validate({
    rules: {
        username: {
            minlength: 5
        },

        email: {
            email: true
        },
        message: {
            minlength: 20,
            maxlength: 500

        }
    },

    messages: {},
    submitHandler: function () {
        swal.fire({
            title: 'تم إرسال الرسالة بنجاح',
            type: 'success',
            showConfirmButton: false,
            timer: 1500
        });
        setTimeout(function () {
            $form[0].submit();
        }, 3000)
    }
});
