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
                <div class="col-lg-6 col-12">
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
                                <input name="padd" type="checkbox" class="custom-control-input disabled" {{$settings->padd == true ? 'checked' : ''}} id="padd" disabled>
                                <label class="custom-control-label" for="padd">add songs to your queue.</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="card-body form-group">
                        <h4 class="font-weight-normal">Allow the <strong>users</strong> to...</h4>
                        <div class="dropdown-divider"></div>
                        <div class="custom-control custom-checkbox">
                            <input name="ulisten" type="checkbox" class="custom-control-input disabled" {{$settings->ulisten == true ? 'checked' : ''}} id="ulisten" disabled>
                            <label class="custom-control-label" for="ulisten">see what you are listening
                                to.</label>
                        </div>
                        <div class="custom-control custom-checkbox disabled">
                            <input name="uadd" type="checkbox" class="custom-control-input disabled" {{$settings->uadd == true ? 'checked' : ''}} id="uadd" disabled>
                            <label class="custom-control-label" for="uadd">add songs to your queue.</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group-sm">
                        <label>Select a default playlist</label>
                        <select class="form-control" id="d_playlist" value="{{$settings->d_playlist}}" name="d_playlist">
                            <option selected disabled>-- Select One --</option>
                        </select>
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
        $(document).ready(function(){
            const url = 'https://api.spotify.com/v1/me/playlists?limit=50';
            try {
                fetch(url, {
                    headers: {
                        'Authorization': 'Bearer {{$authToken}}'
                    }
                }).then(e => e.json())
                    .then( e => {
                            console.log('Success:', e);
                            let items = e.items;
                            let html = $('#d_playlist').html();
                            for(i=0;i<items.length; i++){
                                if(items[i].collaborative || items[i].owner.id == "{{$username}}") {
                                    html += '<option value=' + items[i].id + ">" + items[i].name + "</option>";
                                }
                            }
                            $('#d_playlist').html(html);
                            $('#d_playlist option[value="{{$settings->d_playlist}}"]').prop('selected', 'true');
                        }
                    );
            } catch (error) {
                console.error('Error:', error);
            }
        });

        function reauth() {
            Swal.fire({
                title: 'Refresh Access Token?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No',
                confirmButtonText: "Yes!",
            }).then(function (value) {
                if(!value.value) return;
                window.location = "/spotify/reauth"
            });
        }


    </script>
@endsection