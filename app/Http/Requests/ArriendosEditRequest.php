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
            'rut_cliente'=>'exists:clientes,rut_cliente',
            'vendedor'=>'exists:usuarios,id',
            'fechaInicio' => 'required',
            'fechaFinal' => 'required|after:fechaInicio',
            'fechaEntrega' => 'required|after:fechaInicio',
        ];
    }
    public function messages(){
        return[
            'rut_cliente.exists'=>'Ingrese un rut valido',
            'vendedor.exists'=>'Ingrese un vendedor valido',
            'fechaInicio.required'=>'Ingrese una fecha valida',
            'fechaFinal.required'=>'Ingrese una fecha valida',
            'fechaEntrega.required'=>'Ingrese una fecha valida',
            'fechaFinal.after'=>'Ingrese una fecha valida, despues de la fecha de inicio',
            'fechaEntrega.after'=>'Ingrese una fecha valida, despues de la fecha de inicio',
        ];
    }
}