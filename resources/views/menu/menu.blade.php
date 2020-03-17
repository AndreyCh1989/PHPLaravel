<nav class="navbar navbar-light bg-light">
    <div class="col-8 d-flex flex-row">
        <div>
            <a class="navbar-brand" href='{{ route('index') }}'>Home</a>
        </div>
        <div>
            <a class="navbar-brand" href="{{ route('about') }}">About</a>
        </div>
        <div>
            <a class="navbar-brand" href="{{ route('news.all') }}">All News</a>
        </div>
        <div>
            <a class="navbar-brand" href="{{ route('categories') }}">Categories</a>
        </div>
        @auth
            @if(Auth::user()->is_admin)
                <div><a class="navbar-brand" href="{{ route('news.create') }}">Add News</a></div>
                <div><a class="navbar-brand" href="{{ route('news.ext') }}">Import News</a></div>
                <div><a class="navbar-brand" href="{{ route('news.resource.index') }}">Resources</a></div>
                <div><a class="navbar-brand" href="{{ route('user.index') }}">Users</a></div>
            @endif
        @endauth
    </div>
    <div class="text-right col-4">
        @guest
            <a class="navbar-brand" href="{{ route('login') }}">{{ __('Login') }}</a>
            <a class="navbar-brand" href="{{ route('facebook.open') }}"><i class="fab fa-facebook-square"></i></a>
            @if (Route::has('register'))
                <a class="navbar-brand" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <li class="nav-item dropdown navbar-brand">
                <a id="navbarDropdown" class="navbar-brand" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.edit', Auth::user()) }}">Edit</a>
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
