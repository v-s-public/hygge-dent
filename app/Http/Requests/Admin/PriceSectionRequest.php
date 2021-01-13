<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PriceSectionRequest extends FormRequest
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
        return [
            'price_section_name_ua' => 'required',
            'price_section_name_en' => 'required',
            'price_section_name_ru' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'price_section_name_ua.required' => 'Поле является обязательным для заполения.',
            'price_section_name_en.required' => 'Поле является обязательным для заполения.',
            'price_section_name_ru.required' => 'Поле является обязательным для заполения.',
        ];
    }
}
