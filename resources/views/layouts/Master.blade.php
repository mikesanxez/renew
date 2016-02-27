<!DOCTYPE html>
<!-- Plantilla maestra-->
<!-- con yield especificamos las partes que se van a ir remplazando en la plantilla maestra-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	@yield('head')
	
</head>
<body>
<!-- agrega la forma del menu que se encuentra en la carpeta resources/views/forms/Menu.blade.php -->
	@include('forms.Menu')	
  <script>
//funcion paa cerrar la alerta que se incluye abajo  
  $("#alerta").alert();
  window.setTimeout(function() { $("#alerta").alert('close'); }, 3000);
  </script>
<!-- Nuevamente se incluye la forma Alerta.blade.php siguiendo la ruta antes mencionada-->
	@include('forms.Alerta')
	<!-- evaluacion para no mostrar dos veces los errores -->
	@if (!Auth::guest())
		@include('forms.Error')
	@endif
	@yield('body')
</body>
</html>