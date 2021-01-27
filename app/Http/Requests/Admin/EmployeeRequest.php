<?php

namespace App\Http\Requests\Admin;

use App\Models\Settings\Language;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $positionRules = $this->preparePositionRules();
        $rules = [
            'fio.*' => 'required',
            'description.*' => 'required',
            'image' => function(){
                return $this->isMethod('POST') ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : '';
            }
        ];

        return array_merge($positionRules, $rules);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fio.*.required' => 'Поле является обязательным для заполения.',
            'position.*.required_with' => 'Поле является обязательным для заполения, если хотя бы одно поле "Должность" (для любого языка) заполнено.',
            'description.*.required' => 'Поле является обязательным для заполения.',
            'image.required' => 'Поле является обязательным для заполения.',
        ];
    }

    /**
     * Preparing rules for translatable 'position' field. Like this:
     *   "position.ua" => "required_with:position.en,position.ru"
     *   "position.en" => "required_with:position.ua,position.ru"
     *   "position.ru" => "required_with:position.ua,position.en"
     *
     * @return array
     */
    private function preparePositionRules() : array
    {
        $rules = [];
        $activeLanguagesLocaleIds = Language::getActiveLanguagesLocaleIds();

        foreach ($activeLanguagesLocaleIds as $key => $localeId) {
            $localesExceptCurrentLoopLocale = ($this->getLocalesExceptCurrentLoopLocale($key, $activeLanguagesLocaleIds));
            $rules['position.' . $localeId] = 'required_with:' . $this->buildRule($localesExceptCurrentLoopLocale);
        }

        return $rules;
    }

    /**
     * Returns locales array without current loop locale
     *
     * @param $key
     * @param $locales
     * @return array
     */
    private function getLocalesExceptCurrentLoopLocale($key, $locales) : array
    {
        unset($locales[$key]);
        return $locales;
    }

    /**
     * Returns rule string for validator 'required_with'
     *
     * @param $localesExceptCurrentLoopLocale
     * @return string
     */
    private function buildRule($localesExceptCurrentLoopLocale) : string
    {
        $rules = [];
        foreach ($localesExceptCurrentLoopLocale as $locale) {
            $rules[] = 'position.' . $locale;
        }
        $rules = implode(',', $rules);
        return $rules;
    }
}
