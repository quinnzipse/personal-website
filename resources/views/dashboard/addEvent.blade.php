@extends('layouts.app')

@section('title')
    Add Event
@endsection

@section('content')
        <form action="{{route('calendar.process.addEvent')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-x3">
                <div class="col-md-8 form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="{{ $errors->has('name') ? 'is-invalid' : '' }} form-control" />
                    @if($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="col-md-4 form-group">
                    <label for="type">Type</label>
                    <select id="type" name="type" class="{{ $errors->has('type') ? 'is-invalid' : '' }} form-control">
                        <option>Work</option>
                        <option>Event</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6 form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" value="{{ old('date') }}" class="{{ $errors->has('date') ? 'is-invalid' : '' }} form-control" />
                @if($errors->has('date'))
                    <div class="invalid-feedback">{{ $errors->first('date') }}</div>
                @endif
            </div>
                <div class="col-md-6 form-group">
                    <label for="time">Time</label>
                    <input type="time" name="time" id="time" value="{{time()}}" class="{{ $errors->has('time') ? 'is-invalid' : '' }} form-control" />
                    @if($errors->has('time'))
                        <div class="invalid-feedback">{{ $errors->first('time') }}</div>
                    @endif
                </div>
                <div class="col-md-6 form-group">
                    <button class="btn btn-primary float-right mt-4">
                        Add
                    </button>
                </div>
                </div>
        </form>
@endsection