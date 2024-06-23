<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Soluciones Informáticas MJ</title>

    <?php //PLUGINS CSS?>
    {{--Boostrap--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{--ScrollBars--}}
    <link rel="stylesheet" href="{{url('/')}}/css/plugins/overlayScrollBars.min.css">
    {{--Theme adminLTE--}}
    <link rel="stylesheet" href="{{url('/')}}/css/plugins/adminlte.min.css">
    {{--Notie--}}
    <link rel="stylesheet" href="{{url('/')}}/css/plugins/notie.css">
    {{--DataTable--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    {{--Year Calendar--}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/js-year-calendar@latest/dist/js-year-calendar.min.css" />
    <!-- Spectrum CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.1/spectrum.min.css" />
    {{--CSS MI CODIGO--}}
    <link rel="stylesheet" href="{{url('/')}}/css/app.css"></script>

    {{--JQuery--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <?php //PLUGINS JS?>
    {{--Fontawesome--}}
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous" ></script>
    {{--ScrollBars--}}
    <script src="{{url('/')}}/js/plugins/scrollbars.js" ></script>
    {{--Poper JS--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    {{--JS AdminLTE--}}
    <script src="{{url('/')}}/js/plugins/adminlte.js"></script>
    {{--JS Notie--}}
    <script src="{{url('/')}}/js/plugins/notie.js"></script>
    {{--DataTable--}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    {{--Boostrap--}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{--Year Calendar--}}
    <script src="https://unpkg.com/js-year-calendar@latest/dist/js-year-calendar.min.js"></script>
    <!-- Spectrum JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.1/spectrum.min.js"></script>
    {{--JS MI CODIGO--}}
    <script src="{{url('/')}}/js/code.js?v=1.2"></script>
</head>
<body class="sidebar-mini layout-fixed sidebar-collapse">
    @include('mods.header')
    @include('mods.sidebar')
    <div id="app">
        <main class="py-4">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    @include('mods.footer')
</body>
</html>