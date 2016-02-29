<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class UsuarioEditRequest extends Request
{
    
    public function __construct(Route $route){
        $this->route = $route;
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'regex:/^[\pL\s]+$/u'],
            'email' => 'required|unique:users,email,'.$this->route->getParameter('id'),
            'apellido' => ['required', 'regex:/^[\pL\s]+$/u'],
            'telefono' => 'required|numeric',
            'username' => 'required|alpha_num',
            'estado' => 'alpha',
            'ciudad' => 'alpha',
            'direccion' => ['required', 'regex:/^[0-9#.\pL\s]+$/u'],
            'colonia' => ['required', 'regex:/^[0-9#.\pL\s]+$/u'],
            'CP' => 'numeric',
        ];
    }
}
