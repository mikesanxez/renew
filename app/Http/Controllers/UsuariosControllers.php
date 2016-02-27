<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UsuariosControllers extends Controller
{
    public function show(Request $request, $Id){
    	$id = base64_decode($Id);
    	$usuario = User::find($id);

    	return view('usuarios.Perfil', compact('usuario'));
    }
}
