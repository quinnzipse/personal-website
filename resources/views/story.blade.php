@extends('layouts.main')

@section('content')
    @if($loggedInSpotify) <!-- This will hit when ONLY Spotify is connected -->
    @if(isset($song_details))
        @php
            if(isset($song_details)){
                $song_name = $song_details->item->name;
                $artist = $song_details->item->artists[0]->name;
                $timeout = $song_details->item->duration_ms - $song_details->progress_ms; //Took out an offset because it was no longer needed
                $playing = $song_details->is_playing;
            }
        @endphp
        <script type="text/javascript">
            setTimeout(function () {
                location.reload();
            }, {{$timeout}});
        </script>
        <div class="container rounded-pill">
            <div class="mt-5 row">
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
@endsection