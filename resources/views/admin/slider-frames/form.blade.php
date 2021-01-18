@section('plugins.FileUploader', true)
@section('plugins.jQueryValidate', true)
<div class="row">
    <div class="col-6">
        @foreach($activeLanguages as $language)
            <div class="form-group">
                <label for="frame_title_{{ $language->language_locale_id }}">Заголовок ({{ $language->language_label }}.)<span class="required-field-asterisk">*</span></label>
                <input type="text" class="form-control" id="frame_title_{{ $language->language_locale_id }}" name="frame_title[{{ $language->language_locale_id }}]" value="{{ isset($model) ? $model->getTranslation('frame_title', $language->language_locale_id) : '' }}">
            </div>
        @endforeach
    </div>
    <div class="col-6">
        @foreach($activeLanguages as $language)
            <div class="form-group">
                <label for="frame_description_{{ $language->language_locale_id }}">Описание ({{ $language->language_label }}.)</label>
                <input type="text" class="form-control" id="frame_description_{{ $language->language_locale_id }}" name="frame_description[{{ $language->language_locale_id }}]" value="{{ isset($model) ? $model->getTranslation('frame_description', $language->language_locale_id) : '' }}">
            </div>
        @endforeach
    </div>
</div>

<hr>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="image">Картинка<span class="required-field-asterisk">*</span></label>
            <div class="file-loading">
                <input id="image" name="image" type="file">
            </div>
        </div>
    </div>
</div>

@section('js')
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

        // Validation

        let form = $('#form');
        let activeLocaleIds = [];

        @foreach($activeLanguages as $language)
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
            let title = buildRequiredRulesByFieldNameAndActiveLanguages('title');
            let descriptionRules = buildRequiredRulesByFieldNameAndActiveLanguages('description');
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
            return Object.assign(rules, title, descriptionRules, imageRules)
        }

        form.validate({
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
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "Поле является обязательным для заполения.",
        extension: "Загрузить можно только изображения в форматах: jpeg, png, jpg, gif."
    });
</script>

@stop
