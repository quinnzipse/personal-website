<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @php
        use Carbon\Carbon;
        $error = true;
        if(isset($recently_played->items)) $error = false;
    @endphp
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo($error ? 'Error Getting Music' : 'Quinn\'s Music')?></title>

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
<body class="bg-dark text-white">
<main>
    <noscript>
        <h1>Please Enable JavaScript to Continue.</h1>
    </noscript>
    <div id="app"></div>
    <div class="container">
        @if(!$error)
            <h3 style="margin: 2%">Recently Played Songs</h3>
            @if(isset($now_playing))
                <div id="playing_cards">
                    <div class="card bg-dark text-white border-white" style="width: 15%">
                        <div class="card-body" style="padding: 5%;">
                            <img alt="cover" src="{{$now_playing->item->album->images[0]->url}}" style="width: 100%; border-radius: 5px; margin-bottom: 2%">
                            <div class="card-title">
                                <h4>{{$now_playing->item->name}}</h4>
                            </div>
                            <p> @php
                                    $artists = array_column($now_playing->item->artists, 'name');
                                    $artists = implode(', ', $artists);
                                    echo $artists;
                                @endphp
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <div class="card" style="width: 23%;">
                    <div class="card-body bg-dark"><h4>Nothing Playing Right Now</h4></div>
                </div>
            @endif
            <div id="recently_played">
                <div class="card bg-dark" style="margin-bottom: 0">
                    <div class="card-grid" style="padding-bottom: 0">
                        <div id="title_header"><small>Title</small></div>
                        <div id="artists_header"><small>Artists</small></div>
                        <div id="played_at_header"><small>Listened To</small></div>
                    </div>
                </div>
                @foreach($recently_played->items as $item)
                    <div class="card bg-dark">
                        <div class="card-grid">
                            <div class="title">{{$item->track->name}}</div>
                            <div class="artist">
                                @php
                                    $artists = array_column($item->track->artists, 'name');
                                    $artists = implode(', ', $artists);
                                    echo $artists;
                                @endphp
                            </div>
                            <div class="played_at">
                                @php
                                    $time = new Carbon(substr($item->played_at, 0, strpos($item->played_at, 'T')) . ' ' . substr($item->played_at, strpos($item->played_at, 'T')+1, 8));
                                    echo $time->diffForHumans();
                                @endphp
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="card">
                <div class="card-body">
                    <div class="card-title"><h4>Error</h4></div>
                    <p class="">{{$data}}</p>
                </div>
            </div>
        @endif
    </div>
</main>
<style>
    .card-grid {
        padding: 1%;
        display: grid;
        grid-template-columns: 2fr 2fr 1fr;
    }

    .card {
        margin: .5% 1%;
    }
</style>
<script>
    $(document).ready(() => {
        console.log('hello!');
    });
</script>
</body>
</html>
