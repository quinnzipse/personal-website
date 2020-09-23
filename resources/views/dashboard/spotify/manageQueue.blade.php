@extends('layouts.app')

@section('content')
    <h2 class="display-4">Manage Queue</h2>
    <br>
    @foreach($queue as $song)
        <div class="card p-2 my-1">
            <?php $data = json_decode($song->data); $image = $data->album->images[2]; ?>
            <div class="row">
                <div class="col-1">
                    <img src="{{$image->url}}" alt="Album Art"
                         style="width: {{$image->width}}px; height: {{$image->height}}px; border-radius: 5%">
                </div>
                <div class="col-9 pl-0 d-flex">
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
                <div class="col-2 d-flex">
                    <div class="m-auto">
                        <?php $date = new Carbon\Carbon($song->created_at)?>
                            <h6 class="m-0"><i class="fas fa-history"></i>&nbsp;{{$date->diffForHumans()}}</h6>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
