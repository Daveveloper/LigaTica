@extends('_layout')
@section('titulo', 'Goleadores')
@section('descripcion','Mantenimiento de goleo')
@section('content')

    <section class="row justify-content-center">

        <div class="col-6 p-3 shadow-lg rounded">
            <form>
                <div class="form-group">
                    <label for="">Jugador</label>
                    <input type="text" class="form-control form-control-sm" id="" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="">Cantidad</label>
                    <input type="number" class="form-control form-control-sm" id="" placeholder="0">
                </div>
                <div class="form-group">
                    <label for="">Equipo</label>
                    <select class="form-control form-control-sm" id="">
                        <option>Alajuela</option>
                        <option>Saprissa</option>
                        <option>Heredia</option>
                        <option>San Carlos</option>
                        <option>Santos</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-secondary">Agregar</button>
                </div>
            </form>
        </div>
    </section>
@endsection
