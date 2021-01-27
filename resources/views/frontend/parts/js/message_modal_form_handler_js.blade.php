<script>
    let messageFormModal = $('#messageFormModal');
    let messageSuccessModal = $('#messageSuccessModal');
    let messageForm = $('#messageForm');

    let messageValidator = messageForm.validate({
        rules: {
            message_fio: {
                required: true
            },
            message_email: {
                required: true,
                email: true
            },
            message_text: {
                required: true
            }
        },
        messages: {
            message_fio: {
                required: '{{ __('frontend.slider.modals.message_form.validation_messages.required') }}'
            },
            message_email: {
                required: '{{ __('frontend.slider.modals.message_form.validation_messages.required') }}',
                email: '{{ __('frontend.slider.modals.message_form.validation_messages.email') }}'
            },
            message_text: {
                required: '{{ __('frontend.slider.modals.message_form.validation_messages.required') }}'
            }
        }
    });

    // submit button handler
    $('#messageSubmitButton').on('click', function (e) {
        e.preventDefault();
        if (messageForm.valid()) {
            let message_fio = $('#message_fio').val();
            let message_email = $('#message_email').val();
            let message_theme = $('#message_theme').val();
            let message_text = $('#message_text').val();

            console.log([message_fio, message_email, message_theme, message_text])

            $.ajax({
                method: "POST",
                url: "{{ route('api.v1.message') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    fio: message_fio,
                    email: message_email,
                    theme: message_theme,
                    message: message_text
                },
                success: function () {
                    clearForm();

                    // close Message Modal
                    messageFormModal.modal('hide');

                    // open Success Modal
                    setTimeout(function () {
                        messageSuccessModal.modal('show');
                    }, 500);
                }
            })
        }
    });

    function clearForm()
    {
        messageForm[0].reset();
        messageValidator.resetForm();
    }
</script>
