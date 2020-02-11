<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <main>
        <header class="bg-secondary">
            <div class="text-dark text-center font-weight-bold">Super-duper news</div>
        </header>

        <form class="w-75 mx-auto content">

            @yield('menu')

            <div class="mt-2">
                @yield('content')
            </div>

        </form>
    </main>

    <footer class="bg-secondary">
        <div class="text-dark text-center">Footer</div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
