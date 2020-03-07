<nav class="navbar navbar-light bg-light">
    <div class="text-left col-6">
        <a class="navbar-brand" href='{{ route('index') }}'>Home</a>
        <a class="navbar-brand" href="{{ route('about') }}">About</a>
        <a class="navbar-brand" href="{{ route('news.all') }}">All News</a>
        <a class="navbar-brand" href="{{ route('categories') }}">Categories</a>
        @auth
            @if(Auth::user()->is_admin)
                <a class="navbar-brand" href="{{ route('news.create') }}">Add News</a>
            @endif
        @endauth
    </div>
    <div class="text-right col-6">
        @guest
            <a class="navbar-brand" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a class="navbar-brand" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <li class="nav-item dropdown navbar-brand">
                <a id="navbarDropdown" class="navbar-brand" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </div>
</nav>
