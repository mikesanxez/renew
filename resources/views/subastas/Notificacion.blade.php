@extends('layouts.Master')

@section('title') Notificaciones @stop

@section('body')
<section class="container">
	<section class="row">
		@if (isset($term))                    
	        @foreach ($term as $subasta)
	            
	                <ul>
	                	<li>{{$subasta->Nombre}}</li>
	                </ul>
	            
	        @endforeach
	    @endif    
	</section>
</section>
@stop