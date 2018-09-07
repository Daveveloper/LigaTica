<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('images/icon.png')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Liga Tica</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">

    <!-- Custom styles for this template -->
    <link href="{{asset('/css/sticky-footer-navbar.css')}}" rel="stylesheet">
</head>

<body>

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/"><i class="fas fa-volleyball-ball"></i> Liga Tica</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link disabled text-warning"><i class="fas fa-user-circle"></i> {{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/"><i class="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
                </li>
                @if(Auth::user()->hasrole('admin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Equipos')}}"><i class="fas fa-users"></i> Equipos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('jornadas')}}"><i class="fas fa-list-ol"></i> Jornadas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('goleadores')}}"><i class="fas fa-futbol"></i> Goleadores</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Dashboard')}}"><i class="fas fa-chart-line"></i> Dashboard</a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                        <a class="btn btn-dark" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Begin page content -->
<main role="main" class="container">

    <div class="starter-template text-center">
        <h1 class="display-3">
            @yield('titulo')
        </h1>
        <p class="lead">@yield('descripcion')</p>
    </div>

    <div>
        @yield('content')
    </div>

</main>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Deivid Araya &copy;</span>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/validaciones.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
@yield('scripts')
</body>
</html>
