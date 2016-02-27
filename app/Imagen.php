<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    public $timestamps = false;
    protected $table = 'Imagen';

    protected $fillable = ['Nombre', 'Mime', 'Tamaño', 'Archivo'];

    public function producto(){
    	return $this->belongsTo('App\Producto', 'Producto_id');
    }
}
