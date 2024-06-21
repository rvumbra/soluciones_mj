<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Soluciones Informáticas MJ</title>

    <?php //PLUGINS CSS?>
    {{--ScrollBars--}}
    <link rel="stylesheet" href="{{url('/')}}/css/plugins/overlayScrollBars.min.css">
    {{--Theme adminLTE--}}
    <link rel="stylesheet" href="{{url('/')}}/css/plugins/adminlte.min.css">
    {{--Notie--}}
    <link rel="stylesheet" href="{{url('/')}}/css/plugins/notie.css">
    {{--CSS MI CODIGO--}}
    <link rel="stylesheet" href="{{url('/')}}/css/app.css"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <?php //PLUGINS JS?>
    {{--Fontawesome--}}
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous" ></script>
    {{--JQuery--}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    {{--ScrollBars--}}
    <script src="{{url('/')}}/js/plugins/scrollbars.js" ></script>
    {{--Poper JS--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    {{--JS AdminLTE--}}
    <script src="{{url('/')}}/js/plugins/adminlte.js"></script>
    {{--JS Notie--}}
    <script src="{{url('/')}}/js/plugins/notie.js"></script>
    {{--JS MI CODIGO--}}
    <script src="{{url('/')}}/js/code.js"></script>
</head>
<body class="sidebar-mini layout-fixed sidebar-collapse">
    @include('mods.header')
    @include('mods.sidebar')
    <div id="app" class="container">
        <main class="py-4">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    @include('mods.footer')
</body>
</html>