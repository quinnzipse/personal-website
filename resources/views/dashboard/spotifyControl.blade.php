@extends('layouts.app')

@section('content')
    <div class="mb-5">
        <h2 class="float-left text-dark"><i class="fab fa-spotify text-spotify"></i> Spotify Integration</h2>
        @if($isLoggedIn)
            <button onclick="reauth()" class="btn btn-outline-warning float-right ml-1" data-toggle="tooltip" data-placement="bottom" title="Refresh Token"><i class="fas fa-redo"></i></button>
            <a href="{{route('spotify.logout')}}" class="btn btn-outline-secondary float-right">Logout of Spotify</a>
        @else
            <a href="{{route('spotify.login')}}" class="btn btn-outline-success float-right">Login to Spotify</a>
        @endif
    </div>
    <div class="dropdown-divider"></div>
    <div>
        @if($username != '')
            <p class="text-muted">Logged in as: {{$username}}</p>
        @endif
    </div>
    @if($isLoggedIn)
        <form action="{{route('spotify.process.settings')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-4 row">
                <div class="col-6">
                    <div class="card-body form-group">
                        <h4 class="font-weight-normal">Allow the <strong>public</strong> to...</h4>
                        <div class="dropdown-divider"></div>
                        <div class="container">

                            <div class="custom-control custom-checkbox">
                                <input name="plisten" type="checkbox" class="custom-control-input" {{$settings->plisten == true ? 'checked' : ''}} id="plisten">
                                <label class="custom-control-label" for="plisten">see what you are listening
                                    to.</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input name="padd" type="checkbox" class="custom-control-input" {{$settings->padd == true ? 'checked' : ''}} id="padd">
                                <label class="custom-control-label" for="padd">add songs to your queue.</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card-body form-group">
                        <h4 class="font-weight-normal">Allow the <strong>users</strong> to...</h4>
                        <div class="dropdown-divider"></div>
                        <div class="custom-control custom-checkbox">
                            <input name="ulisten" type="checkbox" class="custom-control-input" {{$settings->ulisten == true ? 'checked' : ''}} id="ulisten">
                            <label class="custom-control-label" for="ulisten">see what you are listening
                                to.</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input name="uadd" type="checkbox" class="custom-control-input" {{$settings->uadd == true ? 'checked' : ''}} id="uadd">
                            <label class="custom-control-label" for="uadd">add songs to your queue.</label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success float-right mt-5">Save</button>
        </form>
    @else
        <div class="container h-100">
            <div class="justify-content-center d-flex h-100">
                <div class="align-items-center d-flex">
                    <h3 class="text-faint font-weight-light">Please login to change Spotify settings</h3>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('footer')
    <script type="text/javascript">
        function reauth() {
            swal({
                title: 'Refresh Access Token?',
                icon: 'warning',
                buttons: ["Nope.", "Yes!"]
            }).then(function (value) {
                if(!value) return;
                window.location = "/spotify/reauth"
            })
        }
    </script>
@endsection