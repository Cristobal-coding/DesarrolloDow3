<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest
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
            'rut'=>'required|unique:clientes,rut_cliente',
            'nombre' => 'required|min:2|max:23',
            'fono'=>'required',
            
        ];
    }
    public function messages(){
        return[
            'rut.required' => 'Indique el rut del cliente',
            'rut.unique' => 'Ya está registrado el rut :input.',
            'nombre.required' => 'Indique el nombre del cliente',
            'nombre.min' => 'Nombre debe tener minimo 2 letras.',
            'nombre.max' => 'Nombre debe tener maximo 23 letras.',
            'fono.required' => 'Indique el fono del cliente',
        ];
    }
}
