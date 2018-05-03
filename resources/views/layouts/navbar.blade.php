<nav class="uk-navbar-container">
    <div class="uk-container">
        <div class="uk-navbar">
            <div class="uk-navbar-left">
                <a class="uk-navbar-item uk-logo" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">ログイン</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">ユーザー登録</a></li>
                    @else
                        <li>
                            <button class="uk-button uk-button-primary" type="button">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                <span uk-icon="icon: triangle-down;"></span>
                            </button>
                            <div  uk-dropdown="mode: click">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            ログアウト
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>