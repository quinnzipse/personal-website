<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @php
        use Carbon\Carbon;
        $error = true;
        if(isset($recently_played->items)) $error = false;
        if(isset($now_playing)) $now_playing_data = json_decode($now_playing->data);
    @endphp
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo($error ? 'Error Getting Music' : 'Quinn\'s Music')?></title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
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

    <style>
        main {
            transition: background-color 400ms;
        }

        #main_content {
            display: grid;
            grid-template-columns: 1fr 4fr 1fr;
            height: 100vh !important;
            transition: color 200ms;
            transition-delay: 100ms;
        }

        /* Now Playing Styling. */
        #now_playing_container {
            display: flex;
            width: 100%;
        }

        #now_playing {
            margin: auto;
            width: 40%;
        }

        #now_playing img {
            margin-bottom: 2%;
            width: 100%;
            min-width: 300px;
            border-radius: 8px;
        }

        /* Code Styling */
        #code {
            width: 150px;
        }

        /* Button Styling */
        #button_grid {
            display: grid;
            padding: 6%;
            row-gap: 10px;
            grid-template-rows: repeat(4, 1fr);
        }

        #button_grid div {
            padding: 3%;
            width: fit-content !important;
            border-radius: 10px;
            transition: background-color 500ms, color 450ms;
            transition-delay: 50ms;
            display: flex;
            overflow-y: hidden;
            cursor: pointer;
        }

        #buttons i {
            font-size: 25px;
            line-height: 25px;
            margin: auto;
        }

        #buttons svg {
            margin: auto;
            width: 25px;
            height: 25px;
        }

        #button_grid div:hover {
            color: whitesmoke;
            background-color: rgba(0, 0, 0, .7);
        }

        #button_grid div:hover > .button-desc {
            width: 160px;
        }

        .button-desc {
            margin-left: 5%;
            height: 25px;
            line-height: 20px;
            font-size: 20px;
            width: 0;
            overflow-x: hidden;
            white-space: nowrap;
            color: whitesmoke;
            transition: width 400ms;
        }

        /* Menu Styles!! */

        #side_menu {
            position: absolute;
            left: -1000px;
            transition: 500ms ease-in-out;
            background-color: rgba(0, 0, 0, .5);
            height: 100vh;
            width: 35vw;
        }

        #close-button {
            font-size: xx-large;
            position: absolute;
            right: 20px;
            top: 1%;
            color: whitesmoke;
            cursor: pointer;
        }

        #screen {
            height: 100vh;
            width: 100vw;
            position: absolute;
            left: -100%;
            transition: 500ms ease-in-out;
            background-color: rgba(0, 0, 0, .3);
        }

        .c-menus {
            display: none;
            margin-left: 13%;
            padding-top: 3%;
        }

        /* Request Menu Styles */
        .card-title {
            margin-top: 2%;
        }

        #search_results {
            color: whitesmoke;
            max-height: 80vh;
            overflow-y: auto;
            margin: 1% 0;
        }

        #search_results::-webkit-scrollbar {
            background-color: transparent;
            width: 5px;
        }

        #search_results::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, .3);
            border-radius: 2px;
        }

        .search_result, #result_header {
            display: grid;
            grid-template-columns: 2fr 1.5fr;
            padding: .8% 1.1%;
        }

        .search_result:nth-child(odd) {
            background: rgba(255, 255, 255, .05);
        }

        .search_result:nth-child(even) {
            background: rgba(0, 0, 0, .05);
        }

        .search_result:hover {
            background: rgba(0, 0, 0, .15);
        }

        .clickable:hover {
            cursor: pointer;
        }

        .more_info {
            grid-column: span 2;
            display: grid;
            grid-template-columns: auto 1fr 1fr;
        }

        .explicit {
            padding: 1% 2%;
            border-radius: 5px;
            background-color: rgba(60, 60, 60, .5);
            color: white;
            display: block;
            width: fit-content;
        }

        /* Queue Menu Styling */
        #queue_gen {
            color: whitesmoke;
        }

        .card-grid {
            display: grid;
            grid-template-columns: 1fr .8fr .4fr;
            column-gap: 5px;
        }

        .c-card {
            padding: .5% 2%;
            border: none;
        }

        .card {
            background-color: rgba(255, 255, 255, .3);
        }

        #table_body {
            height: 63vh !important;
            overflow-y: auto;
        }
    </style>

