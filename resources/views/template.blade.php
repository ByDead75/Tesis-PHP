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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/js/dataTables.js">
    


    <link rel="stylesheet" href="{{asset('assets/extensions/filepond/filepond.css')}}">
    <link rel="stylesheet" href="{{asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css')}}">
    <link rel="stylesheet" href="{{asset('assets/extensions/toastify-js/src/toastify.css')}}">

    <link rel="stylesheet" href="{{asset('assets/extensions/@fortawesome/fontawesome-free/css/all.min.css')}}">
    
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

    <script src="{{asset('assets/static/js/pages/horizontal-layout.js')}}"></script>
    <script src="{{asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    

    <script src="{{asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>

    <script src="{{asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')}}"></script>
    <script src="{{asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js')}}"></script>
    <script src="{{asset('assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js')}}"></script>
    <script src="{{asset('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js')}}"></script>
    <script src="{{asset('assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js')}}"></script>
    <script src="{{asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')}}"></script>
    <script src="{{asset('assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js')}}"></script>
    <script src="{{asset('assets/extensions/filepond/filepond.js')}}"></script>
    <script src="{{asset('assets/static/js/pages/filepond.js')}}"></script>
    
    <script src="{{asset('assets/extensions/toastify-js/src/toastify.js')}}"></script>
    
    
        <script src="{{asset('assets/compiled/js/app.js')}}"></script>
    
    @stack('js')
    
</body>
</html>