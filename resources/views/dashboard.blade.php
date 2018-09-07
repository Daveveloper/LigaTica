<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Campeonato Nacional de Costa Rica, Quiniela Costa Rica">
    <meta name="author" content="Deivid Araya">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('/images/favicon.svg')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">

    <!-- Custom styles for this template -->
    <link href="{{asset('/css/dashboard.css')}}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-warning"><i class="fas fa-user-circle"></i> {{ $user->name }}</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            @if(Auth::user()->hasRole('admin'))
                <a class="nav-link" href="{{ url('/manage') }}">Administrar</a>
            @endif
        </li>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar shadow">
            <div class="sidebar-sticky">

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <span data-feather="home"></span>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="monitor"></span>
                            Dashboard
                        </a>
                    </li>
                </ul>

                <ul class="nav flex-column mt-5">
                    <li class="nav-item">
                    <a class="nav-link" href="#Jornada">
                        <span data-feather="calendar"></span>
                        Jornadas
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#equipos">
                            <span data-feather="users"></span>
                            Equipos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tabla">
                            <span data-feather="bar-chart-2"></span>
                            Tabla de posiciones
                        </a>
                    </li>
                </ul>

                <ul class="nav flex-column mt-5">
                    <li class="nav-item">
                        <a class="nav-link disabled">
                            <span data-feather="shopping-cart"></span>
                            Compras
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers"></span>
                            Blog
                        </a>
                    </li>
                </ul>


            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="display-3">Invierno 2018</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-primary">Facebook</button>
                        <button class="btn btn-sm btn-outline-info">Twitter</button>
                    </div>
                </div>
            </div>


            <!--*********************************************** TABLDE DE POSICIONES *******************************************-->


            <section class="container p-3 shadow-lg rounded" id="tabla">
                <h2><i class="fas fa-table"></i> Tabla de posiciones</h2>
                <div class="table-responsive-sm">
                    <table class="table table-sm table-hover" id="datos">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Equipo</th>
                            <th>PTS</th>
                            <th>Partidos</th>
                            <th>GF</th>
                            <th>GC</th>
                            <th>Diferencia</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{!! $pos = 0 }}
                        @forelse($posiciones as $p)
                            <tr>
                                <td>{{ $pos+=1 }}</td>
                                <td>{{ $equipos[$p->equipo_id] }}</td>
                                <td>{{ $p->puntos }}</td>
                                <td>{{ $p->Partidos }}
                                <td>{{ $p->GF}}</td>
                                <td>{{ $p->GC}}</td>
                                <td>{{ $p->Diferencia}}</td>
                            </tr>
                        @empty
                            <span>No hay datos</span>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <!--*********************************************** JORNADAS *******************************************-->


            <section id="Jornada" class="mt-4">

                <div class="mt-2 row">
                    <h2><i class="far fa-calendar-alt"></i> Proxima jornada <small>{{$fecha}}</small></h2>
                </div>


                <div class="row">

                    @forelse($partidos as $partido)
                        <ul class="list-group col-sm-4 mt-2">
                            <li class="list-group-item">
                                <div class="row justify-content-center">
                                    <div class="col-3"><img src="{{ asset('images/'.$equipos[$partido->equipocasa].'.svg') }}" height="20"></div>
                                    <div class="col-6"><strong class="col-4">{{$equipos[$partido->equipocasa]}}</strong></div>
                                    <div class="col-3"><span class="col-4">{{ $partido->golCasa }}</span></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row justify-content-center">
                                    <div class="col-3"><img src="{{ asset('images/'.$equipos[$partido->equipovisita].'.svg') }}" height="20"></div>
                                    <div class="col-6"><strong class="col-4">{{$equipos[$partido->equipovisita]}}</strong></div>
                                    <div class="col-3"><span class="col-4">{{ $partido->golVisita }}</span></div>
                                </div>
                            </li>
                            <li class="list-group-item bg-info">
                                <a href="{{ route('jornadas.partido',[$partido->id]) }}" class="text-white mr-2"> Detalles
                                    del partido</a>
                            </li>
                        </ul>

                    @empty
                        <div class="text-center">
                            <p class="text-muted">Sin datos para mostrar</p>
                        </div>
                    @endforelse

                </div>
                <div class="row mt-3 justify-content-center">
                    <a href="{{ route('jornadas.jornadas') }}" class="btn btn-sm btn-outline-info">
                        Ver todas las jornadas</a>
                </div>
            </section>



            <!--********************************************* GOLEADORES *******************************************-->


            <section id="goleadores" class="mt-5 text-center">
                <h2><i class="fas fa-futbol"></i> Estadisticas individuales</h2>
                <div class="row justify-content-center">
                    <div class="col-sm-6 shadow  p-2">
                        <h5>Goleadores</h5>
                        <table class="table table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Goles</th>
                                <th>Equipo</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><strong>Bryan Rojas</strong></td>
                                <td>7</td>
                                <td><img src="{{ asset('images/carmelita.svg') }}" height="30"></td>
                            </tr>
                            <tr>
                                <td><strong>Frank Zamora</strong></td>
                                <td>6</td>
                                <td><img src="{{ asset('images/ucr.svg') }}" height="30" alt="UCR"></td>
                            </tr>
                            <tr>
                                <td><strong>Alvaro Saborio</strong></td>
                                <td>5</td>
                                <td><img src="{{ asset('images/san carlos.svg') }}" height="30"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!--*********************************************** EQUIPOS *******************************************-->


            <section id="equipos" class="mt-5">
                <h2><i class="fas fa-user-tag"></i> Equipos</h2>
                <div class="row">

                    @isset($teams)
                    @forelse($teams as $equipo)
                        <div class="col-lg-2 col-6 align-items-center p-1 text-center" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('images/'.$equipo->Nombre.'.svg') }}" height="75">
                                <a href="{{route('Equipos.details',[$equipo->id])}}" class="btn btn-default">
                                    {{$equipo->Nombre}}
                                </a>
                        </div>
                    @empty
                        <span>No hay datos para mostrar</span>
                    @endforelse
                    @endisset
                </div>
            </section>

        </main>
    </div><!-- row -->
</div><!-- container-fluid -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('/js/app.js')}}"></script>
<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

<script>
    feather.replace();

    window.onload = function(){
        var table = document.getElementById('datos');

        for(var i = 1; i <= 4; i++){
            table.rows[i].className = 'table-success';
            table.rows[i].style.fontWeight = 'bold';
        }

        table.rows[11].className = 'table-warning';
        table.rows[12].className = 'table-danger';

    }
</script>

</body>
</html>
