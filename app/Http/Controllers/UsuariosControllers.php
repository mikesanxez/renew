<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UsuarioEditRequest;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Redirect;

class UsuariosControllers extends Controller
{
    public function show(Request $request, $Id){
    	$id = base64_decode($Id);
    	$usuario = User::find($id);
    	return view('usuarios.Perfil', compact('usuario'));
    }

    public function update(UsuarioEditRequest $request, $id){
    	$usuario = User::find($id);

    	$usuario->name = $request->input('name');
    	$usuario->apellido = $request->input('apellido');
    	$usuario->estado = $request->input('estado');
    	$usuario->ciudad = $request->input('ciudad');
    	$usuario->direccion = $request->input('direccion');
    	$usuario->colonia = $request->input('colonia');
    	$usuario->telefono = $request->input('telefono');
    	$usuario->email = $request->input('email');
    	$usuario->username = $request->input('username');
    	$usuario->CP = $request->input('CP');
    	$usuario->save();

    	\Session::flash('message', 'Datos actualizados correctamente');
    	return redirect::back();
    }
}
