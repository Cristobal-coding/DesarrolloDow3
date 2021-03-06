<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArriendosEditRequest extends FormRequest
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
            'rut_cliente'=>'required|exists:clientes,rut_cliente',
            'fechaInicio' => 'required',
            'fechaFinal' => 'required|after:fechaInicio',
            'fechaEntrega' => 'required|after:fechaInicio',
        ];
    }
    public function messages(){
        return[
            'rut_cliente.exists'=>'Ingrese un rut valido',
            'rut_cliente.required'=>'Ingrese un rut valido',
            'fechaInicio.required'=>'Ingrese una fecha valida',
            'fechaFinal.required'=>'Ingrese una fecha valida',
            'fechaEntrega.required'=>'Ingrese una fecha valida',
            'fechaFinal.after'=>'Ingrese una fecha final valida, despues de la fecha de inicio',
            'fechaEntrega.after'=>'Ingrese una fecha de entrega valida, despues de la fecha de inicio',
        ];
    }
}