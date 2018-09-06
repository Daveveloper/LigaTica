@extends('_layout')

@section('content')

    <section>
        <h1>Agregar jornada</h1>

        @if($errors->any())
        <div class="alert alert-warning" id="errors">
            @foreach($errors->all() as $error)
            <span>{{ $error }}</span>
            @endforeach
        </div>
        @endif


        <form action="{{route('jornadas.guardar')}}" method="post" id="formulario">
            {{csrf_field()}}
            <div class="form-group row">
                <div class="col">
                    <label for="jornada">Jornada</label>
                    <input type="number" name="jornada" class="form-control form-control-sm"
                           value="{{ ($jornadas->last() + 1)}}" min="{{ ($jornadas->last() + 1)}}" max="22">
                    @foreach($errors->get('jornada') as $e)
                        <small class="text-danger">{{ $error }}</small>
                    @endforeach
                </div>
                <div class="col">
                    <label for="fecha">Fecha:</label>
                    <input type="date" name="fecha" class="form-control form-control-sm" value="{{ old('fecha') }}">
                    @foreach($errors->get('fecha') as $e)
                        <small>{{ $error }}</small>
                    @endforeach
                </div>
            </div>

            <label>Partidos:</label>
            @for ($i = 0; $i < 6; $i++)

                <div class="row form-group">

                    <div class="col">
                        <select class="form-control form-control-sm" name="ecasa[]">
                            <option value="0">Seleccione el equipo Casa</option>
                           @isset($listaEquipos)
                               @foreach($listaEquipos as $equipo)
                                    <option value="{{$equipo->id}}">{{ $equipo->Nombre }}</option>
                               @endforeach
                           @endisset
                        </select>
                    </div>

                    <label> vs </label>

                    <div class="col">
                        <select class="form-control form-control-sm" name="evisita[]">
                            <option value="0">Seleccione el equipo Visita</option>
                            @isset($listaEquipos)
                                @foreach($listaEquipos as $equipo)
                                    <option value="{{$equipo->id}}">{{ $equipo->Nombre }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>

                </div>

            @endfor
            <div class="form-group">
                <input class="btn btn-outline-success" type="submit" id="procesar" value="Crear jornada">
                <a href="{{ route('jornadas') }}" class="btn btn-warning">Cancelar</a>
            </div>
        </form>
    </section>

    <script>
        function deshabilitar(){
            var boton = document.getElementById('procesar');
            boton.disabled = true;
            boton.value = "Enviando...";
            boton.form.submit();
        }

        procesar.onclick = deshabilitar;
    </script>
@endsection
