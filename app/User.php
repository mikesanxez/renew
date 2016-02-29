<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    //especifica la tabla que representa el modelo
    protected $table = 'Users';

    //especifica los datos que son guardables en la base de datos
    protected $fillable = [
        'name', 'apellido', 'estado', 'ciudad', 'direccion', 'colonia', 'telefono', 'email',
        'rol_id', 'password', 'username', 'CP'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    //especifica las relaciones con los demas modelos
    public function productos(){
        return $this->hasMany('App\Producto');
    }

    public function rol(){
        return $this->belongsTo('App\Rol', 'Rol_id');
    }

    public function ofertas(){
        return $this->hasManyThrough('App\Oferta', 'App\Producto', 'users_id', 'Producto_id');
    }

    public function comentarios(){
        return $this->hasManyThrough('App\Comentario', 'App\Producto', 'users_id', 'Producto_id');
    }

}
