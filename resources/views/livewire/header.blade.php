<header>

    <a class="logo" href="{{ url('/home') }}"><span class="logo1">To</span><span
            class="logo2">Do</span><span class="logo3">List</span></a>

    <div class="user">



        @guest
            @if (Route::has('login'))
                <a class="nav-item {{ request()->is('login') ? 'active' : '' }}"
                    href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif

            @if (Route::has('register'))
                <a class="nav-item {{ request()->is('register') ? 'active' : '' }}"
                    href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <a href="{{ route('profile.edit') }}" class="profile">
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="avatar">
                <p class="name">{{ $user->first_name . ' ' . $user->last_name }}</p>
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
