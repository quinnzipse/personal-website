

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
                <a href="{{route('addEvent')}}" class="float-right btn {{count($event) == 0 ? 'btn-dark ' : 'btn-secondary'}}">Add event</a>
            </div>
        </div>
    </div>
@endsection