@section('plugins.FileUploader', true)
@section('plugins.SummerNote', true)
@section('plugins.jQueryValidate', true)
<div class="row">
    <div class="col-6">
        @foreach($activeLanguages as $language)
            <div class="form-group">
                <label for="fio_{{ $language->language_locale_id }}">Ф.И.О. ({{ $language->language_label }}.)<span class="required-field-asterisk">*</span></label>
                <input type="text" class="form-control" id="fio_{{ $language->language_locale_id }}" name="fio[{{ $language->language_locale_id }}]" value="{{ isset($model) ? $model->getTranslation('fio', $language->language_locale_id) : '' }}">
            </div>
        @endforeach
    </div>
    <div class="col-6">
        @foreach($activeLanguages as $language)
            <div class="form-group">
                <label for="position_{{ $language->language_locale_id }}">Должность ({{ $language->language_label }}.)</label>
                <input type="text" class="form-control" id="position_{{ $language->language_locale_id }}" name="position[{{ $language->language_locale_id }}]" value="{{ isset($model) ? $model->getTranslation('position', $language->language_locale_id) : '' }}">
            </div>
        @endforeach
    </div>
</div>

<hr>

<div class="row">
    @foreach($activeLanguages as $language)
        <div class="col-{{ (12 / count($activeLanguages)) }}">
            <div class="form-group">
                <label for="description_{{ $language->language_locale_id }}">Описание ({{ $language->language_label }}.)<span class="required-field-asterisk">*</span></label>
                <textarea class="form-control summernote" id="description_{{ $language->language_locale_id }}" name="description[{{ $language->language_locale_id }}]" cols="30" rows="7">{{ isset($model) ? $model->getTranslation('description', $language->language_locale_id) : '' }}</textarea>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="image">Фото<span class="required-field-asterisk">*</span></label>
            <div class="file-loading">
                <input id="image" name="image" type="file">
            </div>
        </div>
    </div>
</div>

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.1/umd/popper.min.js"></script>
    @include('admin.common.js.file-input-options-object')
<script>
    $(document).ready(function() {
        let isUpdateAction = '{{ isset($model) }}';
        let imageUrl = '{{ isset($model) ? $model->getImage() : null }}';
        let caption = '{{ isset($model) ? $model->image : null }}';
        $("#image").fileinput(getFileInputOptions(isUpdateAction, imageUrl, caption));

        $("input:file").change(function (){
            $('#image-error').css('display', 'none')
        });

        // Summernote

        let summernoteForm = $('#form');
        let summernoteElementsIds = [];
        let activeLocaleIds = [];

        @foreach($activeLanguages as $language)
            summernoteElementsIds.push('#description_{{ $language->language_locale_id }}')
            activeLocaleIds.push('{{ $language->language_locale_id }}')
        @endforeach

        function buildDependedFieldsRules() {
            return {
                "position[ua]" : {
                    required: {
                        depends: function () {
                            return $("#position_en").val() || $("#position_ru").val();
                        }
                    }
                },
                "position[en]" : {
                    required: {
                        depends: function () {
                            return $("#position_ua").val() || $("#position_ru").val();
                        }
                    }
                },
                "position[ru]" : {
                    required: {
                        depends: function () {
                            return $("#position_en").val() || $("#position_ua").val();
                        }
                    }
                }
            }
        }

        function buildRequiredRulesByFieldNameAndActiveLanguages(fieldName) {
            let rules = {};
            activeLocaleIds.forEach(function(item) {
                rules[ fieldName + "[" + item +"]"] = {required: true};
            });
            return rules;
        }

        function getRules() {
            let rules = {};
            let fioRules = buildRequiredRulesByFieldNameAndActiveLanguages('fio');
            let descriptionRules = buildRequiredRulesByFieldNameAndActiveLanguages('description');
            let positionRules = buildDependedFieldsRules()
            let imageRules = {
                'image':
                    {
                        required: {
                            depends: function () {
                                if (!isUpdateAction) {
                                    return true;
                                } else {
                                    if($('.file-preview-thumbnails').length){
                                        return $('.file-preview-thumbnails').is(':empty')
                                    }
                                }
                            }
                        },
                        extension: "jpeg|png|jpg|gif"
                    }
            }
            return Object.assign(rules, fioRules, positionRules, descriptionRules, imageRules)
        }

        let validator = summernoteForm.validate({
            ignore: ':hidden:not(.summernote),.note-editable.card-block',
            errorElement: "span",
            rules: getRules(),
            messages: {
                "position[ua]" : 'Поле "Должность" является обязательным, если оно заполнено хотя бы для одного языка.',
                "position[en]" : 'Поле "Должность" является обязательным, если оно заполнено хотя бы для одного языка.',
                "position[ru]" : 'Поле "Должность" является обязательным, если оно заполнено хотя бы для одного языка.',
            },
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
        extension: "Загрузить можно только изображения в форматах: jpeg, png, jpg, gif."
    });
</script>

@stop
