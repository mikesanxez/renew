<?php
use App\User;
Route::get('/', function () {
 /*   User::create([
        'name' => 'Administrador',
        'apellido' => 'Admin',
        'username' => 'Admin',
        'email' => 'admin@renew.mx',
        'telefono' => '0000000000',
        'password' => bcrypt('123abc'),
        'rol_id' => '1',
        ]);
*/
    return redirect('home');
});

Route::group(['middleware' => ['web']], function () {
	//rutas para crear subasta
    Route::get('crear/subasta', 'SubastasController@create');
    Route::post('crear/subasta', 'SubastasController@store');
    //Ruta para ver perfil de subasta
    Route::get('subasta/{id}', 'SubastasController@show');
    //rutas para guardar comentarios y ofertas
    Route::post('subasta/comentar/{id}', 'SubastasController@comentario');
    Route::post('subasta/ofertar/{id}', 'SubastasController@oferta');
    //rutas para notificacion
    Route::get('notificacion/{id}', 'SubastasController@notificacion');

    //rutas del admin
    Route::get('usuarios', 'AdminController@index');

    Route::get('perfil/{id}', 'UsuariosControllers@show');
    Route::post('perfil/{id}', 'UsuariosControllers@update');
    Route::get('borrar/{id}', 'UsuariosControllers@destroy');
});

Route::group(['middleware' => 'web'], function () {
	//rutas para el login e incluye home
    Route::auth();

    Route::get('/home', 'HomeController@index');
});


