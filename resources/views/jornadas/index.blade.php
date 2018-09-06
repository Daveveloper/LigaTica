@extends('_layout')

@section('content')

    <div class="row align-items-center border rounded bg-dark text-white">
        <div class="col-sm-9"><h3 class="display-3 text-center">Partidos de la jornada</h3></div>
        <div class="col-sm-3"><span class="alert alert-warning">Jornada: {{ $jor }}</span></div>
    </div>



    <div class="row justify-content-md-center mt-2">
        <div class="col col-lg-2">
            <a href="{{route('jornadas.crear')}}" class="btn btn-outline-info btn-sm">+ Agregar jornada</a>
        </div>
        <div class="col-md-auto">
            <form action="{{route('jornadas')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-6">
                        <select id="num" class="form-control form-control-sm" name="num">
                            @foreach($jornadas as $j)
                                <option value="{{ $j->num_jornada }}">{{ $j->num_jornada }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <button type="submit" class="btn btn-secondary btn-sm">Buscar jornada</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="text-center">
        <table class="table table-sm mt-2">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Casa</th>
                    <th scope="col">Goles</th>
                    <th>vs</th>
                    <th scope="col">Goles</th>
                    <th scope="col">Visita</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @forelse($lista as $partido)
                <tr>
                    <td><img src="{{asset('images/'.$partido->local.'.svg')}}" height="15"> {{ $partido->local }}</td>
                    <td>{{ $partido->golCasa }}</td>
                    <td> - </td>
                    <td>{{ $partido->golVisita }}</td>
                    <td><img src="{{asset('images/'.$partido->visita.'.svg')}}" height="15"> {{ $partido->visita }}</td>
                    <td>
                        <a class="btn-link" href="{{ route('jornadas.edita',$partido->id) }}">Editar</a> |
                        <a>Eliminar</a>
                    </td>
                </tr>
                 @empty
                    <span>No hay datos</span>
               @endforelse

            </tbody>
        </table>
    </div>


    <section class="mt-5">

        <h3 class="display-5">Agregar resultados</h3>

            <form action="{{ route('jornadas.journal') }}" method="post">
                {{ csrf_field() }}

                <div class="row align-items-center">

                    <div class="col-6 row align-items-center">

                        <div class="col-4">
                            <label class="align-middle">Elija una jornada</label>
                        </div>

                        <div class="col-auto">
                            <select name="jornada" id="jornada" class="form-control">
                                @foreach($jornadas as $j)
                                <option value="{{ $j->num_jornada }}">{{ $j->num_jornada }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-info">Alimentar jornada</button>
                        </div>
                    </div>

                </div>

            </form>
    </section>
@endsection
