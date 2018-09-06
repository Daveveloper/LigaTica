@extends('layouts.app')

@section('content')

    <div>
        <div class="col-md-12 text-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h2 class="display-2"><i class="fas fa-cogs"></i> Management</h2>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">

            <div class="card col-auto">
                <div class="card-header"><i class="fas fa-users"></i> Equipos</div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('Equipos') }}" class="btn btn-light"><i class="fas fa-columns"></i> Panel de equipos</a></li>
                        <li><a href="{{ route('Equipos.new') }}" class="btn btn-light"><i class="fas fa-plus"></i> Nuevo Equipo</a></li>
                    </ul>
                </div>
            </div>

            <div class="card col-auto ml-1 mr-1">
                <div class="card-header"><i class="fas fa-list-ol"></i> Jornadas</div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('jornadas') }}" class="btn btn-light"><i class="fas fa-columns"></i> Panel de jornadas</a></li>
                        <li><a href="{{ route('Equipos.new') }}" class="btn btn-light"><i class="fas fa-plus"></i> Agregar jornada</a></li>
                    </ul>
                </div>
            </div>

            <div class="card col-auto">
                <div class="card-header"><i class="fas fa-user-cog"></i> Dashboard</div>
                <div class="card-body">
                    <a href="{{ url('/dashboard') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-user-cog"></i> Ir al Dashboard
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
