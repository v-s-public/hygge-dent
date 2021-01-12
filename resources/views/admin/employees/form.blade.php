@section('plugins.JsValidation', true)
@section('plugins.FileUploader', true)
@section('plugins.RichText', true)
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="fio-ua">Ф.И.О. (укр.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="fio-ua" name="fio-ua" value="{{ isset($model) ? $model->getTranslation('fio', 'ua') : '' }}">
        </div>
        <div class="form-group">
            <label for="fio-en">Ф.И.О. (англ.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="fio-en" name="fio-en" value="{{ isset($model) ? $model->getTranslation('fio', 'en') : '' }}">
        </div>
        <div class="form-group">
            <label for="fio-ru">Ф.И.О. (рус.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="fio-ru" name="fio-ru" value="{{ isset($model) ? $model->getTranslation('fio', 'ru') : '' }}">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="position-ua">Должность (укр.)</label>
            <input type="text" class="form-control" id="position-ua" name="position-ua" value="{{ isset($model) ? $model->getTranslation('position', 'ua') : '' }}">
        </div>
        <div class="form-group">
            <label for="position-en">Должность (англ.)</label>
            <input type="text" class="form-control" id="position-en" name="position-en" value="{{ isset($model) ? $model->getTranslation('position', 'en') : '' }}">
        </div>
        <div class="form-group">
            <label for="position-ru">Должность (рус.)</label>
            <input type="text" class="form-control" id="position-ru" name="position-ru" value="{{ isset($model) ? $model->getTranslation('position', 'ru') : '' }}">
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="description-ua">Описание (укр.)<span class="required-field-asterisk">*</span></label>
            <textarea  class="form-control rich-text-area" id="description-ua" name="description-ua" cols="30" rows="7">{{ isset($model) ? $model->getTranslation('description', 'ua') : '' }}</textarea>
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <label for="description-en">Описание (англ.)<span class="required-field-asterisk">*</span></label>
            <textarea  class="form-control" id="description-en" name="description-en" cols="30" rows="7">{{ isset($model) ? $model->getTranslation('description', 'en') : '' }}</textarea>
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <label for="description-ru">Описание (рус.)<span class="required-field-asterisk">*</span></label>
            <textarea  class="form-control" id="description-ru" name="description-ru" cols="30" rows="7">{{ isset($model) ? $model->getTranslation('description', 'ru') : '' }}</textarea>
        </div>
    </div>
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
    @include('admin.common.js.rich-text-options-object')
    @include('admin.common.js.file-input-options-object')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\EmployeeRequest', '#form'); !!}
    <script>
        $(document).ready(function() {
            let isUpdateAction = '{{ isset($model) }}';
            let imageUrl = '{{ isset($model) ? $model->getImage() : null }}';
            let caption = '{{ isset($model) ? $model->image : null }}';

            $("#image").fileinput(getFileInputOptions(isUpdateAction, imageUrl, caption));
        });

        $('#description-ua').richText(getRichTextOptions());
        $('#description-en').richText(getRichTextOptions());
        $('#description-ru').richText(getRichTextOptions());
    </script>
@stop
