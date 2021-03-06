<?php

namespace SyP\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuienesFormRequest extends FormRequest
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
            'imagen' => 'required|max:250',
            'titulo' => 'required|max:50',
            'texto' => 'required|max:500',
        ];
    }
}
