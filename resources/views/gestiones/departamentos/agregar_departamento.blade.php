@extends('template')

@section('title', 'Agregar Departamento')

@push('css')
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
@endpush

@section('content')
    <div id="main-content" class="">
        <div>
            <h2 class="card-title text-center mb-4 pb-2">Registro de Nuevo Departamento</h2>
        </div>
        <form id="agregarDepartamento" class="form" action="{{ route('gestiones.departamentos.agregar.departamentos') }}" method="POST">
        @csrf
            <section id="basic-vertical-layouts">
                <div class="row match-height">
                    <div class="col-md-8 col-12 mx-auto">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <!--<form class="form form-vertical"> -->
                                        <div class="form-body">

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="empresa">Código de la Empresa</label>
                                                        <input type="text" id="empresa" class="form-control"
                                                            name="empresa" placeholder="Click para seleccionar la Empresa">
                                                        <input type="hidden" id="empresa_codigo" class="form-control" name="empresa_codigo">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="direccion">Código de la Direccion</label>
                                                        <input type="text" id="direccion" class="form-control"
                                                            name="direccion" placeholder="Click para seleccionar la Direccion">
                                                        <input type="hidden" id="direccion_codigo" class="form-control" name="direccion_codigo">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="gerencia">Código de la Gerencia</label>
                                                        <input type="text" id="gerencia" class="form-control" 
                                                        name="gerencia" placeholder="Click para seleccionar la Gerencia">
                                                        <input type="hidden" id="gerencia_codigo" class="form-control" name="gerencia_codigo">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="nb_departamento">Nombre del Departamento</label>
                                                        <input type="text" id="nb_departamento" class="form-control" 
                                                        name="nb_departamento" placeholder="Ingrese el Nombre del Departamento">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-12 d-flex justify-content-end offset-md-4 col-md-8">
                                                    <button type="reset" class="btn btn-secondary me-1 mb-1" id="btn_regresar" name="btn_regresar">Regresar</button>
                                                    <button type="submit"class="btn btn-primary me-1 mb-1" id="btn_confirmar" name="btn_confirmar">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    <!--</form>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
    
    @include('components.modal')

@endsection

@push('js')
    <script src="{{asset('assets/compiled/js/empresas_modal.js')}}"></script>
    <script src="{{asset('assets/compiled/js/direccion_modal.js')}}"></script>
    <script src="{{asset('assets/compiled/js/gerencia_modal.js')}}"></script>
    <script src="{{asset('assets/compiled/js/departamento_modal.js')}}"></script>

    <script>
        $('#agregarDepartamento').validate({
            rules: { // <-- Alertas para cada input según su ID
                empresa: {
                    required: true
                },
                direccion: {
                    required: true
                },
                gerencia: {
                    required: true
                },
                departamento: {
                    required: true
                },
                nb_departamento: {
                    required: true
                }
            },
            messages: { // <-- Mensajes personalizados para cada alerta según su ID
                empresa: {
                    required: "Empresa requerida"
                },
                direccion: {
                    required: "Direccion requerida"
                },
                gerencia: {
                    required: "Gerencia requerida"
                },
                departamento: {
                    required: "Departamento requerido"
                },
                nb_departamento: {
                    required: "Nombre del Departamento requerido"
                }
            }
        });
    </script>

    <script>
        $('#empresa').on('click', function () {
            empresas('{{ route("buscar.empresas") }}')  
        })
    </script>

    <script>
        $('#direccion').on('click', function () {
            if ($('#empresa').val() === "") {
                alert('Debes seleccionar una empresa primero');
                empresas('{{ route("buscar.empresas") }}')   
                return
            }
            direccion('{{ route("buscar.direccion.empresa") }}')
        })
    </script>

    <script>
        $('#gerencia').on('click', function () {
            if ($('#empresa').val() === "") {
                alert('Debes seleccionar una empresa primero');
                empresas('{{ route("buscar.empresas") }}')   
                return;
            } else if ($('#direccion').val() === "") {
                alert('Debes seleccionar una dirección primero');
                direccion('{{ route("buscar.direccion.empresa") }}')   
                return;
            }
            gerencia('{{ route("buscar.gerencia.direccion") }}')
        })
    </script>

@endpush