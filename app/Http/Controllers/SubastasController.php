<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProductoCreateRequest;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Imagen;
use Carbon\Carbon;
use App\Comentario;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Oferta;

class SubastasController extends Controller
{
    public function create(){
        //regresa la vista que tiene el formulario de la subasta
    	return view('subastas.Crear');
    }

    public function store(ProductoCreateRequest $request){
        /*ProductoCreateRequest es el filtro que evalua las reglas de validación
        del formulario las cuales se encuentran en http/requests/ProductoCreateRequest.php*/
    	// guarda el producto de la subasta creada
    	$producto  = Producto::create([
            'Nombre' => $request->input('Nombre'),
            'Descripcion' => $request->input('Descripcion'),
            'Precio_inicial' => $request->input('Precio_inicial'),
            'Precio_max' => $request->input('Precio_max'),
            'Fecha_inicio' => $request->input('Fecha_inicio'),
            'Fecha_fin' => $request->input('Fecha_fin'),
            'users_id' => \Auth::user()->id,
            'Estatus' => 'Disponible',
            ]);
        //esta parte es para guardar las imagenes
        for ($i=1; $i < 4; $i++){ 
	    	$image = new Imagen();  
	        $file = $request->file('Imagen_'.$i);
            //se evalua si los campos estan vacios si no obtiene las variables a guaradar
	        if($file != null){
	            $nombre = $file->getClientOriginalName();
	            $mime = $file->getClientOriginalExtension();
	            $tamaño = $file->getClientSize()/1024;
	            $file->move(public_path().'/images/', $nombre);
	        }else{
	        	break;
	        }
	        //este metodo es para convertir la imagen en binario
	        $imagen = public_path().'/images/'.$nombre;
	        $fp = fopen($imagen, 'r');
	        if($fp){
	            $datos = fread($fp, filesize($imagen));
	            fclose($fp);
	        }
            //finalmente se guardan los campos en la base de datos
	        $image->Nombre  = $nombre; 
	        $image->Tamaño  = $tamaño;
	        $image->Mime    = $mime;
	        $image->Archivo = $datos;
	        $image->Producto_id = $producto->id;
	        $image->save();
        }//fin for

        //mensaje de alerta para cuando se guarda la subasta
        \Session::flash('message', 'Subasta Creada Correctamente');

        //redirecciona a la ruta de home
    	return redirect('home');
    }

    public function show(Request $request, $Id){
        //metodo para visualizar el perfil de las subasta
        //se hacen consultas para obtener los datos que se van a imprimir en la vista
    	$id = base64_decode($Id);
    	$producto = Producto::find($id);
    	$imagenes = Imagen::all();
    	return view('subastas.Subasta', compact('producto', 'imagenes'));
    }

    public function comentario(Request $request, $id){
        //metodo para guardar los comentarios de la subasta que se este revisando
        //se encuentra el producto que se esta visualizando
        $producto = Producto::find($id);
        // se guarda el comentario con el id del producto
        $comentario = Comentario::create([
            'Contenido'     => $request->input('Contenido'),
            'Fecha'         =>  Carbon::now(),
            'Producto_id'   => $producto->id,
            ]);
        // se redirecciona a la misma página ya con el comentario impreso
        return redirect::back();
    }

    public function oferta(Request $request, $id){
        //metodo para guardar las ofertas de la subasta que se este revisando
        //se encuentra el producto que se esta visualizando
        $producto = Producto::find($id);
        // se guarda el comentario con el id del producto
        $oferta = Oferta::create([
            'Cantidad'      => $request->input('Cantidad'),
            'Producto_id'   => $id,
            ]);
        // se redirecciona a la misma página ya con el comentario impreso
        return redirect::back();
    }
}
