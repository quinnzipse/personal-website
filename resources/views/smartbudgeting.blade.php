<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyboards"
          content="Quinn, quinn, zipse,  Zipse, Quinn Zipse, quinn zipse, quinnzipse, QuinnZipse, SlippedMars9866, Software Developer, Dev, Programmer, Computers, Quinnzipse.me, zipse.me, QZ, Qzipse, zipsequinn, personal blog, blog">
    <meta name="description" content="This page contains information about the smartbudgeting app. This app is a personal project of mine and is still in beta.">

    <title>quinnzipse.dev</title>

    <link href="{{"css/app.css"}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
          integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <style type="text/css">
        body {
            position: relative;
        }
    </style>
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="10">
<nav class="navbar navbar-expand-lg navbar-light bg-primary" id="navbar" style="position:fixed;top:0;left:0;right:0;">
    <a href="https://quinnzipse.dev" class="navbar-brand text-white">quinnzipse.dev</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target=".navbar-collapse"
            aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white" style="font-size: .9em"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item"><a href="{{"login"}}" class="nav-link text-white">Login</a></li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Hello, {{ Auth::user()->name }}! <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('home')}}">
                            Dashboard
                        </a>
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
        </ul>
    </div> <!--End Nav Bar -->
</nav>
<main class="h-100">
    <div class="bg-white " id="main" style="height: 95%">
        <br>
        <br>
        <br>
        <div class="d-none d-lg-block container mt-5 h-75">
            <span class="mb-0"><span class="text-primary font-weight-bolder"
                                     style="font-size: 200%">Smart Budgeting</span> <span class="text-faint"
                                                                                          style="font-size: 120%; margin-left: 74%">v0.1</span></span>
            <hr class="mt-1">
            <h6 class="text-muted"> A fast way to keep track of expenses.</h6>

            <div class="h-25"></div>
            <h3 class="text-faint font-weight-light" style="margin-left: 40%">More to come soon</h3>

        </div>
        <div class="d-lg-none container mt-5 h-75">
            <span class="mb-0"><span class="text-primary font-weight-bolder"
                                     style="font-size: 200%">Smart Budgeting</span> <span class="text-faint ml-5"
                                                                                          style="font-size: 120%;">v0.1</span></span>
            <hr class="mt-1">
            <h6 class="text-muted"> A fast way to keep track of expenses.</h6>

            <div class="h-25"></div>
            <h3 class="text-faint font-weight-light" style="margin-left: 13%">More to come soon</h3>

        </div>
    </div>
    <footer class="footer-welcome fixed-bottom">
        <span style="margin-left: 1%">© 2018 Quinn Zipse</span>
        <a href="https://www.facebook.com/quinnzipse" class="float-right mr-3 text-white"><i
                    class="fab fa-facebook text-white"></i> Facebook </a>
        <a href="https://www.twitter.com/quinnzipse" class="float-right mr-3 text-white"><i
                    class="fab fa-twitter text-white"></i> Twitter</a>
    </footer>
</main>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script href="{{'js/all.js'}}" type="text/js"></script>
</body>

</html>
