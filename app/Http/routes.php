<?php

Route::get('/', function () {
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

    Route::get('perfil/{id}', 'UsuariosControllers@show');
});

Route::group(['middleware' => 'web'], function () {
	//rutas para el login e incluye home
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

