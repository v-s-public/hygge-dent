@section('plugins.JsValidation', true)
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="price_position_name_ua">Наименование позиции (укр.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="price_position_name_ua" name="price_position_name_ua" value="{{ isset($model) ? $model->getTranslation('price_position_name', 'ua') : '' }}">
        </div>
        <div class="form-group">
            <label for="price_section_name_en">Наименование позиции (англ.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="price_position_name_en" name="price_position_name_en" value="{{ isset($model) ? $model->getTranslation('price_position_name', 'en') : '' }}">
        </div>
        <div class="form-group">
            <label for="price_section_name_ru">Наименование позиции (рус.)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="price_position_name_ru" name="price_position_name_ru" value="{{ isset($model) ? $model->getTranslation('price_position_name', 'ru') : '' }}">
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="price_section_id">Раздел каталога<span class="required-field-asterisk">*</span></label>
                    <select class="form-control" id="price_section_id" name="price_section_id">
                        <option value="" disabled selected>Выберите раздел каталога</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->price_section_id }}" {{ isset($model) && $model->price_section_id == $section->price_section_id ? "selected" : ""}}>
                                {{ $section->price_section_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="price">Цена<span class="required-field-asterisk">*</span></label>
                    <input type="number" step="1" class="form-control" id="price" name="price" value="{{ isset($model) ? $model->price : '' }}">
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\PricePositionRequest', '#form'); !!}
@stop
