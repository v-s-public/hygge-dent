@section('plugins.JsValidation', true)
<div class="row">
    <div class="col-12">
        @foreach($activeLanguages as $language)
            <div class="form-group">
                <label for="price_position_name_{{ $language->language_locale_id }}">Наименование позиции ({{ $language->language_label }}.)<span class="required-field-asterisk">*</span></label>
                <input type="text" class="form-control" id="price_position_name_{{ $language->language_locale_id }}" name="price_position_name[{{ $language->language_locale_id }}]" value="{{ isset($model) ? $model->getTranslation('price_position_name', $language->language_locale_id) : '' }}">
            </div>
        @endforeach
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
