<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $timestamps = false;
    protected $table = 'Categoria';

    public function productos(){
    	return $this->belongsToMany('App\Producto', 'Producto_has_Categoria');
    }
}
