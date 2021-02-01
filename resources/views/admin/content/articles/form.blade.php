@section('plugins.SummerNote', true)
@section('plugins.jQueryValidate', true)
<div class="row">
    <div class="col-12">
        @foreach($activeLanguages as $language)
            <div class="form-group">
                <label for="title_{{ $language->language_locale_id }}">Заголовок ({{ $language->language_label }}.)</label>
                <input type="text" class="form-control" id="title_{{ $language->language_locale_id }}" name="title[{{ $language->language_locale_id }}]" value="{{ isset($model) ? $model->getTranslation('title', $language->language_locale_id) : '' }}">
            </div>
        @endforeach
    </div>
</div>

<hr>

<div class="row">
    @foreach($activeLanguages as $language)
        <div class="col-{{ (12 / count($activeLanguages)) }}">
            <div class="form-group">
                <label for="text_{{ $language->language_locale_id }}">Описание ({{ $language->language_label }}.)<span class="required-field-asterisk">*</span></label>
                <textarea class="form-control summernote" id="text_{{ $language->language_locale_id }}" name="text[{{ $language->language_locale_id }}]" cols="30" rows="7">{{ isset($model) ? $model->getTranslation('text', $language->language_locale_id) : '' }}</textarea>
            </div>
        </div>
    @endforeach
</div>

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.1/umd/popper.min.js"></script>
    <script>
        $(document).ready(function() {
            let summernoteForm = $('#form');
            let summernoteElementsIds = [];
            let activeLocaleIds = [];

            @foreach($activeLanguages as $language)
                summernoteElementsIds.push('#text_{{ $language->language_locale_id }}')
                activeLocaleIds.push('{{ $language->language_locale_id }}')
            @endforeach

            function buildRequiredRulesByFieldNameAndActiveLanguages(fieldName) {
                let rules = {};
                activeLocaleIds.forEach(function(item) {
                    rules[ fieldName + "[" + item +"]"] = {required: true};
                });
                return rules;
            }

            function getRules() {
                let rules = {};
                let textRules = buildRequiredRulesByFieldNameAndActiveLanguages('text');
                return Object.assign(rules, textRules)
            }

            let validator = summernoteForm.validate({
                ignore: ':hidden:not(.summernote),.note-editable.card-block',
                errorElement: "span",
                rules: getRules(),
                errorPlacement: function (error, element) {
                    error.addClass("invalid-feedback");
                    if (element.hasClass("summernote")) {
                        error.insertAfter(element.siblings(".note-editor"));
                    } else if ( $(element).attr('id') === 'image' ) {
                        let parent = $('.file-input');
                        error.insertAfter(parent);
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            summernoteElementsIds.forEach(function(item) {
                let summernoteElement = $(item)
                summernoteElement.summernote({
                    height: 200,
                    callbacks: {
                        onChange: function (contents, $editable) {
                            // Note that at this point, the value of the `textarea` is not the same as the one
                            // you entered into the summernote editor, so you have to set it yourself to make
                            // the validation consistent and in sync with the value.
                            summernoteElement.val(summernoteElement.summernote('isEmpty') ? "" : contents);

                            // You should re-validate your element after change, because the plugin will have
                            // no way to know that the value of your `textarea` has been changed if the change
                            // was done programmatically.
                            validator.element(summernoteElement);
                        }
                    },
                    toolbar: [
                        ['font', ['bold', 'italic', 'underline']],
                        ['para', ['ul', 'ol', 'paragraph']],
                    ],
                });
            });
        });

        jQuery.extend(jQuery.validator.messages, {
            required: "Поле является обязательным для заполения.",
        });
    </script>
@stop
