<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/stylesLogin.css') }}">
</head>
<body>
    <div class="container">
        <div class="left-section">
            @yield('left-section')
        </div>
        <div class="right-section">
            @yield('right-section')
        </div>
    </div>
    <footer class="footer">
        @yield('footer')
    </footer>
</body>
</html>
