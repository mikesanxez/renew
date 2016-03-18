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
    	//metodo para mostrar los datos del ususario
    	$id = base64_decode($Id);
    	$usuario = User::find($id);
    	return view('usuarios.Perfil', compact('usuario'));
    }

    public function update(UsuarioEditRequest $request, $id){
    	//metodo para actualizar los datos del usuario

    	//se crea una consulta para encontrar el usuario a editar y se guarda en la variable usuario
    	$usuario = User::find($id);

    	//se acceden a los campos de la busqueda, es decir, los campos que se tienen en la base de datos y se les asigna los valores que se recopilan del formulario 
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
    	$usuario->save(); //con el metodo save se guardan todos los datos que fueron asignados

    	//mensaje de confirmación
    	\Session::flash('message', 'Datos actualizados correctamente');
    	//se redirecciona a la página actual
    	return redirect::back();
    }

    public function destroy($Id){
    	//metodo para borrar la cuenta del usuario
        $id = base64_decode($Id); //se decodifica el id del usuario que se envia a través de la ruta
        $user = User::find($id); // se hace la consulta con el ORM de laravel para encontrar el usuario a borrar
        $user->delete(); //se usa el metodo delete del ORM de laravel para eleminiar el usuario
        
        //mensaje de confirmacion de la accion
        \Session::flash('message', 'Tu cuenta ha sido borrada correctamente');

        //se redirecciona a la ruta de home de la aplicación
        return redirect('home');
    }
}
