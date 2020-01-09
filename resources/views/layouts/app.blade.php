<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/efa587470c.js" crossorigin="anonymous"></script>

    <style>
        body{
            padding: 10px;
        }

        .navbar{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        @component('components.navbar', ["current" => $current])
            
        @endcomponent
        <main role="main">
            @hasSection ('body')
                @yield('body')                
            @endif
        </main>
    </div>


    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    
    @hasSection ('javascript')
        @yield('javascript')
    @endif

</body>
</html>