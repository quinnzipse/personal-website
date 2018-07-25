@extends('layouts/main')
@section('content')
    <div class="container" style="margin-top: 10% ">
        <h1>Welcome to the darkside!</h1>
        <div  class="dropdown-divider"></div>
        <br>
        <form>
            <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection