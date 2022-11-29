<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Elecciones</title>
 <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
 <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>
<body>
 <div class="container">
 @yield('content')
 </div>
 <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>