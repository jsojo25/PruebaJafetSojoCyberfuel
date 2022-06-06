<?php

namespace Clientes\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesEditRequest extends FormRequest
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
            'Nombre'=>'required',
            'Apellido1'=>'required',
            'Apellido2'=>'required',
            'CorreoContacto'=>'required|email',
            'Telefono'=>'required'
        ];
    }
}
