@section('plugins.JsValidation', true)
<div class="row">
    <div class="col-12">
        @foreach($activeLanguages as $language)
            <div class="form-group">
                <label for="price_section_name_{{ $language->language_locale_id }}">Название раздела ({{ $language->language_label }}.)<span class="required-field-asterisk">*</span></label>
                <input type="text" class="form-control" id="price_section_name_{{ $language->language_locale_id }}" name="price_section_name[{{ $language->language_locale_id }}]" value="{{ isset($model) ? $model->getTranslation('price_section_name', $language->language_locale_id) : '' }}">
            </div>
        @endforeach
    </div>
</div>

@section('js')
    {!! JsValidator::formRequest(App\Http\Requests\Admin\Content\Prices\PriceSectionRequest::class, '#form'); !!}
@stop
