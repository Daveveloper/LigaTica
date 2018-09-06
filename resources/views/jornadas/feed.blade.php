@extends('_layout')
@section('content')
    <header>
        <div class="text-center">
            <h1>Agregar resultados de la jornada</h1>
        </div>
    </header>

    <section class="">
        <h4 class="text-center text-warning">Ingrese unicamente numeros</h4>
        <form action="{{ route('jornadas.feed') }}" method="post">
            {{ csrf_field() }}

            <input type="hidden" name="jornada" value="{{$lista[0]->jornada}}">
            @forelse($lista as $partido)
                <input type="hidden" name="partidos[]" value="{{ $partido->id }}">
                <div class="bg-dark rounded text-white mt-2 p-2 row text-center justify-content-center">
                    <div class="col-sm-5 row">
                        <div class="col-md-6">
                            <label>{{ $partido->local }}</label>
                            <input type="hidden" value="{{ $partido->eid }}" name="idcasa[]">
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="golcasa[]" class="form-control form-control-sm" min="0" value="0">
                        </div>
                    </div>
                    <div class="col-sm-2 row justify-content-center">
                        <div class="col">vs</div>
                    </div>
                    <div class="col-sm-5 row">
                        <div class="col-md-6">
                            <input type="number" name="golvisita[]" class="form-control form-control-sm" min="0" value="0">
                        </div>
                        <div class="col-md-6">
                            <label>{{ $partido->visita }}</label>
                            <input type="hidden" value="{{ $partido->vid }}" name="idvisita[]" onblur="validaNumeros('golvisita[]')">
                        </div>
                    </div>

                </div>
                <!-- ---------------------------------------- -->
                @empty
                <span class="alert alert-danger">No hay datos</span>
            @endforelse
                <div class="form-group mt-4 text-center">
                    <button type="submit" class="btn btn-success">Registrar resultados</button>
                    <a href="{{ route('jornadas') }}" class="btn btn-warning">Cancelar</a>
                </div>
        </form>
        <div class="row" id="errors">
            <div class="col">
                <small></small>
            </div>
        </div>
    </section>
@endsection
