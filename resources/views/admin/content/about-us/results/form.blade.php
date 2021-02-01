@section('plugins.JsValidation', true)
<div class="row">
    <div class="col-12">
        @foreach($activeLanguages as $language)
            <div class="form-group">
                <label for="title_{{ $language->language_locale_id }}">Результат ({{ $language->language_label }}.)<span class="required-field-asterisk">*</span></label>
                <input type="text" class="form-control" id="title_{{ $language->language_locale_id }}" name="title[{{ $language->language_locale_id }}]" value="{{ isset($model) ? $model->getTranslation('title', $language->language_locale_id) : '' }}">
            </div>
        @endforeach
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="count">Количество<span class="required-field-asterisk">*</span></label>
            <input type="number" step="1" min="1" class="form-control" id="count" name="count" value="{{ isset($model) ? $model->count: '' }}">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="icon">Иконка (css-класс)<span class="required-field-asterisk">*</span></label>
            <input type="text" class="form-control" id="icon" name="icon" value="{{ isset($model) ? $model->icon: '' }}">
        </div>
    </div>
</div>

@section('js')
    {!! JsValidator::formRequest(App\Http\Requests\Admin\Content\AboutUs\ResultRequest::class, '#form'); !!}
@stop
