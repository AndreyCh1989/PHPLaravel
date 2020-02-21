<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <main>
        @include('header.header')

        <div class="w-75 mx-auto content">

            @include('menu.menu')

            <div class="mt-2">
                @yield('content')
            </div>

        </div>
    </main>

    @include('footer.footer')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
