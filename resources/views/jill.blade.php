<html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="VX0GKDu4Bx3pKsSgKilPWJV0l5vBivXvCzF06Mvc5tc"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dear Jill</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
<body style="background-color: pink">
<div class=" h-100 d-flex justify-content-center align-items-center">
    <h1 class="text-white" style="font-size: 5em">Happy Valentine's Day!</h1>
</div>
<div class="h-100 w-100">
        <div class="row d-flex justify-content-center align-items-center w-100">
            <h1 class="text-white mt-5">Here's to us!</h1>
        </div>
        <div class="row d-flex justify-content-center align-items-center mt-5 w-100">
            <h1 class="text-white mr-4"><i class="far fa-heart"></i></h1>
            <img src="{{asset('img/quinn_jill.jpg')}}" alt="Picture of me and you <3" width="50%">
            <h1 class="text-white ml-4"><i class="far fa-heart"></i></h1>
        </div>
</div>
</body>
</html>