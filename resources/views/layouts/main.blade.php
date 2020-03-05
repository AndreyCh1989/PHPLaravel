<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('header.header')

    <div class="w-75 mx-auto content" id="container">
        @include('menu.menu')

        <div class="mt-2">
            @yield('content')
        </div>
    </div>

    @include('footer.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
