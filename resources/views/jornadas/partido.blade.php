<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <style>
        ul>li{
            list-style: none;
        }
        #contenedor{
            background: #000000;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to bottom, #434343, #000000);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #434343, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

    </style>
</head>
<body>
<section class="container mt-2">

    <div>
        <a href="{{url()->previous()}}" class="btn btn-warning">Regresar</a>
    </div>

    <h1 class="display-3 text-center">Detalles del partido</h1>
@forelse($partido as $team)
    <div class="jumbotron text-white" id="contenedor">

        <div class="row">

            <div class="col row align-items-center text-center">
                <div class="col">
                    <div>
                        <h3>{{ $team->local }}</h3>
                    </div>
                    <div>
                        <img src="{{asset('/images/'.$team->local.'.svg')}}">
                    </div>
                </div>
                <div class="col">
                    <h1>{{$team->golCasa}}</h1>
                </div>
            </div>

            <div class="col row  align-items-center text-center">
                <div class="col">
                    <h1>{{$team->golVisita}}</h1>
                </div>
                <div class="col">

                    <div><h3>{{ $team->visita }}</h3></div>
                    <div><img src="{{asset('/images/'.$team->visita.'.svg')}}"></div>

                </div>

            </div>

        </div>

        <div class="row">
            <div class="col row">
                <div class="col">
                    <div class="text-center">
                        <p>Alineacion:</p>
                    </div>
                    <div>
                        <ul class="list-group list-group-flush text-center">
                            <li>Portero</li>
                            <li>Defensa</li>
                            <li>Defensa</li>
                            <li>Defensa</li>
                            <li>Defensa</li>
                            <li>Volante</li>
                            <li>Volante</li>
                            <li>Voalnte</li>
                            <li>Delantero</li>
                            <li>Delantero</li>
                            <li>Delantero</li>
                            <li>DT: Director</li>
                        </ul>
                    </div>
                </div>
                <div class="col text-center">
                    Estadisticas:
                </div>
            </div>
            <div class="col row">
                <div class="col text-center">
                    <p>Estadisticas:</p>
                </div>
                <div class="col">
                    <div class="text-center">
                        <p>Alineacion:</p>
                    </div>
                    <div>
                        <ul class="list-group list-group-flush text-center">
                            <li>Portero</li>
                            <li>Defensa</li>
                            <li>Defensa</li>
                            <li>Defensa</li>
                            <li>Defensa</li>
                            <li>Volante</li>
                            <li>Volante</li>
                            <li>Voalnte</li>
                            <li>Delantero</li>
                            <li>Delantero</li>
                            <li>Delantero</li>
                            <li>DT: Director</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    @empty
    <h3>No hay datos</h3>
@endforelse

    </div>
</section>

<section class="container">

    <div class="jumbotron">

        <div class="col-2 ml-auto"><span class="badge badge-danger">100 comentarios</span></div>
        <div class="col-12">
            <h4>Usuario: anonimo</h4>
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <span>Comentario:</span>
                    <textarea class="form-control" placeholder="Deja tus comentarios del juego"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-success">Comentar</button>
                </div>
            </form>
        </div>
        <div class="jumbotron bg-light">

            <h3>Comentarios:</h3>

            <div class="card mt-1">
                <div class="card-body">
                    <h5 class="card-title">Nombre del usuario</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Comentario:</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Me gusta</a>
                    <a href="#" class="card-link">No me gusta</a>
                </div>
            </div>

            <div class="card mt-1">
                <div class="card-body">
                    <h5 class="card-title">Nombre del usuario</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Comentario:</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Me gusta</a>
                    <a href="#" class="card-link">No me gusta</a>
                </div>
            </div>

        </div>
    </div>

</section>

<script src="{{asset('/js/app.js')}}"></script>
</body>
</html>
