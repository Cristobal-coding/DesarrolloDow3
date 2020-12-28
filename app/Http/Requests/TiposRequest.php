<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TiposRequest extends FormRequest
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
            'nombre' => 'required|min:2|max:23|unique:tipo_vehiculo,nombre_tipo',
            'valor'=>'required|numeric',       
        ];
    }
    public function messages(){
        return[
            'nombre.required' => 'Indique el nombre del tipo de vehiculo.',
            'nombre.unique' => 'El tipo de vehiculo ya ha sido ingresado',
            'nombre.min' => 'Nombre debe tener minimo 2 letras.',
            'nombre.max' => 'Nombre debe tener maximo 23 letras.',
            'valor.required' => 'Ingrese un valor.',
            'valor.numeric' => 'Ingrese un valor compuesto solo por numeros',
            
        ];
    }
}
