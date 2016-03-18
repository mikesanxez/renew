@extends('layouts.Master')

@section('title') Usuarios Registrados @stop

@section('body')
	<section class="container">
		<section class="row">
			<div class="table-responsive">
		      <table  class="table table-datatable table-bordered" id="basicDataTable">
		        <thead>
		          <tr>
		               <th class="sort-alpha">Usuario</th>
		               <th class="sort-alpha">Nombre</th>
		               <th class="sort-alpha">Apellido</th>
		               <th class="sort-alpha">Email</th>
		               <th class="sort-alpha">Telefono</th>
		               <th class="sort-alpha">Subastas</th>
		               
		          </tr>
		        </thead>

		        <tbody>
		          @foreach ($usuarios as $usuario)
		             <tr class="odd gradeX">
		               <td>{{$usuario->username}}</td>
		               <td>{{$usuario->name}}</td>
		               <td>{{$usuario->apellido}}</td>
		               <td>{{$usuario->email}}</td>
		               <td>{{$usuario->telefono}}</td>
		               <td>
		               @foreach ($usuario->productos as $subasta)
		               	<a href="subasta/{{base64_encode($subasta->id)}}">{{$subasta->Nombre}}</a> <br>
		               @endforeach
		               </td>
		               

		             </tr>
		          @endforeach	
		        </tbody>
		      </table>
		    </div>
		</section>
	</section>
@stop