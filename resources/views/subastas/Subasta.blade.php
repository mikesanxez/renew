@extends('layouts.Master')

@section('title') Subasta @stop

@section('body')

	<section class="container">
		<section class="row">
		<!-- Aqui se comienzan a imprimir los datos del prodcuto que se esta subastando -->
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
				@endif
			</section>
		</section>
		<br>
		<!-- Formulario para ofertar -->
		<section class="row">
			<section class="col-md-3">
				{!!Form::open(['url' => ['subasta/ofertar', $producto->id], 'method' => 'POST'])!!}
					<section class="form-group">
						<label>Cantidad a Ofertar</label>
						{!!Form::number('Cantidad', null, ['class' => 'form-control'])!!}
					</section>
					{!!Form::submit('Ofertar',['class' => 'btn btn-success'])!!}
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
	</section>
@stop