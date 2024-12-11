<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>