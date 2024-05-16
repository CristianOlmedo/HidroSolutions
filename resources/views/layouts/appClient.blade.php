<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/indexClient.css') }}">
</head>
<body>
    <main>
        @yield('content')
    </main>

    <footer class="footer">
        @yield('footer')
    </footer>

</body>
</html>
