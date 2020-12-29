<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPassRequest extends FormRequest
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
            'passwordanterior' => 'password',
            'password' => 'required|min:5|max:12|same:password2',
        ];
    }
    public function messages(){
        return[
            'password_actual.required' => 'Indique contraseña',
            'password.required' => 'Indique contraseña',
            'password.min' => 'Password debe contener minimo 5 caracteres',
            'password.max' => 'Password debe contener maximo 12 caracteres',
            'password.same' => 'Contraseñas deben coincidir'
        ];
    }
}