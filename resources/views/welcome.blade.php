<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="Quinn, quinn, zipse,  Zipse, Quinn Zipse, quinn zipse, quinnzipse, QuinnZipse, SlippedMars9866, software, developer, quinnzipse.dev, .dev, zipse.dev Dev, Programmer, Computers, Quinnzipse.me, zipse.me, QZ, Qzipse, zipsequinn, personal blog, blog, developer life, student">
    <meta name="description"
          content="A peek into the developer life of Quinn Zipse. This website explains who I am and gives me a place on the internet to call home. There isn't really much here, but I hope you enjoy. ">

    <title>Quinn Zipse</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
          integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

</head>
<body>
<main>
    <div id="main_content">
        <div id="text_container">
            <h2 class="mb-0"> Hi, I'm </h2>
            <h1 class="text-white">Quinn Zipse</h1>
            <div class="description-container">
                <ul class="description-list">
                    <li class="text-white description-item">Student</li>
                    <li class="text-white description-item">Developer</li>
                    <li class="text-white description-item">Gamer</li>
                    <li class="text-white description-item">Investor</li>
                    <li class="text-white description-item">Human</li>
                </ul>
            </div>
        </div>
    </div>
    <hr id="the_divide">
    <div id="about-panel">
        <div id="about_panel_container">
            <div id="about">
                <p><span>Web Developer by day, Chicken Tender by night.</span><br> Born and raised in Southeast
                    Minnesota.
                    Full-time student at The University of Wisconsin - La Crosse. Majoring in Computer Science,
                    Class of 2023.
                    Tesla and Google fanboy. Currently an intern at AgVantage Software, Inc. where I develop web apps
                    for agricultural co-ops around the nation.</p>
            </div>
            <div id="other_stuff">
                <div id="image_container" class="">
                    <img src="{{asset('/img/quinn_color.jpg')}}" alt="a picture of me :)">
                </div>
                <div id="connections">
                    <div id="conn_text_container">
                        <h4>Get in touch!</h4>
                    </div>
                    <div id="brand_container">
                        <a href="https://instagram.com/quinn.zipse"><i class="fab fa-instagram"></i></a>
                        <a href="https://facebook.com/quinnzipse"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://linkedin.com/in/quinnzipse"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://github.com/quinnzipse"><i class="fab fa-github"></i></a>
                        <a href="https://twitter.com/quinnzipse"><i class="fab fa-twitter"></i></a>
                        <a href="mailto:heyitsme@quinnzipse.dev"><i class="far fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    <div id="contact-panel">--}}
    {{--    </div>--}}
</main>
</body>
</html>
