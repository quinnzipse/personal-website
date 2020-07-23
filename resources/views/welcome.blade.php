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
        <div id="image_container" class="">
            <div id="inner_container">
                <img src="{{asset('/img/quinn_color.jpg')}}" alt="a picture of me :)">
            </div>
        </div>
    </div>
    <div id="about-panel">
        <div class="container" id="about_panel_container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="about-card" id="personal">
                        <h4 class="text-center"><i class="fas fa-home"></i> Personal</h4>
                        <hr>
                        <ul>
                            <li>Contributed to the Arctic Code Vault</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-card" id="scholarly">
                        <h4 class="text-center"><i class="fas fa-graduation-cap"></i> Scholarly</h4>
                        <hr>
                        <ul>
                            <li>Sophomore at The University of Wisconsin La-Crosse</li>
                            <li></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-card" id="professional">
                        <h4 class="text-center"><i class="fas fa-user-tie"></i> Professional</h4>
                        <hr>
                        <ul>
                            <li>Intern at AgVantage Software, Inc.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<style type="text/css">

    #main_content {
        display: flex;
        width: 100%;
        height: 55vh;
        background: rgb(40, 80, 46) linear-gradient(360deg, rgba(40, 80, 46, 1) 10%, rgba(27, 47, 51, 1) 91%);
    }

    #inner_container {
        border: 3px solid white;
        border-radius: 50%;
    }

    #image_container {
        width: 23%;
        height: fit-content;
        margin: auto auto -3px auto;
        /*border: 5px solid rgba(60, 60, 60, .1);*/
        border-radius: 50%;
        /*box-shadow: 3px 10px rgba(0, 0, 0, .1);*/
    }

    #image_container img {
        width: 100%;
        margin: auto;
        border-radius: 50%;
    }

    body {
        font-family: 'Major Mono Display', monospace;
    }

    #text_container {
        font-family: 'Major Mono Display', monospace;
        margin: auto 0 4% auto;
        width: fit-content;
        font-size: 2.5rem;
        line-height: 2.6rem;
    }

    #text_container h1 {
        font-size: 4.5rem;
        line-height: 4.5rem;
    }

    #text_container h2 {
        font-size: 1.8rem;
        margin-left: 4px;
        line-height: 1.8rem;
    }

    .description-container {
        overflow: hidden;
        height: 3rem;
        margin-top: 45px;
    }

    .description-list {
        padding-left: 4px;
        margin-top: 0;
        text-align: left;
        list-style: none;
        animation: change 12s infinite;
    }

    .description-item {
        line-height: 2.6rem;
        margin: 0;
    }

    @-webkit-keyframes change {
        0%, 16%, 100% {
            transform: translateY(0);
        }
        20%, 36% {
            transform: translateY(-20%);
        }
        40%, 56% {
            transform: translateY(-40%);
        }
        60%, 76% {
            transform: translateY(-60%);
        }
        80%, 96% {
            transform: translateY(-80%);
        }

    }
</style>
<style type="text/css">
    #about-panel {
        margin-top: 3px;
        height: calc(45vh - 3px);
        /*background: linear-gradient(360deg, rgba(27,47,51,1) 5%, rgba(40,80,46,1) 36%,  91%);*/
        background-color: rgba(85, 116, 60, 1);
        display: flex;
    }

    #about_panel_container {
        margin: auto;
    }

    .about-card {
        padding: 3%;
        margin: auto auto 10% auto;
        border: 2px solid white;
        border-radius: 10px;
    }

    .about-card span {
        font-size: 2rem;
        color: white;
        display: block !important;
    }

    .about-card ul {
        font-family: 'Montserrat', sans-serif;
        padding-left: 0;
        text-align: center;
    }

    .about-card h4 {
        color: #EF8275;
    }

    .about-card hr {
        background-color: #EF8275;
    }

    .about-card li {
        list-style: none;
        color: #E6E8E6;
    }
</style>
</body>
</html>
