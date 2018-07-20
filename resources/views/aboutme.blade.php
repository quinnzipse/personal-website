<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keyboards" content="Quinn, quinn, zipse,  Zipse, Quinn Zipse, quinn zipse, quinnzipse, QuinnZipse, SlippedMars9866">
        <meta name="description" content="Just a look into a programmers life online.">

        <title>Quinn Zipse</title>

        <link href="{{"css/app.css"}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    </head>
    <body>
    <nav>
        <div class="nav-wrapper">
            <a href="{{route('home')}}" class="left" style="margin-left: 1%">quinnzipse.me<small class="hide-on-large-only" style="font-size: 7px"> Beta</small></a>
        <ul class="right">
            <li><a href="#">About Me</a></li>
            <li><a href="#">Login</a></li>
        </ul>
        </div>
    </nav>
    <main class="blue">
        <div class="container">
        <h2 class="white-text">About Me</h2>
            <hr>
            <div class="row">
                <div class="col s12 l6">
                    <div class="card-panel blue darken-1">
                        <h5 class="white-text">General Info</h5>
                        <p class="grey-text text-lighten-4">I am currently a PSEO student from Kasson-Mantorville. In my free time, I enjoy developing different software for personal or open use, and playing video games.
                            I plan on studying computer science after I graduate in 2019.</p>
                        <p class="grey-text text-lighten-4">I am currently employed at Target. I joined right after I turned 16 and have worked there ever since.</p>
                        <p class="grey-text text-lighten-4">I have many projects I am currently working on including this site, my robotics team website, and a controller for my smart home devices.</p>
                    </div>
                </div>
                <div class="col s12 l6">
                    <div class="card-panel blue darken-1 center-align">
                        <br>
                        <h5 class="white-text">Intentionally</h5>
                        <h5 class="white-text">Left</h5>
                        <h5 class="white-text">Blank</h5>
                        <br>
                        <p class="grey-text text-lighten-4">More to come soon!</p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </main>
        <footer class="page-footer blue darken-1">
            <div class="footer-copyright">
                    <div class="footer-container left">
                        © 2018 Quinn Zipse
                    </div>
                    <a href="https://www.twitter.com/quinn_zipse" class="white-text" style="margin-right: 1%"><i class="fab fa-twitter"></i> Twitter</a>
            </div>
        </footer>
    </body>

</html>