</head>
<body>
<main id="app">
    <noscript>
        <h1>Please Enable JavaScript to Continue.</h1>
    </noscript>
    <!-- Hidden Side Menu for Controls -->
    <div id="screen"></div>
    <div id="side_menu">
        <span id="close-button">&times;</span>
        <div id="request" class="c-menus">
            <div class="pr-4">
                <h2 class="text-white">Request a Song</h2>
                <form class="mt-3 row" action="javascript:searchSongs()">
                    <div class="form-group col-md-12">
                        <label class="sr-only" for="search_key">Search</label>
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-sm" name="search_term"
                                   placeholder="Search Spotify..." type="text"
                                   id="search_key">
                            <div class="input-group-append">
                                <button class="btn btn-green" type="button"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="search_results"></div>
            </div>
        </div>
        <div id="history" class="c-menus">
            <h2 class="text-white">Recently Played</h2>
            <div id="history_gen"></div>
        </div>
        <div id="queue" class="c-menus">
            <h2 class="text-white">Queue</h2>
            <hr class="bg-white mr-5">
            <div id="queue_gen">
                @foreach($queue as $song)
                    <div class="mt-3"><h6>{{$song->name}}</h6><span>{{join(', ', array_column($song->artists, 'name'))}}</span></div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Main container for everything you see on initial load -->
    <div id="main_content">
        @if(!$error)
            <div id="buttons">
                <div id="button_grid">
                    <div title="Powered by Spotify"><i class="fab fa-spotify"></i></div>
                    <div class="custom-button" id="request_btn">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-music-note-beamed"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13c0-1.104 1.12-2 2.5-2s2.5.896 2.5 2zm9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2z"/>
                            <path fill-rule="evenodd" d="M14 11V2h1v9h-1zM6 3v10H5V3h1z"/>
                            <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4V2.905z"/>
                        </svg>
                        <span class="button-desc">Request a Song!</span>
                    </div>
                    <div class="custom-button" id="history_btn">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock-history"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                            <path fill-rule="evenodd"
                                  d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        <span class="button-desc">Recently Played</span>
                    </div>
                    <div class="custom-button" id="queue_btn">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-music-note-list"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2z"/>
                            <path fill-rule="evenodd" d="M12 3v10h-1V3h1z"/>
                            <path d="M11 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 16 2.22V4l-5 1V2.82z"/>
                            <path fill-rule="evenodd"
                                  d="M0 11.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 7H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 3H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        <span class="button-desc">Queue</span>
                    </div>
                </div>
            </div>
            <div id="now_playing_container">
                <div id="now_playing">
                    @if(isset($now_playing_data))
                        <img alt="cover" class="shadow" src="{{$now_playing_data->album->images[0]->url}}"
                             crossorigin="anonymous"
                             id="now_playing_img">
                        <div class="card-title">
                            <h2 id="now_playing_title">{{$now_playing->name}}</h2>
                        </div>
                        <p id="now_playing_artists">
                            @php
                                $artists = array_column($now_playing_data->artists, 'name');
                                $artists = implode(', ', $artists);
                                echo $artists;
                            @endphp
                        </p>
                    @else
                        <div class="card-body m-auto"><h4>Nothing Playing Right Now</h4></div>
                    @endif
                </div>
            </div>
            <div id="code" class="d-flex w-100">
                <div class="mt-auto ml-auto pr-4 pb-3">
                    <img src="{{asset('/img/sampleSpotifyCode.jpg')}}" alt="Spotify Code" id="code"
                         style="border-radius: 5px">
                </div>
            </div>
        @endif
    </div>
