@extends('layouts.Master') <!-- herencia de la plantilla maestra-->

@section('title') Crear Subasta @stop <!-- modificamos el titulo de la página-->

@section('body') <!-- Modificamos el body de la plantilla maestra para que cambie en esta página-->
	<!-- formulario para crear la subasta-->
	<section class="container">
		<section class="row">
			<section class="col-md-8">
				<h1>Crear Subasta</h1>
				{!!Form::open(['url' => 'crear/subasta','files' => true, 'method' => 'POST'])!!}
					<div class="form-group">
						{!!Form::label('Nombre del producto',null, ['class' => 'control-label'])!!}
						{!!Form::text('Nombre', null, ['class' => 'form-control'])!!}
					</div>
					<div class="form-group">
						{!!Form::label('Duracion de la subasta',null, ['class' => 'control-label'])!!}<br>
						{!!Form::label('De',null, ['class' => 'control-label'])!!}
						{!!Form::date('Fecha_inicio', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
						{!!Form::label('Hasta',null, ['class' => 'control-label'])!!}
						{!!Form::date('Fecha_fin', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
					</div>
					<div class="form-group">
						{!!Form::label('Descripción',null, ['class' => 'control-label'])!!}
						{!!Form::textarea('Descripcion', null, ['class' => 'form-control',
						'rows' => 3])!!}
					</div>
					<div class="form-group">
						{!!Form::label('Fotografías',null, ['class' => 'control-label'])!!}
						{!!Form::file('Imagen_1', null, ['class' => 'form-control'])!!}
					</div>
					<div class="form-group">
						{!!Form::file('Imagen_2', null, ['class' => 'form-control'])!!}
					</div>
					<div class="form-group">
						{!!Form::file('Imagen_3', null, ['class' => 'form-control'])!!}
					</div>
					<div class="form-group">
						{!!Form::label('Empieza en',null, ['class' => 'control-label'])!!}
						{!!Form::number('Precio_inicial', null, ['class' => 'form-control',
						'rows' => 3])!!}
					</div>
					<div class="form-group">
						{!!Form::label('Precio Máximo',null, ['class' => 'control-label'])!!}
						{!!Form::number('Precio_max', null, ['class' => 'form-control'])!!}
					</div>
					<div class="form-group">
						{!!Form::submit('Crear Subasta', ['class' => 'btn btn-success'])!!}
					</div>
				{!!Form::close()!!}	
			</section>
		</section>
	</section>

@stop