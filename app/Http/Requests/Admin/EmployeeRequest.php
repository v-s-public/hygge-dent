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
            'fio-ua' => [
                'required'
            ],
            'fio-en' => [
                'required'
            ],
            'fio-ru' => [
                'required'
            ],

            'position-ua' => [
                'required_with:position-en,position-ru'
            ],
            'position-en' => [
                'required_with:position-ua,position-ru'
            ],
            'position-ru' => [
                'required_with:position-ua,position-en'
            ],

            'description-ua' => [
                'required'
            ],
            'description-en' => [
                'required'
            ],
            'description-ru' => [
                'required'
            ],

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
            'fio-ua.required' => 'Поле является обязательным для заполения.',
            'fio-en.required' => 'Поле является обязательным для заполения.',
            'fio-ru.required' => 'Поле является обязательным для заполения.',

            'position-ua.required_with' => 'Поле является обязательным для заполения, если хотя бы одно поле "Должность" (для Англ. или Рус.) заполнено.',
            'position-en.required_with' => 'Поле является обязательным для заполения, если хотя бы одно поле "Должность" (для Укр. или Рус.) заполнено.',
            'position-ru.required_with' => 'Поле является обязательным для заполения, если хотя бы одно поле "Должность" (для Укр. или Англ.) заполнено.',

            'description-ua.required' => 'Поле является обязательным для заполения.',
            'description-en.required' => 'Поле является обязательным для заполения.',
            'description-ru.required' => 'Поле является обязательным для заполения.',
        ];
    }
}
