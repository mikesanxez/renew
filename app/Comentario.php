<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public $timestamps = false;
    protected $table = 'Comentario';

    protected $fillable = ['Fecha', 'Contenido', 'Producto_id', 'users_id'];

    public function producto(){
    	return $this->belongsTo('Producto', 'Producto_id');
    }

    public function usuario(){
    	return $this->belongsTo('App\User', 'users_id');
    }
}
