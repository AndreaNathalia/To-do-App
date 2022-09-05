<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Qüilo Todo</title>
        <link rel="shortcut icon" href="https://quilolatam.com/assets/icon-blue.85ed0bd0.png">

        <!-- Styles -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit-icons.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/css/uikit.min.css" />
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
    </head>

    <body>
        <div id="app">
            <div class="uk-background-primary uk-light" style="background-color: #F3F4F6;">
                <nav class="uk-navbar-container uk-navbar-transparent">
                    <div class="uk-container">
                        <div class="uk-navbar" data-uk-navbar>
                            <div class="uk-navbar-left">
                                <a class="uk-navbar-item uk-logo" href="/"><img src="https://quilolatam.com/assets/icon-blue.85ed0bd0.png" alt="Qlogo" width="50" height="50"></a>
                            </div>
                            <div class="uk-navbar-right">
                                <ul class="uk-navbar-nav">
                                    <!-- Login / Signup -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li>
                                                <a href="{{ route('login') }}" style="color: #1CCC88;">Iniciar Sesión</a>
                                            </li>
                                        @endif
                                        @if (Route::has('register'))
                                            <li>
                                                <a href="{{ route('register') }}" style="color: #1CCC88;">Registrarse</a>
                                            </li>
                                        @endif
                                        @else

                                        <li>
                                            <a href="#" style="color: #1CCC88;">{{ Auth::user()->name }}</a>
                                            <div class="uk-navbar-dropdown">
                                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                                    <li>
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Log Out') }}</a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
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
            </div>
            <main>
                @yield('content')
            </main>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>