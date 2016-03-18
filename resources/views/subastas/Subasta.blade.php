@extends('layouts.Master')

@section('title') Subasta @stop

@section('head')
<script>

function float2int (value) {
    return value | 0;
}
	$(document).on("ready", function(){
		var sesion = $("#sesion").val();
		var pi = $("#pi").val();
		var pm = $("#pm").val();
		var uo = $("#uo").val();
		var ultima = $("#ultima").val();
		$("#ofertar").on("click", function(e){ 
			if (sesion > 0){
				if (float2int($("#cantidad").val()) > float2int(pi) 
					&& float2int($("#cantidad").val()) <= float2int(pm)
						&& float2int($("#cantidad").val()) > float2int(uo)){
				}else{
					alert('Pública una cantidad valida');
					e.preventDefault();
				}
			}else{
				alert('Inicia sesion para poder públicar');
				e.preventDefault();
			}
		});
	});
</script>
@stop

@section('body')

	<section class="container">
		<section class="row">
		<!-- Aqui se comienzan a imprimir los datos del prodcuto que se esta subastando -->
		@if (isset($boll))
		<strong><h1>SUBASTA CERRADA</h1></strong>
		@endif
		<h1>{{$producto->Nombre}}</h1> 
		<!-- ciclo poara imprimir las imagenes-->
			@foreach ($imagenes as $imagen)
			<!-- Compara el id del producto con la llave foranea y ve si la imagen corresponde al producto de ser asi se imprime -->
				@if ($producto->id == $imagen->Producto_id)
					<section class="col-md-3">
					<!-- impresion de imagen desde la base de datos -->
						<img src="data:image/$imagen->Mime;base64,{{chunk_split(base64_encode($imagen->Archivo))}}"  width="70%" />
					</section>
				@endif
			@endforeach
			<section class="form-group">
				<label>Descripción</label>
				{{$producto->Descripcion}}
			</section>
			<section class="form-group">
				<label>Precio Inicial</label>
				${{$producto->Precio_inicial}}
			</section>
			<section class="form-group">
				<label>Precio Máximo</label>
				${{$producto->Precio_max}}
			</section>
			<section class="form-group">
				<label>Inicio</label>
				{{$producto->Fecha_inicio}}
			</section>
			<section class="form-group">
				<label>Termina en:</label>
				{{$producto->Fecha_fin}}
			</section>
			<section class="form-group">
				<label>Ultima oferta:</label>
				@if (count($producto->ofertas) != null)
					${{$producto->ofertas->last()->Cantidad}}
					@if(!empty($usuario->name))
					<strong>hecha por:</strong> {{$usuario->name}}
					@endif
				@endif
			</section>
			<section class="form-group">
				<label>públicado por:</label>
					{{$producto->user->name}}
			</section>
		</section>
		<br>
		@if (!Auth::guest())
				<input type="hidden" value="{{Auth::user()->id}}" id="sesion">
				<input type="hidden" value="{{$producto->Precio_inicial}}" id="pi">
				<input type="hidden" value="{{$producto->Precio_max}}" id="pm">
				<input type="hidden" value="{{$producto->ofertas->last()->Cantidad}}" id="uo">
				@if (count($producto->ofertas) != null)
					<input type="hidden" value="{{$producto->ofertas->last()->Cantidad}}" id="ultima">
				@endif
		@endif
		<!-- Formulario para ofertar -->
		@if (!isset($boll))
		<section class="row">
			<section class="col-md-3">
				{!!Form::open(['url' => ['subasta/ofertar', $producto->id], 'method' => 'POST'])!!}
					<section class="form-group">
						<label>Cantidad a Ofertar</label>
						{!!Form::number('Cantidad', null, ['class' => 'form-control', 'id' =>'cantidad'])!!}
					</section>
					{!!Form::submit('Ofertar',['class' => 'btn btn-success', 'id' => 'ofertar'])!!}
				{!!Form::close()!!}
			</section>
		</section>

		<!--Formulario para comentar o preguntar -->
		<section class="row">
			<section class="col-md-12">
				{!!Form::open(['url' => ['subasta/comentar', $producto->id], 'method' => 'POST'])!!}
					<section class="form-group">
						<label>Comentar</label>
						{!!Form::textarea('Contenido', null, ['class' => 'form-control', 'rows' => 4])!!}
					</section>
					{!!Form::submit('Publicar comentario',['class' => 'btn btn-primary'])!!}
				{!!Form::close()!!}
			</section>
		</section>
		<!-- Se imprimen los comentarios de la subasta -->
		<section class="row">
			<section class="col-md-9">
				@foreach($producto->comentarios as $coment)
					<div class="form-group">
					<label>Publicado por:</label> {{$coment->usuario}}
						{{$coment->Contenido}}
					</div>	
				@endforeach
			</section>	
		</section>
		@endif
	</section>
@stop