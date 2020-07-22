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
        <div id="image_container">
        </div>
        <div id="text_container">
            <h1 class="text-white">Hi, I'm Quinn Zipse</h1><br>
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
        <div id="gradient"></div>
    </div>
    <div id="about-panel">
        <div class="about-card" id="personal">
            <span>Personal</span>
            <ul>
                <li>Contributed to the Arctic Code Vault</li>
            </ul>
        </div>
        <div class="about-card" id="professional">
            <span>Professional</span>
            <ul>
                <li>Studying Computer Science at The University of Wisconsin La-Crosse</li>
            </ul>
        </div>
        <div class="about-card" id="scholarly">
            <span>Scholarly</span>
            <ul>
                <li>Studying Computer Science at The University of Wisconsin La-Crosse</li>
            </ul>
        </div>
    </div>
</main>
<style type="text/css">

    #main_content {
        display: flex;
        width: 100%;
        height: 100vh;
    }

    #image_container {
        background: radial-gradient(circle, rgba(40, 80, 46, 0) 40% , rgba(40, 80, 46, .9) 65%, rgba(40, 80, 46) 70%), url("../img/quinn2.jpg");
        background-position: right;
        background-repeat: no-repeat;
        background-size: cover;
        width: 35%;
        height: 70%;
        margin: auto;
    }

    #text_container {
        margin: auto auto auto 0;
        width: fit-content;
        font-size: 2.5rem;
        font-family: 'Major Mono Display', monospace;
        line-height: 2.6rem;
        z-index: 30;
    }

    #text_container h1 {
        font-size: 3.6rem;
    }

    body {
        background-color: rgb(40, 80, 46);
    }

    #gradient {
        position: absolute;
        height: 100%;
        width: 100%;
        overflow: hidden;
        /*z-index: -1;*/
        /*background: linear-gradient(360deg, rgba(85,116,60,1) 9%, rgba(40,80,46,1) 87%);*/
        background: linear-gradient(360deg, rgba(85, 116, 60, .6) 1%, rgba(40, 80, 46, .6) 36%, rgba(27, 47, 51, .6) 91%);
        /*background: linear-gradient(360deg, rgba(239,48,84,1) 0%, rgba(27,47,51,1) 100%);*/
        /*background: linear-gradient(360deg, rgba(239, 48, 84, 1) 0%, rgba(140, 112, 81, 1) 35%, rgba(27, 47, 51, 1) 83%);*/
    }

    .description-container {
        overflow: hidden;
        height: 2.6rem;
    }

    .description-list {
        padding-left: 3px;
        margin-top: 0;
        text-align: left;
        list-style: none;
        animation: change 16s infinite;
    }

    .description-item {
        line-height: 2.6rem;
        margin: 0;
    }

    @-webkit-keyframes change {
        0%, 10%, 100% {
            transform: translateY(0);
        }
        12.5%, 22.5% {
            transform: translateY(-20%);
        }
        25%, 35% {
            transform: translateY(-40%);
        }
        37.5%, 47.5% {
            transform: translateY(-60%);
        }
        50%, 60% {
            transform: translateY(-80%);
        }
        62.5%, 72.5% {
            transform: translateY(-60%);
        }
        75%, 85% {
            transform: translateY(-40%);
        }
        87.5%, 97.5% {
            transform: translateY(-20%);
        }
    }
</style>
<style type="text/css">
    #about-panel {
        margin-top: 100vh;
        height: 100vh;
        /*background: linear-gradient(360deg, rgba(27,47,51,1) 5%, rgba(40,80,46,1) 36%,  91%);*/
        background-color: rgba(85, 116, 60, 1);
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 5%;
    }

    .about-card {
        margin: auto auto 10% auto;
        display: flex;
    }

    .about-card span {
        font-size: 2rem;
        color: white;
        display: block !important;
    }

</style>
</body>
</html>
