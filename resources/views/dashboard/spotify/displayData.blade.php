@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <div class="row">
        <div class="col-lg-1 col-md-auto text-center">Album</div>
        <div class="col-lg-6 pl-1">Song Info</div>
        <div class="col-lg-2">Times Played</div>
        <div class="col-lg-2">First Played</div>
    </div>
    @foreach($data as $song)
        <div class="p-2 my-1">
            <?php $songData = json_decode($song->data); $image = $songData->album->images[2]; ?>
            <div class="row">
                <div class="col-lg-1 col-md-auto">
                    <img src="{{$image->url}}" alt="Album Art"
                         style="width: {{$image->width}}px; height: {{$image->height}}px; border-radius: 5%"
                         class="c-img" onclick="removeFromQueue('<?php echo $song->uri?>')">
                </div>
                <div class="col-lg-6 col-md-auto pl-0 d-flex">
                    <div class="my-auto">
                        <h5 class="mb-0">{{$song->name}}</h5>
                        <span>
                            <?php
                            $artists = array_column($songData->artists, 'name');
                            $artists = implode(', ', $artists);
                            echo $artists;
                            ?>
                        </span>
                    </div>
                </div>
                <div class="col-lg-1 text-center">
                    {{$song->listened_to}}
                </div>
                <div class="col-lg-2 col-md-auto offset-lg-1 offset-md-4 d-flex">
                    <div class="m-auto">
                        <?php $date = new Carbon\Carbon($song->created_at)?>
                        <h6 class="m-0"><i class="fas fa-history"></i>&nbsp;{{$date->diffForHumans()}}</h6>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if(sizeof($data) == 0)
        <h4 class="text-muted">No data available!</h4>
    @else
        <div class="mt-2">
            {{$data->links()}}
        </div>
    @endif
    <script>
    </script>
@endsection
