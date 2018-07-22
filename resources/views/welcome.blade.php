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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"
            integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
            crossorigin="anonymous"></script>
</head>
<body style="height: 100%" class="bg-primary">
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a href="{{route('home')}}" class="navbar-brand text-white">quinnzipse.me</a>
    <div class="collapse navbar-collapse" id="navbarNav"></div>
    <ul class="navbar-nav">
        <a href="{{route('about')}}" class="nav-link text-white">About Me</a>
        <a href="#" class="nav-link text-white">Login</a>
    </ul>
</nav>
<main class="bg-primary">
    <div class="welcome-section">
        <div class="container" style="margin-top: 18%">
            <br>
        </div>
        <div class="container" style="height: 50%">
            <br>
            <h1 class="text-white font-weight-light" style="font-size:3.7em;">Hello, I am Quinn Zipse</h1>
            <h4 class="text-white font-weight-light" style="font-size:2em;">Programming is what I do.</h4>
            <br>
            <br>
            <a href="{{route('about')}}" class="text-white font-weight-light" style="font-size: 1.2em">Learn More >></a>
        </div>
    </div>
</main>
<footer class="footer-welcome">
    <span class="text-white text-left" style="margin-left: 1%"> © 2018 Quinn Zipse </span>
    <a href="https://www.facebook.com/quinnzipse" class="text-white" style="margin-left: 80%"><i
                class="fab fa-facebook text-white"></i> Facebook </a>
    <span> </span>
    <a href="https://www.twitter.com/quinn_zipse" class="text-white text-right" style="margin-left: 1%"><i
                class="fab fa-twitter text-white"></i> Twitter</a>
</footer>
</body>

</html>
