<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GrupoPlus | Finanzas</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Lato:700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="/js/app.js" defer></script>
    <script type="text/javascript" defer src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>  
    <!--Select2-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" defer></script>
</head>
<body style="background:#24426f; background-size:cover;background-position:center;background-position:center;background-repeat:no-repeat;background-attachment: fixed;">
  <nav class="navbar navbar-expand-lg navbar-light navbar-laravel" style="background:rgba(255,255,255,0.85);">
      <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fas fa-home" style="font-size:30px;"></i>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
              </ul>
              <ul class="navbar-nav ml-auto">
                  @guest

                  @else
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/bancos-nacionales" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          Bancos Nacionales
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/registers/create">
                            Crear un Registro
                          </a>
                          <a class="dropdown-item" href="/registers/list/index">
                            Verificar Registros
                          </a>
                          <a class="dropdown-item" href="/registers">
                            Saldos
                          </a>
                          <a class="dropdown-item" href="/reportes">
                            Reportes
                          </a>
                        </div>
                      </li>

                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/bancos-internacionales" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          Bancos Internacionales
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/entries/home">
                            Ingresos
                          </a>
                          <a class="dropdown-item" href="/expenses/create">
                            Egresos
                          </a>
                          <a class="dropdown-item" href="/saldos">
                            Saldos
                          </a>
                          <a class="dropdown-item" href="/reportes/internacionales">
                            Reportes
                          </a>
                        </div>
                      </li>

                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/totalizadores" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          Ctas. por Pagar
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        </div>
                      </li>

                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/totalizadores" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          Facturación                        
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        </div>
                      </li>

                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/totalizadores" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          Totalizadores
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        </div>
                      </li>

                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/bancos-internacionales" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          Usuarios y Configuración
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/companies">
                            Empresas
                          </a>
                          <a class="dropdown-item" href="/register">
                            Crear Usuario
                          </a>
                        </div>
                      </li>

                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                               Salir
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
          </div>
      </div>
  </nav>
  <div class="wrapper">
    @yield('content')
  </div>
  <script src="/js/script.js" defer></script>
  @isset($beneficiaries)
    @include('alert.directory')
  @endisset
    @include('alert.processing')
    @include('alert.checked')
  </body>
</html>
