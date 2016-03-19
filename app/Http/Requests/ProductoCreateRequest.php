<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductoCreateRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    { //reglas de validación para el formulario de creacion de subasta
        return [
            'Nombre'            => ['required', 'regex:/^[\pL\s]+$/u'],
            'Fecha_inicio'      => 'required|date',
            'Fecha_fin'         => 'required|date',
            'Descripcion'       => ['regex:/^[0-9#,.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'Imagen_1'          => 'required|image',
            'Imagen_2'          => 'image',
            'Imagen_3'          => 'image',
            'Precio_inicial'    => 'required|numeric',
            'Precio_max'        => 'required|numeric',
        ];
    }
}
