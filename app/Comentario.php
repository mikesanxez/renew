<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public $timestamps = false;
    protected $table = 'Comentario';

    protected $fillable = ['Fecha', 'Contenido', 'Producto_id'];

    public function producto(){
    	return $this->belongsTo('Productos');
    }

    public function user(){
    	return $this->producto->user;
    }
}
