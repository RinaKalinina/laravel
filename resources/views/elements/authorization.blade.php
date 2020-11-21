<div class="authorization-block">
    @if (Route::has('login'))
        @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  class="d-none">
                @csrf
            </form>

            <a class="authorization-block__link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                Выйти
            </a>
        @else
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="authorization-block__link">Регистрация</a>
            @endif
            <a href="{{ route('login') }}" class="authorization-block__link">Войти</a>
        @endauth
    @endif
</div>
