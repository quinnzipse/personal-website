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

    <link href="{{"css/boot.css"}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
          integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css"
          integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"
            integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
            crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="{{route('home')}}" class="navbar-brand">quinnzipse.me</a>
    <div class="collapse navbar-collapse" id="navbarNav"></div>
    <ul class="navbar-nav">
        <a href="{{route('home')}}" class="nav-link">Materialize Edition</a>
        <a href="{{route('about')}}" class="nav-link">About Me</a>
        <a href="#" class="nav-link">Login</a>
    </ul>
</nav>
<main class="blue">
    <div class="container" style="margin-top: 18%">
        <br>
    </div>
    <div class="container" style="height: 50%">
        <h1 class="">Hello, I am Quinn Zipse</h1>
        <h4 class="" style="padding-left: 3px">Programming is what I do.</h4>
        <br>
        <br>
        <a href="{{route('about')}}" class="text-dark" style="padding-left: 5px">Learn More >></a>
    </div>
</main>
<footer class="footer" style="background-color: #f5f5f5">
    <span class="text-muted text-left" style="margin-left: 1%"> © 2018 Quinn Zipse </span>
    <a href="https://www.twitter.com/quinn_zipse" class="white-text text-right" style="margin-left: 85%"><i
                class="fab fa-twitter"></i> Twitter</a>
</footer>
</body>

</html>
