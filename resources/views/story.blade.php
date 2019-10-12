@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="card border-cardColor">
                    <div class="card-header bg-cardColor text-white-50 border-cardColor">
                        <h5 class="mb-0" id="context">CONTEXT HERE</h5>
                    </div>
                    <div class="card-body bg-dark text-white">
                        <div class="row mt-3">
                            <div class="col-lg-8 col-12 col-sm-10">
                                <div class="col-12">
                                    <div class="container">
                                        <div class=" d-flex justify-content-center">
                                            <img src="https://i.scdn.co/image/8e76cca4edfc4780b4bc86062e8808534d067e52" style="height: 70%; width: 70%;" alt="IMAGE HERE" id="album_image">
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
                                <div class="row "><span class="small" id="changing_time">TIME_CHANGING</span><span class="small">/</span><span class="small" id="total_time">TIME_TOTAL</span></div>
                                <br>
                                <div class="row">
                                    <button class="btn btn-outline-quinn mt-5" onclick="addToPlaylist()">Add to Playlist</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-md-1 col-md-10">
                <h5 class="text-quinn">Next Up: </h5>
            </div>
        </div>
        @for($i=0; $i<2; $i++)
            <div class="row mt-2" >
                <div class="offset-md-1 col-md-10">
                    <div class="card bg-dark border-dark">
                        <div class="card-body pt-2 pb-2 text-white-50" style="font-size: 90%" id="next{{$i}}">
                            <div class="row">
                                <div class="col-3 offset-1 text-truncate" id="nextSongTitle{{$i}}">
                                    NEXT SONG TITLE{{$i}}
                                </div>
                                <div class="col-3 text-truncate" id="nextSongArtist{{$i}}">
                                    Artist{{$i}}
                                </div>
                                <div class="col-3 text-truncate"  id="nextSongAlbum{{$i}}">
                                    Album{{$i}}
                                </div>
                                <div class="col-1"  id="nextSongDuration{{$i}}">
                                    10:43
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    <script src="https://sdk.scdn.co/spotify-player.js"></script>
    <script>
        let player;

        $('document').ready(function(){
            console.log('{{$settings->d_playlist}}');
        });

        function addToPlaylist(){
            player.getCurrentState().then(state =>{
                    const url = 'https://api.spotify.com/v1/playlists/{{$settings->d_playlist}}/tracks';
                    const data = {"uris": [
                        state.track_window.current_track.uri
                        ]};

                    try {
                        fetch(url, {
                            method: 'POST', // or 'PUT'
                            body: JSON.stringify(data), // data can be `string` or {object}!
                            headers: {
                                'Authorization': 'Bearer {{$authToken}}',
                                'Content-Type': 'application/json'
                            }
                        }).then(e => e.json())
                            .then( e => {
                                console.log('Success:', e);
                                }
                            );
                    } catch (error) {
                        console.error('Error:', error);
                    }
            });
        }

        window.onSpotifyWebPlaybackSDKReady = () => {
            const token = '{{$authToken}}';
            player = new Spotify.Player({
                name: 'quinnzipse.dev',
                getOAuthToken: cb => {
                    cb(token);
                },
                volume: .1
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

            var timerInter = null;
            var oldpos = null;
            var id = null;

            // Playback status updates
            player.addListener('player_state_changed', state => {
                // console.log(state);
                // console.log(state.track_window.current_track.name); //this gets the name of the current song playing
                // console.log("context_description: " + state.context.metadata.context_description);
                // console.log("position: " + state.position);
                // console.log("duration of the song: " + state.duration);
                // console.log("remaining in ms: " + (state.duration - state.position));
                // console.log(state.paused);
                // console.log("next tracks: " + state.track_window.next_tracks);
                // console.log("Artist: " + state.track_window.current_track.artists[0].name);
                // console.log("Album: " + state.track_window.current_track.album.name);
                // console.log("Album Art: " + state.track_window.current_track.album.images[0].url);
                // console.log("Track ID: " + state.track_window.current_track.id);

                updateNext(state.track_window.next_tracks);

                $('#artist_name').text( getArtistNames( state.track_window.current_track.artists ) );
                $('#song_title').text(state.track_window.current_track.name);
                $('#album_image').prop('src', state.track_window.current_track.album.images[0].url);
                if(state.context.metadata.context_description){
                    $('#context').text(state.context.metadata.context_description);
                } else {
                    $('#context').text("Now Playing: ");
                }

                if(state.position === 0){
                    oldpos = state.position;
                    clearInterval(timerInter);
                    timerInter = null;
                    // debugger;
                }

                if(state.paused){
                    clearInterval(timerInter);
                    timerInter = null;
                } else if((id !== state.track_window.current_track.id || timerInter == null && state.duration - state.position > 1000) || Math.abs(state.position - oldpos) > 2000 ){
                    console.log("Hello I am going to set one");
                    // debugger;
                    id = state.track_window.current_track.id;
                    if(timerInter) {
                        clearInterval(timerInter);
                        timerInter = null;
                    }
                        timer(new Date(state.duration), new Date().setMilliseconds(-state.position));
                        oldpos = state.position;
                }
            });

            function updateNext(nextTracks){
                console.log(nextTracks);
                for(i=0; i<2; i++) {
                    $('#nextSongAlbum' + i).text(nextTracks[i].album.name);
                    $('#nextSongArtist' + i).text(getArtistNames(nextTracks[i].artists));
                    $('#nextSongDuration' + i).text(getMinSecFormat(new Date(nextTracks[i].duration_ms)));
                    $('#nextSongTitle' + i).text(nextTracks[i].name);
                }
            }

            function getArtistNames(artists){
                let names = '';
                for(x=0; x<artists.length; x++){
                    if(x>0) names += ", ";
                    names += artists[x].name;
                }
                return names;
            }

            function getMinSecFormat(time)
            {
                let timeMin = time.getMinutes();
                let timeSec = time.getSeconds();
                if(timeSec < 10) timeSec = "0" + timeSec;
                return timeMin + ":" + timeSec;
            }

            function timer(totalTime, starting){
                let endingTime = getMinSecFormat(totalTime);
                $('#total_time').text(endingTime);

                 timerInter = setInterval(function(){
                     document.getElementById("changing_time").innerHTML =  getMinSecFormat( new Date( new Date() - starting ) );
                }, 1000);
            }

            // Ready
            player.addListener('ready', ({device_id}) => {
                console.log('Ready with Device ID', device_id);
            });

            // Not Ready
            player.addListener('not_ready', ({device_id}) => {
                console.log('Device ID has gone offline', device_id);
            });

            player.setName("{{Auth::user()->name}}'s Playlist Helper");

            // Connect to the player!
            player.connect();
        };
    </script>

@endsection