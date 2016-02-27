<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Producto;
use App\Imagen;

class HomeController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }

    public function index(){
        $productos = Producto::all();

        $imagenes = Imagen::all();

        return view('home', compact('productos', 'imagenes'));
    }
}
