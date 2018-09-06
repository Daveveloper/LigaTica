@extends('_layout')

@section('titulo','Detalle del equipo')
@section('descripcion','Informacion detallada del equipo')

@section('content')
    <section class="row justify-content-center">

        <div class="jumbotron col-sm-6 text-center">
            <img src="{{asset('images/'.$equipo->Nombre.'.png')}}" class="img-thumbnail">
            <h1 class="display-3">{{$equipo->Nombre}}</h1>
            <small class="text-monospace">Fundacion: {{$equipo->Fundacion}}</small>
            <p><span class="text-danger text-monospace">Estadio: {{$equipo->Estadio}}<br>Titulos: {{$equipo->campeonatos}} </span>
                <br> Fue fundado en 1919, sus colores son el rojo y negro y desde su fundación,
                juega en la Primera División de Costa Rica, siendo además uno de los equipos fundadores​.
                Ha disputado diversos torneos nacionales e internacionales, tales como la Liga de
                Campeones de la Concacaf, Liga Concacaf, Copa Interclubes de la Uncaf, Copa Interamericana,
                Campeonato Centroamericano, es el primer y único equipo costarricense en jugar torneos sudamericanos</p>

            <a href="{{url()->previous()}}" class="text-muted">Volver</a>
        </div>

        <div class="col-sm-6 row ml-2">

            <div class="col-12 text-center">
                <div class="col-sm-6">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h5 class="card-title">Posicion actual:</h5>
                            <h2 class="display-2">{{ $posicion }}</h2>
                            <a href="#" class="btn btn-secondary">Ver tabla de posiciones</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <canvas id="posChart"></canvas>
            </div>

            <div class="col-12">
                <h4 class="text-center">Plantilla</h4>
                <ul class="list-group list-unstyled">
                    <li class="list-group-item-action">PT</li>
                    <li class="list-group-item-action">DF</li>
                    <li class="list-group-item-action">LT</li>
                    <li class="list-group-item-action">MD</li>
                    <li class="list-group-item-action">DL</li>
                </ul>
            </div>

        </div>
    </section>

    <section>
        <div class="col-12 mt-2">
            <article class="table-responsive-sm">
                <h5>Estadisticas:</h5>
                <table class="table table-bordered table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th>Partidos</th>
                        <th>PG</th>
                        <th>PE</th>
                        <th>PP</th>
                        <th>GF</th>
                        <th>GC</th>
                        <th>Dif.</th>
                        <th>Pts</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $estadisticas->Partidos }}</td>
                        <td>{{ $estadisticas->PGanaddos }}</td>
                        <td>{{ $estadisticas->PEmpatados }}</td>
                        <td>{{ $estadisticas->PPerdidos }}</td>
                        <td>{{ $estadisticas->GF }}</td>
                        <td>{{ $estadisticas->GC}}</td>
                        <td>{{ $estadisticas->Diferencia }}</td>
                        <td class="table-success font-weight-bold">{{ $estadisticas->puntos }}</td>
                    </tr>
                    </tbody>
                </table>
            </article>
        </div>
    </section>
@endsection

@section('scripts')

    <script>
        var ctx = document.getElementById("posChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["1", "2", "3", "4", "5", "6"],
                datasets: [{
                    label: 'Grafico de posiciones',
                    data: [2, 8, 3, 3, 2, 2],
                    backgroundColor:"",
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>

@endsection
