@extends('_layout')

@section('content')
    <h1>Editar</h1>

    <section class="col-sm-6">
        <form action="{{ route('Equipos.save') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $equipo->id }}">
            </div>
            <div class="form-group">
                <input type="text" name="nombre" value="{{ $equipo->Nombre }}" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="estadio" value="{{ $equipo->Estadio }}" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="fundacion"
                       value="{{ $equipo->Fundacion }}" class="form-control">
            </div>
            <div class="form-group">
                <input type="number" name="campeonatos" value="{{ $equipo->campeonatos }}" class="form-control">
            </div>
            <div class="form-group">
                <textarea name="reseña" class="form-control"> {{ $equipo->reseña }} </textarea>
            </div>
            <div class="form-group btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-primary">
                    <input type="radio" name="options" id="option1" autocomplete="off" value="1"> Activo
                </label>
                <label class="btn btn-danger">
                    <input type="radio" name="options" id="option2" autocomplete="off" value="0"> Inactivo
                </label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mr-3">Editar</button>
                <a href="{{url()->previous()}}">Cancelar</a>
            </div>
        </form>
    </section>

@endsection
