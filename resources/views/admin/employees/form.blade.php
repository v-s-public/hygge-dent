@section('plugins.JsValidation', true)
@section('plugins.FileUploader', true)
@section('plugins.RichText', true)
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
                <textarea  class="form-control rich-text-area" id="description_{{ $language->language_locale_id }}" name="description[{{ $language->language_locale_id }}]" cols="30" rows="7">{{ isset($model) ? $model->getTranslation('description', $language->language_locale_id) : '' }}</textarea>
            </div>
        </div>
    @endforeach
</div>

<hr>

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
{{--    @include('admin.common.js.rich-text-options-object')--}}
    @include('admin.common.js.file-input-options-object')
    <script>
        $(document).ready(function() {
            let isUpdateAction = '{{ isset($model) }}';
            let imageUrl = '{{ isset($model) ? $model->getImage() : null }}';
            let caption = '{{ isset($model) ? $model->image : null }}';

            $("#image").fileinput(getFileInputOptions(isUpdateAction, imageUrl, caption));
        });

        // $('#description_ua').richText(getRichTextOptions());
        // $('#description_en').richText(getRichTextOptions());
        // $('#description_ru').richText(getRichTextOptions());
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\EmployeeRequest', '#form'); !!}
@stop
