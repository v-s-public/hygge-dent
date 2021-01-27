<script>
    let appointmentFormModal = $('#appointmentFormModal');
    let appointmentSuccessModal = $('#appointmentSuccessModal');
    let appointmentForm = $('#appointmentForm');

    let phoneNumberInput = $('.phone-input');
    let phoneRegex = new RegExp(/^\((?:0[0-99]{2})\)[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/);

    let validator = appointmentForm.validate({
        rules: {
            appointment_fio: {
                required: true
            },
            appointment_phone: {
                required: true,
                phoneNumberValidator: true
            },
            appointment_message: {
                required: true
            }
        },
        messages: {
            appointment_fio: {
                required: '{{ __('frontend.slider.modals.appointment_form.validation_messages.required') }}'
            },
            appointment_phone: {
                required: '{{ __('frontend.slider.modals.appointment_form.validation_messages.required') }}'
            },
            appointment_message: {
                required: '{{ __('frontend.slider.modals.appointment_form.validation_messages.required') }}'
            }
        }
    });

    // phone number validator: (0xx)xxx-xx-xx
    let phoneNumberInvalid = function(value) {
        return phoneRegex.test(value);
    }

    $.validator.addMethod("phoneNumberValidator", function(value, element) {
        return phoneNumberInvalid(value);
    }, '{{ __('frontend.slider.modals.appointment_form.validation_messages.phone_number_format') }}');

    // submit button handler
    $('#appointmentSubmitButton').on('click', function (e) {
        e.preventDefault();
        if (appointmentForm.valid()) {
            let appointment_fio = $('#appointment_fio').val();
            let appointment_phone = $('#appointment_phone').val();
            let appointment_message = $('#appointment_message').val();

            $.ajax({
                method: "POST",
                url: "{{ route('api.v1.appointment') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    fio: appointment_fio,
                    phone: appointment_phone,
                    message: appointment_message
                },
                success: function () {
                    clearForm();

                    // close Appointment Modal
                    appointmentFormModal.modal('hide');

                    // open Success Modal
                    setTimeout(function () {
                        appointmentSuccessModal.modal('show');
                    }, 500);
                }
            })
        }
    });

    // set mask for phone on modal init (reInit to clear previous value)
    appointmentFormModal.on('show.bs.modal', function () {
        phoneNumberInput.inputmask({
            mask: "(099)999-99-99"
        });
    })

    // clear form and validation errors on modal close
    appointmentFormModal.on('hidden.bs.modal', function () {
        clearForm();
    })

    function clearForm()
    {
        appointmentForm[0].reset();
        validator.resetForm();
    }
</script>
