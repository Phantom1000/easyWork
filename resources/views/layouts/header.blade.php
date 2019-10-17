<header>
    <div class="container">
        @guest
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ url()->current() . '/#gray1' }}">Войти</a>
                </div>
            </div>
            @if (Route::has('register'))
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ url()->current() . '/#gray' }}">Регистрация</a>
                    </div>
                </div>
            @endif
        @else
            <div class="row">
                <div class="col-lg-12 col-6">
                    <a href="{{ route('profile', Auth::user()) }}">Личный кабинет</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-6">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Выйти</a>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </div>
</header>