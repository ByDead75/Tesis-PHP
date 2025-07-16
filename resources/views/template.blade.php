<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOP Humanitas - @yield('title')</title>
    
    <link rel="shortcut icon" href="{{ asset('assets/compiled/svg/favicon.svg')}}" type="image/x-icon">
    
    <link rel="stylesheet" href="{{asset('assets/compiled/css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/compiled/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/compiled/css/app-dark.css')}}">
    <link rel="stylesheet" href="{{asset('assets/compiled/css/iconly.css')}}">
    

    <link rel="stylesheet" href="{{asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/compiled/css/table-datatable-jquery.css')}}">

    <link rel="stylesheet" href="{{asset('assets/extensions/filepond/filepond.css')}}">
    <link rel="stylesheet" href="{{asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css')}}">
    <link rel="stylesheet" href="{{asset('assets/extensions/toastify-js/src/toastify.css')}}">

    <link rel="stylesheet" href="{{asset('assets/extensions/@fortawesome/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/compiled/css/jquery-validation.css')}}">
    
    @stack('css')
</head>

<body>
    
    <div id="app">
        <div id="main" class="layout-horizontal">
            @include('components.header')
            
            <main>
                @yield('content')
            </main>

            @include('components.footer')
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="{{asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    
    <script src="{{asset('assets/extensions/jquery-validation/jquery.validate.js')}}"></script>

    <script src="{{asset('assets/static/js/pages/horizontal-layout.js')}}"></script>
    <script src="{{asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    
    <script src="{{asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')}}"></script>
    <script src="{{asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js')}}"></script>
    <script src="{{asset('assets/extensions/filepond/filepond.js')}}"></script>
    
    <script src="{{asset('assets/extensions/toastify-js/src/toastify.js')}}"></script>

    <script>
        var filepond = {
            create: function(field) {
                const inputElement = document.getElementById(field.id);
                const pond = FilePond.create(inputElement, {
                    allowReorder: true,
                    acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg', 'application/pdf'],
                    server: {
                        process: {
                            url: '{{ url("/base/cargar_archivo_temporal") }}',
                            method: 'POST',
                            headers: {
                                'x-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        },
                        revert: {
                            url: '{{ url("/base/eliminar_archivo_temporal") }}',
                            method: 'DELETE',
                            headers: {
                                'x-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        }
                    },
                });
            }
        };
    </script>
    
    <script src="{{asset('assets/compiled/js/app.js')}}"></script>

    <script>
        document.getElementById('btn_regresar').addEventListener('click', function() {
            if(confirm('¿Está seguro de que desea salir? Los cambios no guardados se perderán.')) {
                window.history.back();
                
            }
        });
    </script>
    
    @stack('js')
    
</body>
</html>