@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 sm">
                <div class="card">
                    <div class="card-header">Things To Do:</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush align-content-center">
                            <li class="list-group-item">
                                <a href="" class="text-muted">Dashboard</a>
                            </li>
                            <li class="list-group-item">
                                <a href="" class="text-muted">Calendar</a>
                            </li>
                            <li class="list-group-item">
                                <a href="" class="text-muted">Hue Light Control</a>
                            </li>
                            <li class="list-group-item">
                                <a href="" class="text-muted">Spotify Control</a>
                            </li>
                            <li class="list-group-item">
                                <a href="" class="text-muted">Smart Dashboard</a>
                            </li>
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

                        You are logged in!
                        <br>
                        <br>
                        Sorry, there is nothing here right now. Try a tab to your left!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
