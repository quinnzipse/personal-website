@extends('layouts.app')

@section('content')
    <div class="mb-5">
        <h5 class="mb-0 mt-3 float-right d-none" id="context">CONTEXT HERE</h5>
        <h2 class="float-left text-dark"><i class="fab fa-spotify text-spotify"></i> Spotify Controller</h2>
    </div>
    <div class="dropdown-divider"></div>
    <div id="main" class="">
        <div class="row mt-4">
            <div class="container">
                <div class="row mt-0">
                    <div class="col-12">
                        <div class="float-right mr-5">
                            <img src="https://i.scdn.co/image/8e76cca4edfc4780b4bc86062e8808534d067e52"
                                 style="width: 100%;" alt="IMAGE HERE" id="album_image">
                        </div>
                        <div class="float-left " style="max-width: 50%; width: 50%">
                            <div class="row mt-3">
                                <h2 class="font-weight-normal text-wrap ml-5" id="song_title">SONG TITLE</h2>
                            </div>
                            <div class="row">
                                <h5 class="font-weight-light float-left ml-5" id="artist_name">ARTIST</h5>
                            </div>
                            <div class="row "><span class="small ml-5" id="changing_time">TIME_CHANGING</span><span
                                        class="small">/</span><span class="small" id="total_time">TIME_TOTAL</span>
                            </div>
                            <br>
                            <div class="container-fluid">
                            <div class="float-left mt-5 ml-3">
                                <button class="btn btn-sm mr-1" onclick="prev()"><</button>
                                <button class="btn btn-sm pr-3 pl-3" onclick="toggle()">| |</button>
                                <button class="btn btn-sm ml-1" onclick="next()">></button>
                            </div>
                            <div class="float-right mt-5">
                                <button class="btn btn-sm btn-outline-success" onclick="addToPlaylist()" id="addTo">Add to Playlist
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="container">
                <h5 class="ml-1">Next Up: </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover mt-2 overflow-auto" max-width="100%">
                    @for($i=0; $i<2; $i++)
                        <tr class="pt-2 pb-2" style="max-width: 30%">
                            <td class="text-truncate" id="nextSongTitle{{$i}}">
                                NEXT SONG TITLE{{$i}}
                            </td>
                            <td class="text-truncate" id="nextSongArtist{{$i}}" style="max-width: 30%;">
                                Artist{{$i}}
                            </td>
                            <td class="text-truncate" id="nextSongAlbum{{$i}}" style="max-width: 30%;">
                                Album{{$i}}
                            </td>
                            <td class="" id="nextSongDuration{{$i}}" style="max-width: 10%;">
                                10:43
                            </td>
                        </tr>
                    @endfor
                </table>
            </div>
        </div>
    </div>
    <div class="container h-100" id="notPlaying">
        <div class="justify-content-center d-flex h-100">
            <div class="align-items-center d-flex">
                <h3 class="text-faint font-weight-light">Start playing spotify on device "{{Auth::user()->name}}'s
                    Playlist Helper"</h3>
            </div>
        </div>
    </div>
    <script src="https://sdk.scdn.co/spotify-player.js"></script>
    <script>
        let player;

        function prev(){
            player.previousTrack().then(() => {
                console.log('Set to previous track!');
            });
        }

        function next(){
            player.nextTrack().then(() => {
                console.log('Skipped to next track!');
            });
        }

        function toggle(){
            player.togglePlay().then(() => {
                console.log('Toggled playback!');
            });
        }

        $('document').ready(function () {
            console.log('{{$settings->d_playlist}}');

             getPlaylistName();
        });

        function getPlaylistName(){
            @if($settings->d_playlist)
                try {
                    fetch('https://api.spotify.com/v1/playlists/{{$settings->d_playlist}}', {
                        headers: {
                            'Authorization': 'Bearer {{$authToken}}'
                        }
                    }).then(e => e.json())
                        .then(e => {
                                $("#addTo").text('Add to "' + e.name + '"');
                            }
                        );
                } catch (error) {
                    $("#addTo").text("Add to Playlist");
                    console.error('Error:', error);
                }
            @endif
        }

        function addToPlaylist() {
            player.getCurrentState().then(state => {
                const url = 'https://api.spotify.com/v1/playlists/{{$settings->d_playlist}}/tracks';
                const data = {
                    "uris": [
                        state.track_window.current_track.uri
                    ]
                };

                try {
                    fetch(url, {
                        method: 'POST', // or 'PUT'
                        body: JSON.stringify(data), // data can be `string` or {object}!
                        headers: {
                            'Authorization': 'Bearer {{$authToken}}',
                            'Content-Type': 'application/json'
                        }
                    }).then(e => e.json())
                        .then(e => {
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
                $('#main, #context').removeClass('d-none');
                $('#notPlaying').addClass('d-none');
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

                $('#artist_name').text(getArtistNames(state.track_window.current_track.artists));
                $('#song_title').text(state.track_window.current_track.name);
                $('#album_image').prop('src', state.track_window.current_track.album.images[0].url);
                if (state.context.metadata.context_description) {
                    $('#context').text(state.context.metadata.context_description);
                } else {
                    $('#context').text("Now Playing: ");
                }

                if (state.position === 0) {
                    oldpos = state.position;
                    clearInterval(timerInter);
                    timerInter = null;
                    // debugger;
                }

                if (state.paused) {
                    clearInterval(timerInter);
                    timerInter = null;
                } else if ((id !== state.track_window.current_track.id || timerInter == null && state.duration - state.position > 1000) || Math.abs(state.position - oldpos) > 2000) {
                    console.log("Hello I am going to set one");
                    // debugger;
                    id = state.track_window.current_track.id;
                    if (timerInter) {
                        clearInterval(timerInter);
                        timerInter = null;
                    }
                    timer(new Date(state.duration), new Date().setMilliseconds(-state.position));
                    oldpos = state.position;
                }
            });

            function updateNext(nextTracks) {
                console.log(nextTracks);
                for (i = 0; i < 2; i++) {
                    $('#nextSongAlbum' + i).text(nextTracks[i].album.name.substring(0, 30));
                    $('#nextSongArtist' + i).text(getArtistNames(nextTracks[i].artists).substring(0, 25));
                    $('#nextSongDuration' + i).text(getMinSecFormat(new Date(nextTracks[i].duration_ms)));
                    $('#nextSongTitle' + i).text(nextTracks[i].name.substring(0, 30));
                }
            }

            function getArtistNames(artists) {
                let names = '';
                for (x = 0; x < artists.length; x++) {
                    if (x > 0) names += ", ";
                    names += artists[x].name;
                }
                return names;
            }

            function getMinSecFormat(time) {
                let timeMin = time.getMinutes();
                let timeSec = time.getSeconds();
                if (timeSec < 10) timeSec = "0" + timeSec;
                return timeMin + ":" + timeSec;
            }

            function timer(totalTime, starting) {
                let endingTime = getMinSecFormat(totalTime);
                $('#total_time').text(endingTime);

                timerInter = setInterval(function () {
                    document.getElementById("changing_time").innerHTML = getMinSecFormat(new Date(new Date() - starting));
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