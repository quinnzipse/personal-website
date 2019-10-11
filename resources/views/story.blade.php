@extends('layouts.main')

@section('content')
    {{--        <script type="text/javascript">--}}
    {{--            setTimeout(function () {--}}
    {{--                $.get('{{route('something')}}', function (data) {--}}

    {{--                });--}}
    {{--            }, {{$timeout}});--}}
    {{--        </script>--}}
    {{--    <script>--}}
    {{--        console.log("here's what we got");--}}
    {{--        console.log({!!json_encode($publicUsers)!!});--}}
    {{--        console.log({!!json_encode($quinn)!!});--}}
    {{--    </script>--}}
    {{--    @if(isset($quinn))--}}
    {{--        <div class="h-100 d-flex align-items-center justify-content-center" style="opacity: 75% !important;">--}}
    {{--            <div class="jumbotron pt-4 pb-4">--}}
    {{--                <div class="d-inline">--}}
    {{--                    <span class="display-4 text-left">Now Playing: </span>--}}
    {{--                </div>--}}
    {{--                <hr>--}}
    {{--                <div class="lead">qzipse-us</div>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-6 align-self-center">--}}
    {{--                        <div class="flex-row">--}}
    {{--                            @if(strlen($quinn->song) > 17)--}}
    {{--                                <h2 class="font-weight-normal truncate">{{$quinn->song}}</h2>--}}
    {{--                            @else--}}
    {{--                                <h1 class="font-weight-normal">{{$quinn->song}}</h1>--}}
    {{--                            @endif--}}
    {{--                        </div>--}}
    {{--                        <div class="flex-row">--}}
    {{--                            <h4 class="font-weight-light float-left">{{$quinn->artist}}</h4>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-6">--}}
    {{--                        <div class="container">--}}
    {{--                            <div class=" d-flex justify-content-center">--}}
    {{--                               <img src="{{$quinn->image_url}}" style="height: 80%; width: 80%;">--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    @php
        //if(isset($quinn)){

            //$strArray = count_chars($quinn->artist,1);
            //$count = $strArray[58];
        //}
    @endphp
    {{--            <div class="h-100 w-100 container" style="overflow: hidden;">--}}
    {{--                <div class="row d-flex align-items-center justify-content-center mt-7">--}}
    {{--                    <div class="col-3 pr-0">--}}
    {{--                        <div class="container d-flex justify-content-end pr-0 mr-0">--}}
    {{--                            <a href="{{$quinn->song_uri}}" style="width: 100%; height: 100%;"--}}
    {{--                               class="d-flex justify-content-end" target="_blank">--}}
    {{--                                <img src="{{$quinn->image_url}}" class="hover-img"--}}
    {{--                                     style="height: 75%; width: 75%; opacity: .35;">--}}
    {{--                            </a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-4 p-0">--}}
    {{--                        <div class=" d-flex justify-content-center">--}}
    {{--                            <a href="{{$quinn->song_uri}}" class="d-flex justify-content-center"--}}
    {{--                               style="height: 100%; width: 100%;" target="_blank">--}}
    {{--                                <img src="{{$quinn->image_url}}" class="hover-main-img" style="height: 98%; width: 98%;">--}}
    {{--                            </a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-3 pl-0">--}}
    {{--                        <div class="container d-flex justify-content-start pl-0 ml-0">--}}
    {{--                            <a href="{{$quinn->song_uri}}" style="width: 100%; height: 100%;"--}}
    {{--                               class="d-flex justify-content-start" target="_blank">--}}
    {{--                                <img src="{{$quinn->image_url}}" class="hover-img"--}}
    {{--                                     style="height: 75%; width: 75%; opacity: .35;">--}}
    {{--                            </a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="row d-flex align-items-center justify-content-center mt-4">--}}
    {{--                    <div class="col-6 d-flex justify-content-center">--}}
    {{--                        @if(strlen($quinn->song) > 17)--}}
    {{--                            <h2 class="font-weight-normal truncate text-white">{{$quinn->song}}</h2>--}}
    {{--                        @else--}}
    {{--                            <h1 class="font-weight-normal text-white">{{$quinn->song}}</h1>--}}
    {{--                        @endif--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="row d-flex align-items-center justify-content-center mt-1">--}}
    {{--                    <div class="flex-row">--}}
    {{--                        <h4 class="font-weight-light text-faint">{{$quinn->artist}}</h4>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        @endif--}}
    {{--        @foreach($publicUsers as $user)--}}
    {{--            <div class="container mt-5">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-lg-2"></div>--}}
    {{--                    <div class="col-lg-8">--}}
    {{--                        <div class="card border-success">--}}
    {{--                            <div class="card-body text-spotify">--}}
    {{--                                <div class="row">--}}
    {{--                                    <div class="col-lg-6 col-8 col-sm-7">--}}
    {{--                                        <div class="col-12">--}}
    {{--                                            <div class="container">--}}
    {{--                                                <div class=" d-flex justify-content-center">--}}
    {{--                                                    <img src="{{$user->image_url}}" style="height: 75%; width: 75%;">--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="col-lg-4 col-5">--}}
    {{--                                        <div class="row mt-3">--}}
    {{--                                            @if(strlen($user->song) > 17)--}}
    {{--                                                <h4 class="font-weight-normal truncate">{{$user->song}}</h4>--}}
    {{--                                            @else--}}
    {{--                                                <h2 class="font-weight-normal">{{$user->song}}</h2>--}}
    {{--                                            @endif--}}
    {{--                                        </div>--}}
    {{--                                        <div class="row">--}}
    {{--                                            <h5 class="font-we--}}
    {{--                                            ight-light float-left">{{$user->artist}}</h5>--}}
    {{--                                        </div>--}}
    {{--                                        <div class="row">--}}
    {{--                                            <div class="hp_slide">--}}
    {{--                                                <div class="hp_range"></div>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--    @endforeach--}}

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card border-success">
                    <div class="card-body bg-dark text-spotify">
                        <div class="row">
                            <div class="col-lg-6 col-8 col-sm-7">
                                <div class="col-12">
                                    <div class="container">
                                        <div class=" d-flex justify-content-center">
                                            <img src="" style="height: 75%; width: 75%;" alt="IMAGE HERE" id="album_image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-5">
                                <div class="row mt-3">
                                        <h2 class="font-weight-normal" id="song_title">SONG TITLE</h2>
                                </div>
                                <div class="row">
                                    <h5 class="font-we
                                                    ight-light float-left" id="artist_name">ARTIST</h5>
                                </div>
                                <div class="row">
                                    <div class="hp_slide">
                                        <div class="hp_range"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://sdk.scdn.co/spotify-player.js"></script>
    <script>
        window.onSpotifyWebPlaybackSDKReady = () => {
            const token = '{{$authToken}}';
            const player = new Spotify.Player({
                name: 'quinnzipse.dev',
                getOAuthToken: cb => {
                    cb(token);
                }
            });

            // Error handling
            player.addListener('initialization_error', ({message}) => {
                console.error(message);
            });
            player.addListener('authentication_error', ({message}) => {
                console.error(message);
            });
            player.addListener('account_error', ({message}) => {
                console.error(message);
            });
            player.addListener('playback_error', ({message}) => {
                console.error(message);
            });

            // Playback status updates
            player.addListener('player_state_changed', state => {
                console.log(state);
                console.log(state.track_window.current_track.name); //this gets the name of the current song playing
                console.log("context_description: " + state.context.metadata.context_description);
                console.log("position: " + state.position);
                console.log("duration of the song: " + state.duration);
                console.log("remaining in ms: " + (state.duration - state.position));
                console.log(state.paused);
                console.log("next tracks: " + state.track_window.next_tracks);
                console.log("Artist: " + state.track_window.current_track.artists[0].name);
                console.log("Album: " + state.track_window.current_track.album.name);
                console.log("Album Art: " + state.track_window.current_track.album.images[0].url);
                $('#artist_name').html(state.track_window.current_track.artists[0].name);
                $('#song_title').text(state.track_window.current_track.name);
                $('#album_image').prop('src', state.track_window.current_track.album.images[0].url);
            });

            // Ready
            player.addListener('ready', ({device_id}) => {
                console.log('Ready with Device ID', device_id);
            });

            // Not Ready
            player.addListener('not_ready', ({device_id}) => {
                console.log('Device ID has gone offline', device_id);
            });

            // Connect to the player!
            player.connect();
        };
    </script>

@endsection