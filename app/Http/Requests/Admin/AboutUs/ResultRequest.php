<?php

namespace App\Http\Requests\Admin\AboutUs;

use Illuminate\Foundation\Http\FormRequest;

class ResultRequest extends FormRequest
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
            'title.*' => 'required',
            'icon' => 'required',
            'count' => 'required|integer|min:1'
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
            'title.*.required' => 'Поле является обязательным для заполения.',
            'icon.required' => 'Поле является обязательным для заполения.',
            'count.required' => 'Поле является обязательным для заполения.',
        ];
    }
}
