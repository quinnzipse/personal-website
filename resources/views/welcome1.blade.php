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
        <style>
            .parallax {
                /* The image used */
                background-image: url("{{asset('img/background.jpg')}}");

                /* Set a specific height */
                height: 800px;

                /* Create the parallax scrolling effect */
                background-attachment: fixed;
                background-position: top;
                background-repeat: no-repeat;
                background-size: cover;
            transform: translate3d(0px, 0px, 0px);
            }

        </style>
    </head>
    <body>
    <nav>
        <div class="nav-content">
        <ul class="left">
            <li><a href="#">quinnzipse.me<small class="hide-on-large-only" style="font-size: 7px"> Beta</small></a></li>
        </ul>
        <ul class="right">
            <li><a href="{{route('about')}}">About Me</a></li>
            <li><a href="#">Login</a></li>
        </ul>
        </div>
    </nav>
    <main class="blue">
        <div class="parallax">
            <div class="container"style="padding-top: 25%">
            <h2 class="white-text hide-on-med-and-down">Hello, I am Quinn Zipse</h2>
            <h5 class="white-text hide-on-large-only">Hello, I am Quinn Zipse</h5>
            <h5 class="white-text hide-on-med-and-down"style="padding-left: 3px">Developer and Photographer.</h5>
            <h6 class="white-text hide-on-large-only" style="padding-left: 3px">Developer and Photographer.</h6>
            <br>
            <br>
            <a href="{{route('about')}}" class="waves-effect waves-orange btn-flat white-text" style="padding-left: 5px">Learn More >></a>
            </div>
        </div>
        <div class="container" style="margin-bottom: 50%; margin-top: 2%">
        <h5 class="white-text">Try scrolling down</h5>
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
