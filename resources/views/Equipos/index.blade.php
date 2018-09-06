@extends('_layout')

@section('content')
    <h1>Equipos</h1>

    <div>
        <a href="{{ route('Equipos.new') }}" class="btn btn-outline-dark">Agregar equipo</a>
    </div>

    <div class="mt-3">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Estadio</th>
                    <th>Fundacion</th>
                    <th>Campeonatos</th>
                    <th>Activo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @forelse($lista as $equipo)
            <tr>
                <td>{{ $equipo->id }}</td>
                <td><img src="{{ asset('/images/'.$equipo->Nombre.'.svg') }}" height="25"> {{ $equipo->Nombre }}</td>
                <td>{{ $equipo->Estadio }}</td>
                <td>{{\Carbon\Carbon::parse($equipo->Fundacion)->format('d/m/Y')}}</td>
                <td class="text-center">{{ $equipo->campeonatos }}</td>
                <td>
                    @if($equipo->activo)
                        Si
                    @else
                        No
                    @endif
                </td>
                <td>
                    <a href="{{route('Equipos.edit',[$equipo])}}" class="btn btn-dark btn-sm">Editar</a>
                    <a href="{{ route('Equipos.delete', [$equipo]) }}" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
                @empty
                <span>No hay datos</span>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
