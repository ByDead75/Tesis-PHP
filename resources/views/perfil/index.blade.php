@extends('template')

@section('title', 'Perfil de Usuario')

@push('css')

@endpush

@section('content')

<div id="main-content">
    <section id="multiple-column-form" class="d-flex justify-content-center align-items-center flex-column">
        <div class="row match-height">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <div class="avatar avatar-2xl mt-3">
                                        <img src="./assets/compiled/jpg/2.jpg" alt="Avatar">
                                    </div>
                                    <h3 class="mt-3"> {{ $usuario->nombre }}</h3>
                                </div>
                            </div>
                            <form id="datosUsuario" class="form" action="{{ route('usuario.perfil.cambios') }}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Tu Nombre y Apellido" 
                                                value="{{ old('nombre', $usuario->nombre) }}">
                                            <input type="hidden" name="id" id="id" value="{{ old('id', $usuario->id) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="cedula" class="form-label">Cedula</label>
                                            <input type="number" name="cedula" id="cedula" class="form-control" placeholder="Tu Cédula de Identidad" 
                                                value="{{ old('cedula', $usuario->cedula) }}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Correo Electronico</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Tu Correo Electrónico" 
                                                value="{{ old('email', $usuario->email) }}">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group mt-2 d-flex justify-content-end align-items-center">
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection

@push('js')
    <script>
    $('#datosUsuario').validate({
        rules: { // <-- Alertas para cada input según su ID
            nombre: {
                required: true
            },
            cedula: {
                required: true
            },
            email: {
                required: true
            },
        },
        messages: { // <-- Mensajes personalizados para cada alerta según su ID
            nombre: {
                required: "Ingrese el Nombre y Apellido del usuario."
            },
            cedula: {
                required: "Ingrese el Número de Cédula del usuario."
            },
            email: {
                required: "Ingrese un correo electrónico.",
                email: "Ingrese un correo electrónico valido."
            },
        },

        errorClass: "error-message", // Clase CSS para los mensajes de error
        errorPlacement: function(error, element) {
            error.insertAfter(element); // Coloca el mensaje de error después del elemento
        }
    });
    </script>
    
@endpush