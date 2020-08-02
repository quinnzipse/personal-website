<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
   @php
      use Carbon\Carbon;
      $error = true;
      if(isset($recently_played->items)) $error = false;
   @endphp
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <title><?php echo($error ? 'Error Getting Music' : 'Quinn\'s Music')?></title>
   
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   
   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
           integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
           crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
           integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
           crossorigin="anonymous"></script>
   
   <!-- Fonts -->
   <link rel="dns-prefetch" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
         integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
   
   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<main>
   <noscript>
      <h1>Please Enable JavaScript to Continue.</h1>
   </noscript>
   <div id="main_content">
      @if(!$error)
         @if(isset($now_playing))
            <div id="now_playing_container">
               <div id="now_playing">
                  <img alt="cover" src="{{$now_playing->item->album->images[0]->url}}"
                       style="border-radius: 5px;">
                  <div class="card-title">
                     <h4>{{$now_playing->item->name}}</h4>
                  </div>
                  <p>
                     @php
                        $artists = array_column($now_playing->item->artists, 'name');
                        $artists = implode(', ', $artists);
                        echo $artists;
                     @endphp
                  </p>
               </div>
            </div>
         @else
            <div class="card" id="now_playing">
               <div class="card-body"><h4>Nothing Playing Right Now</h4></div>
            </div>
         @endif
         <div id="extras">
            <div class="card" id="song_history">
               <div class="card-header" id="recently_played_title">
                   <h6 style="margin-bottom: 0"><button class="btn btn-link btn-sm" data-toggle="collapse" data-target="#recently_played_collapse">Recently Played</button></h6>
               </div>
               <div class="collapse" id="recently_played_collapse" data-parent="#extras" aria-labelledby="recently_played_title">
                  <div class="card-body" style="padding: 0" id="table-container">
                     <div class="card c-card" style="margin-bottom: 0">
                        <div class="card-grid" style="padding-bottom: 0">
                           <div id="title_header"><small>Title</small></div>
                           <div id="artists_header"><small>Artists</small></div>
                           <div id="played_at_header" class="text-right"><small>Listened To</small></div>
                        </div>
                     </div>
                     <div id="table_body">
                        @foreach($recently_played->items as $item)
                           <div class="card c-card">
                              <div class="card-grid">
                                 <h6 style="margin-bottom: 0" class="title text-truncate">{{$item->track->name}}</h6>
                                 <div class="artist text-truncate">
                                    @php
                                       $artists = array_column($item->track->artists, 'name');
                                       $artists = implode(', ', $artists);
                                       echo $artists;
                                    @endphp
                                 </div>
                                 <div class="played_at text-right">
                                    @php
                                       $time = new Carbon(substr($item->played_at, 0, strpos($item->played_at, 'T')) . ' ' . substr($item->played_at, strpos($item->played_at, 'T')+1, 8));
                                       echo $time->diffForHumans();
                                    @endphp
                                 </div>
                              </div>
                           </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header" id="song_request_title">
                   <h6 style="margin-bottom: 0"><button class="btn btn-link btn-sm" data-toggle="collapse" data-target="#song_request_collapse">Request a Song</button></h6>
               </div>
               <div class="collapse" id="song_request_collapse" data-parent="#extras" aria-labelledby="song_request_title">
                  <div class="card-body">
                     <div id="request_button_container">
                        <form>
                           <div class="form-group">
                              <label for="song_title">Song Title</label>
                              <input class="form-control" type="text" id="song_title">
                           </div>
                           <button class="btn btn-sm btn-primary" disabled>Request A Song</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header" id="queue_title">
                  <h6 style="margin-bottom: 0"><button class="btn btn-link btn-sm" data-toggle="collapse" data-target="#queue_collapse">Queue</button></h6>
               </div>
               <div class="collapse" id="queue_collapse" data-parent="#extras" aria-labelledby="queue_title">
                  <div class="card-body">
                  
                  </div>
               </div>
            </div>
         </div>
      @else
         <div class="card" style="grid-column: 1 / span 2 !important;">
            <div class="card-body">
               <div class="card-title"><h4>Error</h4></div>
               <p class="text-dark">{{$recently_played}}</p>
            </div>
         </div>
      @endif
   </div>
</main>
<script>
    let queue = [];
    $(document).ready(() => {
        setTimeout(() => location.reload(), 36000);
        $('#recently_played_collapse').collapse('show');
    });

    const updateQueue = () => {
        let html = '';
        queue.forEach((val, i) => html += `<img src="${val.album.images[0].url}" style="top: ${i * 3}%; bottom: ${i * 3}%" alt="${val.album.name}">`);
        $('#next_up_songs').html(html);
    };

    const getQueue = async () => {
        const request = await fetch();
        const response = request.json();

        if (!response.ok) console.warn('Error while fetching queue');

        console.log(response);

        response.forEach(val => {
            ``

        });
    };

    const addSongToQueue = async (uri) => {
        const request = await fetch("../api/spotify/add_to_queue/", {
            method: "POST",
            body: JSON.stringify({
                uri: uri
            }),
        });
        const response = request.json();
        console.log(response);
    }
</script>
<style>
   
   #main_content {
      padding: 2% 50px;
      display: grid;
      grid-template-columns: .7fr 1fr;
      column-gap: 50px;
      height: 100vh !important;
   }
   
   #now_playing_container {
      display: flex;
      padding: 0 2%;
   }
   
   #now_playing img {
      width: 100%;
   }
   
   .card-grid {
      display: grid;
      grid-template-columns: 1fr .8fr .4fr;
      column-gap: 5px;
   }
   
   .c-card {
      padding: .5% 2%;
      border: none;
   }
   
   #table_body {
      height: 63vh !important;
      overflow-y: auto;
   }
   
   .card-title {
      margin-top: 2%;
   }
</style>
</body>
</html>
