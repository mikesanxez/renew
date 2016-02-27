@extends('layouts.Master')

@section('body')
<div class="container">
    <div class="row">
        <label>Subastas</label>
        <div>
            @foreach ($productos as $producto)
                <section class="col-md-3">
                    <section class="form-group">
                        @foreach ($imagenes as $imagen)
                            @if ($producto->id == $imagen->Producto_id)                        
                                <img src="data:image/$imagen->Mime;base64,{{chunk_split(base64_encode($imagen->Archivo))}}"  width="35%" />
                            @endif
                        @endforeach                 
                    </section>
                    <section class="form-group">
                        <label>Producto</label>
                        {{$producto->Nombre}}
                    </section>
                    <section class="form-group">
                        <label>Descripción</label>
                        {{$producto->Descripcion}}
                    </section>
                    <section class="form-group">    
                        <label>Precio Inicial</label>
                        {{$producto->Precio_inicial}}
                    </section>
                    <section class="form-group">    
                        <label>Inicio en</label>
                        {{$producto->Fecha_inicio}}
                    </section>
                    <section class="form-group">    
                        <label>Termina en</label>
                        {{$producto->Fecha_fin}}
                    </section>
                    <section class="form-group">    
                        <a href="subasta/{{base64_encode($producto->id)}}" class="btn btn-success">Ver Detalles</a>
                    </section> 
                </section>
            @endforeach    
        </div>
    </div>
</div>
@endsection
