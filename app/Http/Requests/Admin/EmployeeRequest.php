<?php

namespace App\Http\Requests\Admin;

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
        return [
            'fio_ua' => [
                'required'
            ],
            'fio_en' => [
                'required'
            ],
            'fio_ru' => [
                'required'
            ],

            'position_ua' => [
                'required_with:position_en,position_ru'
            ],
            'position_en' => [
                'required_with:position_ua,position_ru'
            ],
            'position_ru' => [
                'required_with:position_ua,position_en'
            ],

            'description_ua' => [
                'required'
            ],
            'description_en' => [
                'required'
            ],
            'description_ru' => [
                'required'
            ],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

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
            'fio_ua.required' => 'Поле является обязательным для заполения.',
            'fio_en.required' => 'Поле является обязательным для заполения.',
            'fio_ru.required' => 'Поле является обязательным для заполения.',

            'position_ua.required_with' => 'Поле является обязательным для заполения, если хотя бы одно поле "Должность" (для Англ. или Рус.) заполнено.',
            'position_en.required_with' => 'Поле является обязательным для заполения, если хотя бы одно поле "Должность" (для Укр. или Рус.) заполнено.',
            'position_ru.required_with' => 'Поле является обязательным для заполения, если хотя бы одно поле "Должность" (для Укр. или Англ.) заполнено.',

            'description_ua.required' => 'Поле является обязательным для заполения.',
            'description_en.required' => 'Поле является обязательным для заполения.',
            'description_ru.required' => 'Поле является обязательным для заполения.',

            'image.required' => 'Поле является обязательным для заполения.',
        ];
    }
}
