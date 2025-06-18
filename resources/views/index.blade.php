@extends('template')

@section('title', 'Inicio')

@push('css')

@endpush

@section('content')

<div id="main-content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">Inicio</h3>
        </div>
        <div class="card-content">
            <div class="card-body">
                @if($usuario)
                    <h1 class="mt-5 text-center">Hola, {{ $usuario->cedula }}</h1>

                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8">
                            <div class="alert alert-info text-center">
                                ¡Bienvenido al sistema de Ordenes de Pago!
                            </div>
                        </div>
                    </div>

                    @else
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8">
                            <div class="alert alert-info text-center">
                                <p>No has iniciado sesión.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>



@endsection

@push('js')

@endpush