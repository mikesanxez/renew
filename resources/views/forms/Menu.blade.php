@if(!isset($bol) || $bol == false)
<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('home') }}">Home</a></li>
                    @if (!Auth::guest())
                    <li><a href="{{ url('crear/subasta') }}">Subastar</a></li>
                    @endif
               </ul>

               <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{url('login')}}">Login</a></li>
                        <li><a href="{{url('register')}}">Registro</a></li>
                    @else
                    @if (Auth::user()->rol_id == 1)
                        <li><a href="{{ url('usuarios') }}">Usuarios</a></li>
                    @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{url ('perfil', base64_encode(Auth::user()->id) )}}">Perfil</a></li>
                                <li><a href="{{url('logout')}}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif    