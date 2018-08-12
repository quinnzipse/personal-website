@extends('layouts.app')

@section('content')
    <div class="mb-5">
        <h2 class="float-left text-dark">Integration Dashboard</h2>
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

        @elseif($loggedInSpotify)
            @if($song_details != null)
                @php
                    $song_name = $song_details->item->name;
                    $artist = $song_details->item->artists[0]->name;
                @endphp
                <div class="col-5">
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
        @else

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