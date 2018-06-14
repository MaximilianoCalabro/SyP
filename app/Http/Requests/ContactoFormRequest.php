<?php

namespace SyP\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoFormRequest extends FormRequest
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
            'direccion' => 'required|max:250',
            'ubicacion' => 'required|max:250',
            'telefono' => 'required|max:50',
            'correo' => 'required|max:50',
        ];
    }
}
