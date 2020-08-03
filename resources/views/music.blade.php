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

</head>
<body>
<main id="app">
    <noscript>
        <h1>Please Enable JavaScript to Continue.</h1>
    </noscript>
    <div id="main_content">
        @if(!$error)
            @if(isset($now_playing))
                <div id="now_playing_container">
                    <div id="now_playing">
                        <img alt="cover" src="{{$now_playing->item->album->images[0]->url}}"
                             style="border-radius: 5px;" crossorigin="anonymous" id="now_playing_img">
                        <div class="card-title">
                            <h2 id="now_playing_title">{{$now_playing->item->name}}</h2>
                        </div>
                        <p id="now_playing_artists">
                            @php
                                $artists = array_column($now_playing->item->artists, 'name');
                                $artists = implode(', ', $artists);
                                echo $artists;
                            @endphp
                        </p>
                    </div>
                </div>
            @else
                <div class="card" id="now_playing">
                    <div class="card-body m-auto"><h4>Nothing Playing Right Now</h4></div>
                </div>
            @endif
            <div id="extras">
                <div class="card" id="song_history">
                    <div class="card-header" id="recently_played_title">
                        <h6 style="margin-bottom: 0">
                            <button class="btn btn-link btn-sm" data-toggle="collapse"
                                    data-target="#recently_played_collapse">Recently Played
                            </button>
                        </h6>
                    </div>
                    <div class="collapse" id="recently_played_collapse" data-parent="#extras"
                         aria-labelledby="recently_played_title">
                        <div class="card-body" style="padding: 0" id="table-container">
                            <div class="card c-card" style="margin-bottom: 0">
                                <div class="card-grid" style="padding-bottom: 0">
                                    <div id="title_header"><small>Title</small></div>
                                    <div id="artists_header"><small>Artists</small></div>
                                    <div id="played_at_header" class="text-right"><small>Listened To</small></div>
                                </div>
                            </div>
                            <div id="table_body">
                                @foreach($recently_played->items as $item)
                                    <div class="card c-card">
                                        <div class="card-grid">
                                            <h6 style="margin-bottom: 0"
                                                class="title text-truncate">{{$item->track->name}}</h6>
                                            <div class="artist text-truncate">
                                                @php
                                                    $artists = array_column($item->track->artists, 'name');
                                                    $artists = implode(', ', $artists);
                                                    echo $artists;
                                                @endphp
                                            </div>
                                            <div class="played_at text-right">
                                                @php
                                                    $time = new Carbon(substr($item->played_at, 0, strpos($item->played_at, 'T')) . ' ' . substr($item->played_at, strpos($item->played_at, 'T')+1, 8));
                                                    echo $time->diffForHumans();
                                                @endphp
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="song_request_title">
                        <h6 style="margin-bottom: 0">
                            <button class="btn btn-link btn-sm" data-toggle="collapse"
                                    data-target="#song_request_collapse">Request a Song
                            </button>
                        </h6>
                    </div>
                    <div class="collapse" id="song_request_collapse" data-parent="#extras"
                         aria-labelledby="song_request_title">
                        <div class="card-body">
                            <div id="request_button_container">
                                <form action="javascript:searchSongs()">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-lg-10 col-md-8 col-sm-7">
                                            <div class="form-group">
                                                <label for="search_term" class="sr-only">Search</label>
                                                <input class="form-control form-control-sm" type="text" id="search_term"
                                                       name="search_term" placeholder="Search anything on Spotify!"
                                                       required minlength="2" maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-sm btn-darkerInfo">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <div id="search_results">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="queue_title">
                        <h6 style="margin-bottom: 0">
                            <button class="btn btn-link btn-sm" data-toggle="collapse" data-target="#queue_collapse">
                                Queue
                            </button>
                        </h6>
                    </div>
                    <div class="collapse" id="queue_collapse" data-parent="#extras" aria-labelledby="queue_title">
                        <div class="card-body" id="queue_gen">

                        </div>
                    </div>
                </div>
                @else
                    <div class="card" style="grid-column: 1 / span 2 !important;">
                        <div class="card-body">
                            <div class="card-title"><h4>Error</h4></div>
                            <p class="text-dark">{{$recently_played}}</p>
                        </div>
                    </div>
                @endif
            </div>
    </div>
</main>
<script>
    let queue = [], results = {};

    const colorThief = new ColorThief();
    const img = document.querySelector('img');
    let colorPalette = [];

    // Make sure image is finished loading
    if (img.complete) {
        colorPalette = colorThief.getPalette(img);

        document.querySelector('main').style.background = `rgba(${colorPalette[3].join(', ')}, .6)`;
        document.querySelector('.card').style.background = `rgba(${colorPalette[2].join(', ')}, .6)`;
        let sum = 0;
        colorPalette[0].forEach(val => sum += val);
        document.querySelector('main').style.color = (sum / 3.0 > 100 ? 'black' : 'white')

    } else {
        img.addEventListener('load', function () {
            console.log(colorThief.getColor(img));
        });
    }

    $(document).ready(() => {
        $('#recently_played_collapse').collapse('show');
        setTimeout(getNowPlaying, 30000);
    });

    const getNowPlaying = async () => {
        const request = await fetch('../spotify/get_currently_playing');
        const response = await request.json();

        let artists = [];
        response.item.artists.forEach(val => artists.push(val.name));

        document.getElementById('now_playing_artists').innerText = artists.join(', ');
        document.getElementById('now_playing_title').innerText = response.item.name;
        document.getElementById('now_playing_img').src = response.item.album.images[0].url;
        setTimeout(getNowPlaying, 45000);
    }

    const updateQueue = () => {
        let html = '';
        queue.forEach((val) => html += `<div class="mt-3"><h6>${val.name}</h6><span>${val.artists[0].name}</span></div>`);
        $('#queue_gen').html(html);
    };

    const getQueue = async () => {
        const request = await fetch();
        const response = request.json();

        if (!response.ok) console.warn('Error while fetching queue');

        console.log(response);

        response.forEach(val => {
            ``

        });
    };

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
        const request = await fetch(`../spotify/add_to_queue?uri=${item.uri}`);
        const response = request.status;
        if(response === 200) {
            alert('Song Added Successfully! Queue Position: ' + (queue.length + 1));
            queue.push(item);
            updateQueue();
        }
        else alert('Failed to add song to queue, please try again.');
    }
</script>
<style>
    #main_content {
        padding: 2% 50px;
        display: grid;
        grid-template-columns: .7fr 1fr;
        column-gap: 50px;
        height: 100vh !important;
    }

    #now_playing_container {
        display: flex;
        padding: 0 2%;
    }

    #now_playing img {
        width: 100%;
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

    .card-title {
        margin-top: 2%;
    }

    #search_results {
        max-height: 60vh;
        overflow-y: auto;
        margin: 1% 0;
    }

    .search_result, #result_header {
        display: grid;
        grid-template-columns: 2fr 1.5fr;
        padding: .8% 1.1%;
    }

    #song_request_collapse {
        background: rgba(255, 255, 255, .1);
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
</style>
</body>
</html>
