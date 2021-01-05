<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculosRequest extends FormRequest
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
            "nombre" => 'required|min:2|max:20',
            "marca" => 'required|min:2|max:20',
            "foto" => 'required',
            "patente" => 'required|unique:vehiculos,patente|regex:/^([A-Z]{2}-[A-Z]{2}-[0-9]{2})?$/',
            "nombre_tipo" => 'required|exists:tipo_vehiculo,nombre_tipo'
        ];


    }
    public function messages(){
        return[

            'nombre.required'=>'Se requiere ingresar nombre de vehiculo.',
            'nombre.min'=>'Nombre de vehiculo debe ser mayor a 2 caracteres.',
            'nombre.max'=>'Nombre de vehiculo debe ser menor a 20 caracteres.',
            'foto.required'=>'Se debe incluir foto del auto.',
            'marca.required'=>'Se requiere ingresar marca de vehiculo.',
            'marca.min'=>'Marca de vehiculo debe ser mayor a 2 caracteres.',
            'marca.max'=>'Marca de vehiculo debe ser menor a 20 caracteres.',
            'patente.required'=>'Ingresar Patente',
            'patente.unique'=> 'Patente ya ingresada, ingresar nueva patente.',
            'patente.regex' => 'Patente invalida. 
                FORMATO (AA-BB-11)',
            "nombre_tipo.exists" => 'Ingrese valor  valido.',
            "nombre_tipo.required" => 'Ingrese valor  valido.-*'
        ];
    }
}
