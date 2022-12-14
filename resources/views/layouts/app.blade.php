<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- estilos --}}
    
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                       <li class="navbar-item">
                        <a class="nav-link  {{request()->is('sexos*')  ? 'active':''}}"  href="{{route("sexos.index")}}">Sexos</a>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link {{request()->is('idiomas*') ? 'active':''}}" href="{{route("idiomas.index")}}">Idiomas</a>
                            </li>
                        <li class="navbar-item">
                            <a class="nav-link {{request()->is('categorias*') ? 'active':''}}" href="{{route("categorias.index")}}">Categorias</a>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link {{request()->is('autores*') ? 'active':''}}" href="{{route("autores.index")}}">Autores</a>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link {{request()->is('libros*') ? 'active':''}}" href="{{route("libros.index")}}">Libros</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
    
            $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function(){
                $(".alert-dismissible").alert('close');
            });
    
            $('[data-toggle="tooltip"]').tooltip({
                trigger : 'hover'
            });
        });
    </script>
</body>
</html>
