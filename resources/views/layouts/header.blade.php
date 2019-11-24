<header>
    <div class="container">
        @guest
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('login') }}">Войти</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('register') }}">Регистрация</a>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-lg-12 col-6">
                    <a href="{{ route('profile.show', Auth::user()) }}">Личный кабинет</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-6">
                    <a href="{{ route('order.my') }}">Мои заказы</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-6">
                    <a href="{{ route('application.index') }}">Заявки</a>
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