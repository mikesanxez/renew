<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Producto;
use App\Imagen;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }

    public function index(){
    	date_default_timezone_set("America/Mexico_City");
        $date = Carbon::now();
        $date = $date->format('Y-m-d'); 
        $term = Producto::Fecha($date)->get();

        $productos = Producto::all();
        $imagenes = Imagen::all();

        return view('home', compact('productos', 'imagenes', 'term'));
    }
}
