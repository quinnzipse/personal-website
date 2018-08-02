

@extends('layouts/app')

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
                <a href="{{route('calendar.addEvent')}}" class="float-right btn {{count($event) == 0 ? 'btn-dark ' : 'btn-secondary'}}">Add event</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Your Events</h3>
                <div class="dropdown-divider"></div>
                @foreach($event as $e)
                    <br>
                    <div class="card">
                        <div class="card-header">
                            {{$e->type}}
                            <a class="float-right" href="{{route('calendar.editEvent')}}"><i class="fa fa-edit"></i></a>
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