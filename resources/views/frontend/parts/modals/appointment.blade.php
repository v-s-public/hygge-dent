<!-- Modal -->
<div class="modal fade" id="appointmentFormModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="appointmentModalLabel">
                    {{ __('frontend.slider.modals.appointment_form.header') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="appointmentForm">
                    <div class="form-group">
                        <label for="appointment_fio">{{ __('frontend.slider.modals.appointment_form.fields.fio') }}<span class="required-field-asterisk">*</span></label>
                        <input type="text" id="appointment_fio" name="appointment_fio" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="appointment_phone">{{ __('frontend.slider.modals.appointment_form.fields.phone') }}<span class="required-field-asterisk">*</span></label>
                        <input type="text" id="appointment_phone" name="appointment_phone" class="form-control phone-input">
                    </div>

                    <div class="form-group">
                        <label for="appointment_message">{{ __('frontend.slider.modals.appointment_form.fields.message') }}<span class="required-field-asterisk">*</span></label>
                        <textarea name="appointment_message" id="appointment_message" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{ __('frontend.slider.modals.appointment_form.buttons.cancel') }}
                </button>
                <button type="submit" class="btn btn-primary" id="appointmentSubmitButton">
                    {{ __('frontend.slider.modals.appointment_form.buttons.make_an_appointment') }}
                </button>
            </div>
        </div>
    </div>
</div>
