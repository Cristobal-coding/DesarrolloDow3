<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DigitoVerificadorRut;

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
            'rut'=>['required','unique:clientes,rut_cliente','regex:/^(\d{7,8}-[\dkK])$/',new DigitoVerificadorRut],
            'nombre' => 'required|min:2|max:23',
            'fono'=>'required|digits:8',
            
        ];
    }
    public function messages(){
        return[
            'rut.required' => 'Indique el rut del cliente',
            'rut.regex' => 'indique RUT sin puntos con guion y con digito verificador',
            'rut.unique' => 'Ya está registrado el rut :input.',
            'nombre.required' => 'Indique el nombre del cliente',
            'nombre.min' => 'Nombre debe tener minimo 2 letras.',
            'nombre.max' => 'Nombre debe tener maximo 23 letras.',
            'fono.required' => 'Indique el fono del cliente',
            'fono.digits' => 'Ingrese fono de 8 digitos.'
        ];
    }
}
