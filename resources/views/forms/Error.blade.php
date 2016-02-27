@if($errors->any())
		<div class="alert alert-danger alert-dismissable" id = "msj-error" role="alert" >
			<p>Corrige los errores:</p>
			<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach	
			</ul>
		</div>	
@endif