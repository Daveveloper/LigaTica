@extends('_layout')
@section('content')
    <div class="row border rounded text-center bg-dark text-warning">
        <div class="col-12"><h1 class="display-3">Jornadas</h1></div>
        <div class="col-12"><small class="text-white">Resumen de las jornadas</small></div>
    </div>

    <section class="mt-3 text-center">
        <div class="row">
            @foreach($jornadas as $j)
                    <div class="table-responsive-sm col-sm-4">
                        <div class="text-warning bg-dark"><i class="fas fa-list-ol"></i> Jornada {{ $j->num_jornada }}</div>
                        <div><small>Fecha: {{ $j->fecha }}</small></div>
                        <table class="table table-hover table-bordered table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>Local</th>
                                <th>Visita</th>
                                <th>Resultado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lista as $partido)
                            @if($j->num_jornada == $partido->jornada)
                            <tr>
                                <td>{{ $partido->local }}</td>
                                <td>{{ $partido->visita }}</td>
                                <td>{{ $partido->golCasa }} : {{ $partido->golVisita }}</td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            @endforeach
        </div>

    </section>
@endsection
