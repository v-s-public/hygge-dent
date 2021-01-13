@section('plugins.JsValidation', true)
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="price_section_name_ua">Название раздела (укр.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="price_section_name_ua" name="price_section_name_ua" value="{{ isset($model) ? $model->getTranslation('price_section_name', 'ua') : '' }}">
        </div>
        <div class="form-group">
            <label for="price_section_name_en">Название раздела (англ.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="price_section_name_en" name="price_section_name_en" value="{{ isset($model) ? $model->getTranslation('price_section_name', 'en') : '' }}">
        </div>
        <div class="form-group">
            <label for="price_section_name_ru">Название раздела (рус.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="price_section_name_ru" name="price_section_name_ru" value="{{ isset($model) ? $model->getTranslation('price_section_name', 'ru') : '' }}">
        </div>
    </div>
</div>

@section('js')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\PriceSectionRequest', '#form'); !!}
@stop
