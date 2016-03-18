<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    protected $table = 'Producto';

    protected $fillable = ['Nombre', 'Descripcion', 'Precio_inicial', 'Precio_max', 'Estatus'
    ,'Fecha_inicio', 'Fecha_fin','users_id'];

    public function imagenes(){
    	return $this->hasMany('App\Imagen');
    }

    public function ofertas(){
    	return $this->hasMany('App\Oferta');
    }

    public function comentarios(){
    	return $this->hasMany('App\Comentario');
    }

    public function catogorias(){
    	return $this->belongsToMany('App\Categorias', 'Producto_has_Categoria');
    }

    public function user(){
        return $this->belongsTo('App\User', 'users_id');
    }

    public function scopeFecha($query, $term){
        $query->where("Fecha_fin", "<=", "$term");
    }
}
