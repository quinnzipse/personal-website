@extends('layouts.main')

@section('content')
        <script type="text/javascript">
            setTimeout(function () {
                $.get('../spot-data', function (data) {

                });
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
@endsection