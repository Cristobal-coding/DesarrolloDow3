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
            "arriendo_fecha_final" => 'required|after:arriendo_fecha_inicio'
        ];
    }
    public function messages(){
        return[
            'arriendo_fecha_final.required' => 'Debe ingresar fecha final.',     
        
            'arriendo_fecha_final.after' => 'La devolucion debe ser despues a la fecha de inicio',     
        ];
    }
}
