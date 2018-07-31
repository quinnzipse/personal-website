<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyboards"
          content="Quinn, quinn, zipse,  Zipse, Quinn Zipse, quinn zipse, quinnzipse, QuinnZipse, SlippedMars9866">
    <meta name="description" content="Just a look into a programmers life online.">

    <title>Quinn Zipse</title>

    <link href="{{"css/app.css"}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
          integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <style href="{{'js/all.js'}}" type="text/js"></style>
    <style type="text/css">
        body{
            position: relative;
        }
    </style>
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="10">
<nav class="navbar navbar-expand-lg navbar-light bg-primary" id="navbar" style="position:fixed;top:0;left:0;right:0;">
    <a href="#main" class="navbar-brand text-white">quinnzipse.me</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white" style="font-size: .9em"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbar1">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="#aboutme" class="nav-link text-white">About Me</a></li>
        <li class="nav-item"><a href="{{"login"}}" class="nav-link text-white">Login</a></li>
    </ul>
    </div>
</nav>
<main class="h-100">
    <div class="h-100 bg-primary shadow-lg" id="main">
        <div  style="padding-top: 25%">
            <div class="h-20"></div>
            <div class="container d-none d-lg-block">
                <h1 class="text-white font-weight-light" style="font-size:3.7em;">Hello, I am Quinn Zipse</h1>
            {{--<h4 class="text-white font-weight-light" style="font-size:2em;">Programming is what I do.</h4>--}}
            <br>
            <a href="#aboutme" class="text-white font-weight-light" style="font-size: 1.2em; margin-bottom: 15px">Learn More >></a>
            </div>
            <div class="d-sm-none container">
                <h1 class="text-white font-weight-light" style="font-size: 2rem">Hello, I am Quinn Zipse</h1>
                {{--<h5 class="text-white font-weight-light">Programming is what I do.</h5>--}}
                <br>
                <a href="#aboutme" class="text-white font-weight-light" style="font-size: 1.2em; margin-bottom: 15px">Learn More >></a>
            </div>
            <div class="container d-none d-sm-block d-lg-none">
                <h1 class="text-white font-weight-light">Hello, I am Quinn Zipse</h1>
                {{--<h4 class="text-white font-weight-light">Programming is what I do.</h4>--}}
                <br>
                <a href="#aboutme" class="text-white font-weight-light" style="font-size: 1.2em; margin-bottom: 15px">Learn More >></a>
            </div>
                <div class='mt-5'>
                <br>
                <br>
                <br>
                <br>
            </div>
            <div id="aboutme">
                <br>
            </div>
        </div>
    </div>
    </div>
    <div class="h-75">
        <div class="container" style="padding-top: 3%">
            <br>
            <h1 class="text-primary font-weight-light">About Me</h1>
            <div class="dropdown-divider"></div>
            <br>
            <h5>General Info</h5>
            <p class="grey-text text-lighten-4">I am currently a PSEO student from Kasson-Mantorville.
                                In my
                                free time, I enjoy developing different software for personal or open use, and playing
                                video
                                games.
                                I plan on studying computer science after I graduate in 2019.</p>
            <p class="grey-text text-lighten-4">I am currently employed at Target. I joined right after
                                I turned
                                16 and have worked there ever since.</p>
            <p class="grey-text text-lighten-4">I have many projects I am currently working on including
                                this
                                site, my robotics team- website, and a controller for my smart home devices.</p>
        </div>
    </div>
    <div class="bg-primary shadow-lg" style="height: 3%">

    </div>
    <footer class="footer-welcome">
        <span style="margin-left: 1%">© 2018 Quinn Zipse</span>
        <a href="https://www.facebook.com/quinnzipse" class="float-right mr-3"><i
            class="fab fa-facebook text-white"></i> Facebook </a>
        <a href="https://www.twitter.com/quinn_zipse" class="float-right mr-3" ><i
                    class="fab fa-twitter text-white"></i> Twitter</a>
    </footer>
</main>
</body>

</html>
