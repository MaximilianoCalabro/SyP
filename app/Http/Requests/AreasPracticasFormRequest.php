<?php

namespace SyP\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreasPracticasFormRequest extends FormRequest
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
            'titulo' => 'required|max:50',
            'texto' => 'required|max:500',
            'imagen' => 'required|max:250',
            'practica' => 'required|max:50',
            'texto_practica' => 'required|max:500',
            'icono' => 'max:250',
        ];
    }
}
