

@extends('layouts.app')

@section('title')
Calendar
@endsection

@section('content')
    @if(count($event) == 0)
        <div class="container-fluid">
        <p class="center alert-info">It looks like you don't have any events. Try adding some!</p>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="container">
                <h3 class="float-left mb-0">Your Events</h3>
                <a href="{{route('calendar.addEvent')}}" class="float-right mt-1"  data-toggle="tooltip" data-placement="bottom" title="Add Event" style="font-size: 1.4em"><i class="far fa-calendar-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="dropdown-divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @foreach($event as $e)
                    <br>
                    <div class="card">
                        <div class="card-header">
                            {{$e->type}}
                            <a class="float-right" data-toggle="tooltip" data-placement="bottom" title="Edit Event" onclick="editEvent({{$e->id}})" ><i class="fa fa-edit text-muted"></i></a>
                        </div>
                        <div class="card-body">
                            <h5>{{$e->name}}</h5>
                            <div class="dropdown-divider"></div>
                            <p><b>Date: </b> {{$e->date}}</p>
                            <p><b>Time: </b> {{$e->time}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script type="text/javascript">
    function editEvent(eventID){
        window.location = "/editEvent/" + eventID
    }
</script>
@endsection