<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (Auth::check())
        <meta name="user_id" content="{{ Auth::user()->id }}" />
    @endif

    <title>ToDoList</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Icons -->
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>

<body>
    <div id="app">

        <header>

            <a class="logo" href="{{ url('/home') }}"><span class="logo1">To</span><span
                    class="logo2">Do</span><span class="logo3">List</span></a>

            <div class="user">



                @guest
                    @if (Route::has('login'))
                        <a class="nav-item {{ (request()->is('login')) ? 'active' : '' }}"
                            href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="nav-item {{ (request()->is('register')) ? 'active' : '' }}"
                        href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a href="{{ route('profile.edit') }}" class="profile">
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="avatar">
                        <p class="name">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</p>
                        <form action="{{ route('logout') }}" method="POST" class="logout">
                            @csrf
                            <button type="submit" class="logout">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </a>
                @endguest
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>

        </footer>
    </div>

    @livewireScripts
</body>

</html>
