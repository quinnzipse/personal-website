<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="quinn, zipse, user, login, quinnzipse, me">

    <link rel="icon" href="{{'img/favicon.ico'}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
          integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-primary">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel shadow">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler text-white" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon text-white"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('register') }}">Sign Up</a></li>

                    @else
                        <li class="nav-item dropdown text-white">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret text-white"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    {{--main--}}
    <main class="py-4 bg-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 card bg-cardColor">
                    <div class="card-header">
                        <div class="row">
                                <h3 class=" text-white align-self-center">{{ __('Login') }}</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-sm-4 col-form-label text-md-right text-white">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right text-white">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-white" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-outline-info">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </main>
    {{--    <main class="py-4 bg-primary">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row justify-content-center">--}}
    {{--                <div class="col-md-8">--}}
    {{--                    <div class="card">--}}
    {{--                        <div class="card-header">{{ __('Login') }}</div>--}}

    {{--                        <div class="card-body">--}}
    {{--                            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">--}}
    {{--                                @csrf--}}

    {{--                                <div class="form-group row">--}}
    {{--                                    <label for="email"--}}
    {{--                                           class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}
    {{--                                    <div class="col-md-6">--}}
    {{--                                        <input id="email" type="email"--}}
    {{--                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"--}}
    {{--                                               name="email" value="{{ old('email') }}" required autofocus>--}}

    {{--                                        @if ($errors->has('email'))--}}
    {{--                                            <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $errors->first('email') }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                        @endif--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}

    {{--                                <div class="form-group row">--}}
    {{--                                    <label for="password"--}}
    {{--                                           class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

    {{--                                    <div class="col-md-6">--}}
    {{--                                        <input id="password" type="password"--}}
    {{--                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"--}}
    {{--                                               name="password" required>--}}

    {{--                                        @if ($errors->has('password'))--}}
    {{--                                            <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $errors->first('password') }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                        @endif--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}

    {{--                                <div class="form-group row">--}}
    {{--                                    <div class="col-md-6 offset-md-4">--}}
    {{--                                        <div class="form-check">--}}
    {{--                                            <input class="form-check-input" type="checkbox" name="remember"--}}
    {{--                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

    {{--                                            <label class="form-check-label" for="remember">--}}
    {{--                                                {{ __('Remember Me') }}--}}
    {{--                                            </label>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}

    {{--                                <div class="form-group row mb-0">--}}
    {{--                                    <div class="col-md-8 offset-md-4">--}}
    {{--                                        <button type="submit" class="btn btn-primary">--}}
    {{--                                            {{ __('Login') }}--}}
    {{--                                        </button>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </form>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </main>--}}
</div>
</body>
</html>