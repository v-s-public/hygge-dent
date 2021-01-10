@section('plugins.jsValidation', true)
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="fio-ua">Ф.И.О. (укр.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="fio-ua" name="fio-ua">
        </div>
        <div class="form-group">
            <label for="fio-en">Ф.И.О. (англ.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="fio-en" name="fio-en">
        </div>
        <div class="form-group">
            <label for="fio-ru">Ф.И.О. (рус.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="fio-ru" name="fio-ru">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="position-ua">Должность (укр.)</label>
            <input type="text" class="form-control" id="position-ua" name="position-ua">
        </div>
        <div class="form-group">
            <label for="position-en">Должность (англ.)</label>
            <input type="text" class="form-control" id="position-en" name="position-en">
        </div>
        <div class="form-group">
            <label for="position-ru">Должность (рус.)</label>
            <input type="text" class="form-control" id="position-ru" name="position-ru">
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="description-ua">Описание (укр.)<span class="required-field-asterisk">*</span></label>
            <textarea  class="form-control" id="description-ua" name="description-ua" cols="30" rows="7"></textarea>
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <label for="description-en">Описание (англ.)<span class="required-field-asterisk">*</span></label>
            <textarea  class="form-control" id="description-en" name="description-en" cols="30" rows="7"></textarea>
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <label for="description-ru">Описание (рус.)<span class="required-field-asterisk">*</span></label>
            <textarea  class="form-control" id="description-ru" name="description-ru" cols="30" rows="7"></textarea>
        </div>
    </div>
</div>

<hr>

<div class="form-group">
    <label for="exampleInputFile">File input</label><span class="required-field-asterisk">*</span>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text" id="">Upload</span>
        </div>
    </div>
</div>
@section('js')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\EmployeeRequest', '#form'); !!}
@stop
