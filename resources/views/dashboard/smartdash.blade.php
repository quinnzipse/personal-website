@extends('layouts.app')

@section('content')
    <div class="mb-5">
        <h3 class="float-left text-dark mt-1">Integration Dashboard</h3>
        <div class="float-right mt-3">
            <a href="{{route('spotify.musicControl')}}"><i
                        class="fab fa-spotify {{$loggedInSpotify == true ? 'text-spotify' : 'text-faint'}}"
                        data-toggle="tooltip" data-placement="bottom"
                        title="Spotify - {{$loggedInSpotify == true ? 'Connected' : 'Disconnected'}}"
                        id="spotify_connected" style="font-size: 1.25em"> </i></a>
            <a href="{{route('lightControl')}}"><i class="far fa-lightbulb text-faint" onclick="" id="hue_connected"
                                                   data-toggle="tooltip" data-placement="bottom"
                                                   title="Hue - {{$loggedInHue == true ? 'Connected' : 'Disconnected'}}"
                                                   style="font-size: 1.25em"> </i></a>
        </div>
    </div>
    <div class="dropdown-divider"></div>
    @if($loggedInSpotify || $loggedInHue)
        @if($loggedInSpotify && $loggedInHue)

        @elseif($loggedInSpotify) <!-- This will hit when ONLY Spotify is connected -->
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
            <div class="col-lg-5 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="font-weight-normal mb-0">Currently Playing:</h5>
                    </div>
                    <div class="col-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="container">
                                    <div class=" d-flex justify-content-center">
                                        <img src="{{$image_url}}" style="height: 110%; width: 110%;">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 d-flex justify-content-center">
                                @if(strlen($song_name) > 17)
                                    <h4 class="font-weight-normal truncate">{{$song_name}}</h4>
                                @else
                                    <h2 class="font-weight-normal">{{$song_name}}</h2>
                                @endif
                            </div>
                            <div class="row d-flex justify-content-center">
                                <h5 class="font-weight-light float-left">{{$artist}}</h5>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{route('spotify.musicControl.prev')}}" class="btn text-secondary"><i class="fas fa-chevron-left mt-2"></i></a>
                                @if($playing)
                                    <a href="{{route('spotify.musicControl.pause')}}" class="btn text-primary"><i class="far fa-pause-circle fa-2x"></i></a>
                                @else
                                    <a href="{{route('spotify.musicControl.play')}}" class="btn text-primary"><i class="far fa-play-circle fa-2x"></i></a>
                                @endif
                                <a href="{{route('spotify.musicControl.next')}}" class="btn text-secondary"><i class="fas fa-chevron-right mt-2"></i></a>
                            </div>
                        </div>
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
        @else <!-- This will hit when ONLY hue integration is connected. -->

        @endif
    @else
        <div class="container h-100">
            <div class="justify-content-center d-flex h-100">
                <div class="align-items-center d-flex">
                    <h3 class="text-faint font-weight-light">Disconnected</h3>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('footer')
    <script type="text/javascript">
        function next(){

            refresh();
        }
        function prev(){

            refresh();
        }
        function pause(){

            refresh();
        }
        function play(){

            refresh();
        }
        function refresh(){
            location.reload();
        }
    </script>
@endsection