<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosEditRequest extends FormRequest
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
            'password' => 'required|min:5|max:12|same:password2',
        ];
    }
    public function messages(){
        return[
            'nombre.required' => 'Indique el nombre del usuario',
            'nombre.min' => 'Nombre debe tener minimo 2 letras.',
            'nombre.max' => 'Nombre debe tener maximo 23 letras.',
            'password.required' => 'Indique contraseña',
            'password.min' => 'Password debe contener minimo 5 caracteres',
            'password.max' => 'Password debe contener maximo 12 caracteres',
            'password.same' => 'Contraseñas deben coincidir'
        ];
    }
}
