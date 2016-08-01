<?php

namespace App\Http\Requests\Controle;

use App\Http\Requests\Request;

class UsuarioRequest extends Request
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
            'grupo_usuario_id' => 'required',
            'nome' => 'required',
            'email' => 'required|unique:usuarios',
        ];
    }
}
