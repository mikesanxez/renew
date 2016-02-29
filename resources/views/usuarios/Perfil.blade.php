@extends('layouts.Master')

@section('title') Perfil @stop

@section('body')
	<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Datos Personales</div>
                <div class="panel-body">
                    {!!Form::model($usuario, ['url' => ['perfil', $usuario->id],
                     'Method' => 'PUT', 'class' => 'form-horizontal'])!!}
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{$usuario->name}}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="apellido" value="{{ $usuario->apellido }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $usuario->email }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="telefono" value="{{ $usuario->telefono }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" value="{{ $usuario->username }}">
                            </div>
                        </div>
                            

                            <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="estado" value="{{ $usuario->estado }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ciudad') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Ciudad</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ciudad" value="{{ $usuario->ciudad }}">
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="direccion" value="{{ $usuario->direccion }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('colonia') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Colonia</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="colonia" value="{{ $usuario->colonia }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('CP') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">CP</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="CP" value="{{ $usuario->CP }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Actualizar
                                </button>
                            </div>
                            <div class="col-md-2 col-md-offset-1">
                                <a href="../borrar/{{base64_encode($usuario->id)}}" class="btn btn-danger">
                                    <i class="fa fa-btn fa-user"></i>Borrar Cuenta
                                </a>
                            </div>
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>



@stop