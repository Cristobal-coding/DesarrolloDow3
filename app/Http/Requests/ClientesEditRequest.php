<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesEditRequest extends FormRequest
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
            
            'nombre' => 'required|min:2|max:23',
            'fono'=>'required|digits:8',
            
        ];
    }
    public function messages(){
        return[
            'nombre.required' => 'Indique el nombre del cliente',
            'nombre.min' => 'Nombre debe tener minimo 2 letras.',
            'nombre.max' => 'Nombre debe tener maximo 23 letras.',
            'fono.required' => 'Indique el fono del cliente',
            'fono.digits' => 'Ingrese fono de 8 digitos.'
        ];
    }
}
