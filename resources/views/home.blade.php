@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">LIGATICA</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="display-4">Bienvenido</h2>
                    <p class="lead">Esperamos tengas una excelente experiencia y te diviertas.</p>
                    <a href="{{ route('Dashboard') }}" class="btn btn-outline-dark">Continuar</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
