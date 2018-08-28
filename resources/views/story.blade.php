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
    <style type="text/css">
        body {
            position: relative;
        }
    </style>
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="10">
<nav class="navbar navbar-expand-lg navbar-light bg-primary" id="navbar" style="position:fixed;top:0;left:0;right:0;">
    <a href="#main" class="navbar-brand text-white">quinnzipse.me</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target=".navbar-collapse"
            aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white" style="font-size: .9em"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="#aboutme" class="nav-link text-white">About Me</a></li>
            <li class="nav-item"><a href="{{"login"}}" class="nav-link text-white">Login</a></li>
        </ul>
    </div>
</nav>
<br>
@if($loggedInSpotify) <!-- This will hit when ONLY Spotify is connected -->
@if($song_details != null)
    @php
        $song_name = $song_details->item->name;
        $artist = $song_details->item->artists[0]->name;
        $timeout = $song_details->item->duration_ms - $song_details->progress_ms; //Took out an offset because it was no longer needed
        $playing = $song_details->is_playing;
    @endphp
    <script type="text/javascript">
        setTimeout(function () {
            location.reload();
        }, {{$timeout}});
    </script>
    <div class="container mt-5 row">
    <div class="offset-3 col-lg-5 col-7 col-sm-7">
            <div class="col-12">
                        <div class="container">
                            <div class=" d-flex justify-content-center">
                                <img src="{{$image_url}}" style="height: 75%; width: 75%;">
                            </div>
                        </div>
        </div>
    </div>
        <div class="col-lg-4 col-5">
            <div class="row mt-3">
            @if(strlen($song_name) > 17)
                <h4 class="font-weight-normal truncate">{{$song_name}}</h4>
            @else
                <h2 class="font-weight-normal">{{$song_name}}</h2>
            @endif
            </div>
                <div class="row">
                    <h5 class="font-weight-light float-left">{{$artist}}</h5>
                </div>
        </div>
    </div>
@else
    <div class="container h-100">
        <div class="justify-content-center d-flex h-100">
            <div class="align-items-center d-flex">
                <h3 class="text-faint font-weight-light">Nothing is playing right now.</h3>
            </div>
        </div>
    </div>
@endif
@endif
</body>
</html>