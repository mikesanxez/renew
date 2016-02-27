<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'Oferta';
    public $timestamps = false;

    protected $fillable = ['Cantidad', 'Producto_id'];

    public function producto(){
    	return $this->belongsTo('App\Producto', 'Producto_id');
    }

    public function user(){
    	return $this->producto->user;
    }
}
