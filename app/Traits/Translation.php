<?php

namespace App\Traits;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

trait Translation
{
    public Collection $activeLanguages;

    public function __construct()
    {
        $this->activeLanguages = Language::getActiveLanguages();
        app()->setLocale('ru');
    }

    /**
     * Returns data for insert for translatable model. Like this:
     * 'field' => [
     *      'ua' => 'Значення',
     *      'en' => 'Value'
     *      'ru' => 'Значение'
     * ]
     *
     * @param FormRequest $request
     * @param string $fieldName
     * @return array
     */
    public function prepareTranslatesForInsertByFieldName(FormRequest $request, string $fieldName) : array
    {
        $requestData = $request->get($fieldName);
        $translates = [];

        foreach ($this->activeLanguages as $language) {
            $locale = $language->language_locale_id;
            $translates[$locale] = $requestData[$locale];
        }

        return $translates;
    }
}