</main>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    const colorThief = new ColorThief();
    let results = {}, nowPlaying = {!! $now_playing->data !!};

    setColorScheme();

    // Pusher Setup
    let pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
        cluster: '{{env('PUSHER_APP_CLUSTER')}}'
    });
    let channel = pusher.subscribe('quinns-music');
    channel.bind('new-song', data => {
        updateNowPlaying(data);
        if (data.wasQueued) $('#queue_gen div:first').remove();
    });
    channel.bind('queue-updated', data => updateQueue(data));

    $(document).ready(() => {
        $('#recently_played_collapse').collapse('show');
        $('.custom-button').click(function () {
            openMenu(this.id);
        });
        $('#close-button').click(closeMenu);
        $('#screen').click(closeMenu);
    });

    function closeMenu() {
        $('.c-menus').hide('slow');
        $('#side_menu')[0].style.left = '-1000px';
        $('#screen')[0].style.left = '-100%';
    }

    function openMenu(option) {
        $('#' + option.split('_')[0]).show();
        $('#side_menu')[0].style.left = 0;
        $('#screen')[0].style.left = 0;
    }

    function updateNowPlaying(data) {
        let song_data = JSON.parse(data.song.data);

        console.log(song_data);

        let artists = [];
        song_data.artists.forEach(val => artists.push(val.name));

        document.getElementById('now_playing_artists').innerText = artists.join(', ');
        document.getElementById('now_playing_title').innerText = song_data.name;
        document.getElementById('now_playing_img').src = song_data.album.images[0].url;
        setColorScheme();

        // Add the new song to the top of the list.
        $('#table_body').prepend();

        // If we are going to add one, we should also remove one...
        $('#table_body div:last').remove();

        // Lastly, update the nowPlaying variable.
        nowPlaying = JSON.parse(data.song.data);
    }

    function updateQueue(data) {
        // Add a song to the queue.
        let song_data = JSON.parse(data.song.data);
        $('#queue_gen').append(`<div class="mt-3"><h6>${song_data.name}</h6><span>${song_data.artists[0].name}</span></div>`);
    }

    const searchSongs = async () => {
        let result_element = $('#search_results');
        result_element.html('<div class="text-center w-100"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');

        // Send the request off.
        const request = await fetch(`../spotify/search_term?${$('form').serialize()}`);
        results = await request.json();

        // generate html based on response
        result_element.html('<div id="result_header"><small>Song Name</small><small>Artists</small></div>');
        if (results.tracks.items.length > 0) {
            results.tracks.items.forEach((val, i) => {
                let names = [];
                val.artists.forEach(artist => names.push(artist.name));
                result_element.append(`<div class="search_result"><span class="clickable" onclick="moreInfo(${i})">${val.name}</span>` +
                    `<span class="clickable" onclick="moreInfo(${i})">${names.join(', ')}</span><div class="collapse" id="result_collapse_${i}" data-parent="#search_results" style="grid-column: span 2"></div></div>`);
            });
        } else
            result_element.append(`<div class="search_result text-center"><div style="grid-column: span 2; margin: 1% 0">` +
                `<h6 class="mb-0">No Results Found</h6><small>Try a broader search</small></div></div>`);

    };

    const waitOnImgLoad = img => new Promise(resolve => img.addEventListener('load', resolve));

    const moreInfo = async (i) => {
        let item = results.tracks.items[i], collapse = $(`#result_collapse_${i}`);

        // If the html hasn't been added, add it and wait for the image to load.
        if (collapse.html() === '') {
            collapse.html(`<div class="more_info p-2 mt-1"><img id="result_img_${i}" src="${item.album.images[1].url}" style="width: 180px" crossorigin="anonymous" alt="album cover">` +
                `<div style="margin-left: 5%"><h6>${item.name}</h6><p>${item.artists[0].name}</p><small class="explicit" ${(item.explicit ? '' : "hidden")}>explicit</small></div>` +
                `<div><button class="btn btn-sm btn-info" onclick="addSongToQueue('${i}')">Add to Queue</button></div></div>`);
            await waitOnImgLoad(document.getElementById('result_img_' + i));
        }

        collapse.collapse('toggle');
    }

    const addSongToQueue = async (i) => {
        let item = results.tracks.items[i];
        delete item.available_markets;
        delete item.album.available_markets;
        console.log(item);
        console.log(item.uri);
        const request = await fetch(`../spotify/add_to_queue?data=${JSON.stringify(item)}`);
        if (request.status === 204 || request.status === 200) alert('Song Added Successfully!');
        else alert('Failed to add song to queue, please try again. HTTP ' + request.status);
    }

    function setColorScheme() {
        // Make sure image is finished loading
        const img = document.getElementById('now_playing_img');

        if (img.complete) {
            let colorPalette;
            colorPalette = colorThief.getPalette(img);

            document.querySelector('main').style.backgroundColor = `rgba(${colorPalette[0].join(', ')}, .5)`;
            let sum = 0;
            colorPalette[0].forEach(val => sum += val);
            console.log(sum);
            document.querySelector('main').style.color = (sum / 3.0 > 100 ? 'black' : 'white')

        } else {
            img.addEventListener('load', function () {
                setColorScheme();
            });
        }
    }
</script>
</body>
</html>
