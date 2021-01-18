<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'description.*' => 'required',
            'image' => function(){
                return $this->isMethod('POST') ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : '';
            }
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
            'description.*.required' => 'Поле является обязательным для заполения.',
        ];
    }
}
