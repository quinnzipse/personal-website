@extends('layouts.app')

@section('content')
    <div class="mb-5">
        <h2 class="float-left text-dark"><i class="far fa-lightbulb text-hue-faint"> </i> Hue Integration</h2>
        <a href="{{route('hue.connect')}}" class="btn float-right btn-outline btn-outline-hue">Connect to Hue Bridge</a>
    </div>
    <div class="dropdown-divider"></div>
    @if(false)
        <div>
            <p>Connected: {{}}</p>
        </div>
    @else
        <div class="container h-100">
            <div class="justify-content-center d-flex h-100">
                <div class="align-items-center d-flex">
                    <h3 class="text-faint font-weight-light">Please connect to hue bridge for options</h3>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('footer')
@endsection