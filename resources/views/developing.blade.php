@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-warning">
            <h5><i class="fas fa-exclamation-triangle"></i>  This page is under development, please check back for more changes</h5>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3 sm">
                <div class="card">
                    <div class="card-header">Things To Do:</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush align-content-center">
                            <ul class="list-group list-group-flush align-content-center">
                                <li class="list-group-item">
                                    <a href="{{route('home')}}" class="text-muted">Dashboard</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('calendar')}}" class="text-muted">Calendar</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('lightControl')}}" class="text-muted">Hue Light Control</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('musicControl')}}" class="text-muted">Spotify Control</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('smartDashboard')}}" class="text-muted">Smart Dashboard</a>
                                </li>
                            </ul>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-md-9">

                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Sorry there is nothing here, try again later.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
