@extends('layouts.app')

@section('content')
<p>Duration: {{$duration}}</p>
    <p>Progress: {{$progress}}</p>
<p>img url: {{$image}}</p>
<img src="{{$image}}">
@endsection