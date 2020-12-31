<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ArriendosRequest extends FormRequest
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
            'fecha_recogida' => 'required',
            "fecha_devolucion" => 'required|after:fecha_recogida'
        ];
    }
    public function messages(){
        return[
            'fecha_devolucion.required' => 'Debe ingresar la fecha de devolucion.',     
            'fecha_recogida.required' => 'Debe ingresar la fecha de inicio',
            'fecha_devolucion.after' => 'La devolucion debe ser despues a la fecha de inicio',     
        ];
    }
}
