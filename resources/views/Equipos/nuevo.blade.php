@extends('_layout')
@section('content')

    <section id="errors">

            @if($errors->any())
            <div class="alert alert-warning">
                @foreach($errors->all() as $error)
                    <span>{{ $error }}</span><br>
                @endforeach
            </div>
            @endif

    </section>

    <section>
        <h1>Nuevo</h1>

        <form action="{{ route('Equipos.create') }}" method="post" name="nuevoEquipo" onsubmit="return validaInputs()">
            {{ csrf_field() }}

            <div class="row">
                <div class="col form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" onblur="validar('nombre','nom')" id="nombre">
                    <small id="nom" class="text-danger"></small>
                </div>
                <div class="col form-group">
                    <label>Estadio</label>
                    <input type="text" name="estadio" class="form-control" id="estadio" onblur="validar('estadio','est')">
                    <small id="est" class="text-danger"></small>
                </div>
            </div>

            <div class="row">
                <div class="col form-group">
                    <label for="fundacion">Fundacion</label>
                    <input type="date" name="fundacion" class="form-control" id="fundacion" onblur="validar('fundacion','fun')">
                    <small id="fun" class="text-danger"></small>
                </div>
                <div class="col form-group">
                    <label for="campeonatos">Campeonatos</label>
                    <input type="number" name="campeonatos" class="form-control" id="campeonatos" onblur="validar('campeonatos','camp')">
                    <small id="camp" class="text-danger"></small>
                </div>
            </div>

            <div class="form-group">
                <label for="reseña">Reseña</label>
                <textarea name="reseña" class="form-control" id="reseña" onblur="validar('reseña','res')"></textarea>
                <small id="res" class="text-danger"></small>
            </div>

            <div class="form-group btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-primary">
                    <input type="radio" name="estado" id="option1" autocomplete="off" value="1"> Activo
                </label>
                <label class="btn btn-danger">
                    <input type="radio" name="estado" id="option2" autocomplete="off" value="0"> Inactivo
                </label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success mr-3" id="nuevo">Enviar</button>
                <a href="{{url()->previous()}}">Cancelar</a>
            </div>
        </form>
    </section>


@endsection
