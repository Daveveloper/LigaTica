@extends('_layout')
@section('content')

    <section class="mt-3 row">

        <div class="col-sm-4">
            <h2>Detalles del plartido:</h2>
            <table class="table-sm">
                <thead>
                <tr>
                    <th>Equipo casa</th>
                    <th>VS</th>
                    <th>Equipo visita</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @forelse($partido as $p)
                    <td><img src="{{ asset('/images/'. $p->local .'.svg') }}"></td>
                    <td></td>
                    <td><img src="{{ asset('/images/'. $p->visita .'.svg') }}"></td>
                        @empty
                    <h4>No hay datos</h4>
                    @endforelse
                </tr>
                </tbody>
            </table>
        </div>

        <div class="col-sm-8 border">

            <div class="text-center">
            <h1>Editar partido</h1>
            <small>Modifique los datos y presione el boton guardar.</small>
            </div>


                <form action="{{route('jornadas.modificado')}}" method="post">

                    <div class="row justify-content-center">
                        {{ csrf_field() }}
                        <div>
                            <input type="hidden" value="{{$partido[0]->id}}" name="id">
                        </div>
                        <div class="form-group col-6">
                            <small>Equipo casa</small>
                            <select class="form-control form-control-sm" name="casa">
                                <option>Elija un equipo</option>
                                @forelse($equipos as $e)
                                <option value="{{ $e->id }}">{{ $e->Nombre }}</option>
                                @empty
                                    <h3>No hay datos</h3>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <small>Goles</small>
                            <input type="number" name="gl" placeholder="marcador" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="form-group col-6">
                            <small>Equipo visita</small>
                            <select class="form-control form-control-sm" name="visita">
                                <option value="">Elija un equipo</option>
                                @forelse($equipos as $e)
                                    <option value="{{ $e->id }}">{{ $e->Nombre }}</option>
                                @empty
                                    <h3>No hay datos</h3>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <small>Goles</small>
                            <input type="number" name="gv" placeholder="marcador" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="form-group col-4">
                            <button type="submit" class="btn btn-warning form-control">Editar partido</button>
                        </div>
                        <div class="form-group col-4">
                            <a href="{{ route('jornadas') }}" class="btn btn-danger form-control">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
