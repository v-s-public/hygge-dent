@section('plugins.JsValidation', true)
@section('plugins.FileUploader', true)
@section('plugins.RichText', true)
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="fio_ua">Ф.И.О. (укр.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="fio_ua" name="fio_ua" value="{{ isset($model) ? $model->getTranslation('fio', 'ua') : '' }}">
        </div>
        <div class="form-group">
            <label for="fio_en">Ф.И.О. (англ.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="fio_en" name="fio_en" value="{{ isset($model) ? $model->getTranslation('fio', 'en') : '' }}">
        </div>
        <div class="form-group">
            <label for="fio_ru">Ф.И.О. (рус.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="fio_ru" name="fio_ru" value="{{ isset($model) ? $model->getTranslation('fio', 'ru') : '' }}">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="position_ua">Должность (укр.)</label>
            <input type="text" class="form-control" id="position_ua" name="position_ua" value="{{ isset($model) ? $model->getTranslation('position', 'ua') : '' }}">
        </div>
        <div class="form-group">
            <label for="position_en">Должность (англ.)</label>
            <input type="text" class="form-control" id="position_en" name="position_en" value="{{ isset($model) ? $model->getTranslation('position', 'en') : '' }}">
        </div>
        <div class="form-group">
            <label for="position_ru">Должность (рус.)</label>
            <input type="text" class="form-control" id="position_ru" name="position_ru" value="{{ isset($model) ? $model->getTranslation('position', 'ru') : '' }}">
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="description_ua">Описание (укр.)<span class="required-field-asterisk">*</span></label>
            <textarea  class="form-control rich-text-area" id="description_ua" name="description_ua" cols="30" rows="7">{{ isset($model) ? $model->getTranslation('description', 'ua') : '' }}</textarea>
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <label for="description_en">Описание (англ.)<span class="required-field-asterisk">*</span></label>
            <textarea  class="form-control" id="description_en" name="description_en" cols="30" rows="7">{{ isset($model) ? $model->getTranslation('description', 'en') : '' }}</textarea>
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <label for="description_ru">Описание (рус.)<span class="required-field-asterisk">*</span></label>
            <textarea  class="form-control" id="description_ru" name="description_ru" cols="30" rows="7">{{ isset($model) ? $model->getTranslation('description', 'ru') : '' }}</textarea>
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

        $('#description_ua').richText(getRichTextOptions());
        $('#description_en').richText(getRichTextOptions());
        $('#description_ru').richText(getRichTextOptions());
    </script>
@stop
