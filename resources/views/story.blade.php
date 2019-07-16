@extends('layouts.main')

@section('content')
{{--        <script type="text/javascript">--}}
{{--            setTimeout(function () {--}}
{{--                $.get('{{route('something')}}', function (data) {--}}

{{--                });--}}
{{--            }, {{$timeout}});--}}
{{--        </script>--}}
            <script>
                console.log("here's what we got");
                console.log({!!json_encode($publicUsers)!!});
                console.log({!!json_encode($quinn)!!});
            </script>
    @if(isset($quinn))
        <div class="container mt-5 ">
            <div class="row">
                <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card border-success">
                    <div class="card-body text-spotify">
                        <div class="row">
                            <div class="col-lg-6 col-8 col-sm-7">
                                <div class="col-12">
                                    <div class="container">
                                        <div class=" d-flex justify-content-center">
                                            <img src="{{$quinn->image_url}}" style="height: 75%; width: 75%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-5">
                                <div class="row mt-3">
                                    @if(strlen($quinn->song) > 17)
                                        <h4 class="font-weight-normal truncate">{{$quinn->song}}</h4>
                                    @else
                                        <h2 class="font-weight-normal">{{$quinn->song}}</h2>
                                    @endif
                                </div>
                                <div class="row">
                                    <h5 class="font-weight-light float-left">{{$quinn->artist}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @endif
    @foreach($publicUsers as $user)
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card border-success">
                        <div class="card-body text-spotify">
                            <div class="row">
                                <div class="col-lg-6 col-8 col-sm-7">
                                    <div class="col-12">
                                        <div class="container">
                                            <div class=" d-flex justify-content-center">
                                                <img src="{{$user->image_url}}" style="height: 75%; width: 75%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-5">
                                    <div class="row mt-3">
                                        @if(strlen($user->song) > 17)
                                            <h4 class="font-weight-normal truncate">{{$user->song}}</h4>
                                        @else
                                            <h2 class="font-weight-normal">{{$user->song}}</h2>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <h5 class="font-weight-light float-left">{{$user->artist}}</h5>
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
    @endforeach
@endsection