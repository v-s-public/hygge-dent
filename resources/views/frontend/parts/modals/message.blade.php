<!-- Modal -->
<div class="modal fade" id="messageFormModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">
                    {{ __('frontend.slider.modals.message_form.header') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="messageForm">
                    <div class="form-group">
                        <label for="message_fio">{{ __('frontend.slider.modals.message_form.fields.fio') }}<span class="required-field-asterisk">*</span></label>
                        <input type="text" id="message_fio" name="message_fio" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="message_email">{{ __('frontend.slider.modals.message_form.fields.email') }}<span class="required-field-asterisk">*</span></label>
                        <input type="text" id="message_email" name="message_email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="message_theme">{{ __('frontend.slider.modals.message_form.fields.theme') }}</label>
                        <input type="text" id="message_theme" name="message_theme" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="message_text">{{ __('frontend.slider.modals.message_form.fields.message') }}<span class="required-field-asterisk">*</span></label>
                        <textarea name="message_text" id="message_text" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{ __('frontend.slider.modals.message_form.buttons.cancel') }}
                </button>
                <button type="submit" class="btn btn-primary" id="messageSubmitButton">
                    {{ __('frontend.slider.modals.message_form.buttons.send_message') }}
                </button>
            </div>
        </div>
    </div>
</div>
