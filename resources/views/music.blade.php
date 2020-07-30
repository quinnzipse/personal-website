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
@php
        @endphp
<main>
    <noscript>
        <h1>Please Enable JavaScript to Continue.</h1>
    </noscript>
    @if(!$error)
        @if(isset($now_playing))
            <div id="song_marquee">
                <div id="previous_song">
                    <img src="{{$recently_played->items[0]->track->album->images[1]->url}}"
                         alt="{{$recently_played->items[0]->track->name}}">
                </div>
                <div id="now_playing">
                    <div id="now_playing_container">
                        <img alt="cover" src="{{$now_playing->item->album->images[0]->url}}"
                             style="width: 100%; border-radius: 5px; margin-bottom: 2%">
                        <div class="card-title">
                            <h4>{{$now_playing->item->name}}</h4>
                        </div>
                        <p>
                            @php
                                $artists = array_column($now_playing->item->artists, 'name');
                                $artists = implode(', ', $artists);
                                echo $artists;
                            @endphp
                        </p>
                    </div>
                </div>
                <div id="next_marquee">
                    <div id="next_up">
                        <div id="next_up_container">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card" style="width: 23%;" id="song_marquee">
                <div class="card-body bg-dark"><h4>Nothing Playing Right Now</h4></div>
            </div>
        @endif
{{--        <div id="extras">--}}
{{--            <div id="song_history">--}}
{{--                <div class="card bg-dark" style="margin-bottom: 0">--}}
{{--                    <div class="card-grid" style="padding-bottom: 0">--}}
{{--                        <div id="title_header"><small>Title</small></div>--}}
{{--                        <div id="artists_header"><small>Artists</small></div>--}}
{{--                        <div id="played_at_header"><small>Listened To</small></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @foreach($recently_played->items as $item)--}}
{{--                    <div class="card bg-dark">--}}
{{--                        <div class="card-grid">--}}
{{--                            <div class="title">{{$item->track->name}}</div>--}}
{{--                            <div class="artist">--}}
{{--                                @php--}}
{{--                                    $artists = array_column($item->track->artists, 'name');--}}
{{--                                    $artists = implode(', ', $artists);--}}
{{--                                    echo $artists;--}}
{{--                                @endphp--}}
{{--                            </div>--}}
{{--                            <div class="played_at">--}}
{{--                                @php--}}
{{--                                    $time = new Carbon(substr($item->played_at, 0, strpos($item->played_at, 'T')) . ' ' . substr($item->played_at, strpos($item->played_at, 'T')+1, 8));--}}
{{--                                    echo $time->diffForHumans();--}}
{{--                                @endphp--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <div id="request_button_container">--}}
{{--                <button class="btn btn-sm btn-primary" disabled>Request A Song</button>--}}
{{--            </div>--}}
{{--        </div>--}}
    @else
        <div class="card">
            <div class="card-body">
                <div class="card-title"><h4>Error</h4></div>
                <p class="text-dark">{{$recently_played}}</p>
            </div>
        </div>
    @endif
</main>
<script>
    const getQueue = async () => {
        const request = await fetch();
        const response = request.json();

        if(!response.ok) console.warn('Error while fetching queue');

        console.log(response);

        response.forEach(val => {

        });
    };

    const addSongToQueue = async (uri) => {
        const request = await fetch("../api/spotify/add_to_queue/", {
            method: "POST",
            body: JSON.stringify({
                uri: uri
            }),
        });
        const response = request.json();
        console.log(response);
    }
</script>
<style>
    #song_marquee {
        display: grid;
        grid-template-columns: 1fr 1.3fr 1fr;
        column-gap: 10px;
        margin: 5vh 10px 0 10px;
        height: 75vh;
    }

    #previous_song {
        height: 80%;
        margin: auto;
    }

    #now_playing {
        display: flex;
        height: 100%;
    }

    #now_playing_container {
        margin: auto;
        width: 80%;
    }

    #now_playing_container img {
        width: 100% !important;
    }

    #next_marquee {
        height: 80%;
        display: flex;
    }

    #next_up {
        height: 15vh;
        width: 15vh;
        border: lawngreen solid 2px;
        color: lawngreen;
        border-radius: 10px;
        margin: auto;
        display: flex;
    }

    #next_up_container {
        margin: auto;
        text-align: center;
    }

    #next_up i {
        font-size: x-large;
    }
</style>
</body>
</html>
