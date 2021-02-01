@section('plugins.JsValidation', true)
<div class="row">
    <div class="col-12">
        @foreach($activeLanguages as $language)
            <div class="form-group">
                <label for="title_{{ $language->language_locale_id }}">Услуга ({{ $language->language_label }}.)<span class="required-field-asterisk">*</span></label>
                <input type="text" class="form-control" id="title_{{ $language->language_locale_id }}" name="title[{{ $language->language_locale_id }}]" value="{{ isset($model) ? $model->getTranslation('title', $language->language_locale_id) : '' }}">
            </div>
        @endforeach
    </div>
</div>

@section('js')
    {!! JsValidator::formRequest(App\Http\Requests\Admin\Content\ForPatients\ServiceRequest::class, '#form'); !!}
@stop
