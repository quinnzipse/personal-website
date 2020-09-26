@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <h2 class="display-4">Manage Queue</h2>
    <br>
    @foreach($queue as $song)
        <div class="p-2 my-1">
            <?php $data = json_decode($song->data); $image = $data->album->images[2]; ?>
            <div class="row">
                <div class="col-lg-1 col-md-auto">
                    <img src="{{$image->url}}" alt="Album Art"
                         style="width: {{$image->width}}px; height: {{$image->height}}px; border-radius: 5%" class="c-img" onclick="removeFromQueue('<?php echo $song->uri?>')">
                </div>
                <div class="col-lg-9 col-md-auto pl-0 d-flex">
                    <div class="my-auto">
                        <h5 class="mb-0">{{$data->name}}</h5>
                        <span>
                            <?php
                                $artists = array_column($data->artists, 'name');
                                $artists = implode(', ', $artists);
                                echo $artists;
                            ?>
                        </span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-auto offset-lg-0 offset-md-4 d-flex">
                    <div class="m-auto">
                        <?php $date = new Carbon\Carbon($song->created_at)?>
                            <h6 class="m-0"><i class="fas fa-history"></i>&nbsp;{{$date->diffForHumans()}}</h6>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if(sizeof($queue) == 0)
        <h4 class="text-muted">Nothing Queued Right Now</h4>
    @endif
    <script>
        async function removeFromQueue(uri) {
            Swal.fire({
                title: 'Remove From Queue?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Remove',
            }).then(async function (res){
                if(res.isConfirmed) {
                    const request = await fetch(`../spotify/remove_from_queue?uri=${uri}`);
                    console.log(request.status);
                    if (request.status !== 400) location.reload();
                }
            });
        }
    </script>
@endsection
