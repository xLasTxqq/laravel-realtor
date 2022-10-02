@extends('master')
@section('title')
Login
@endsection
@section('content')
<form method="POST" action="{{route('login.store')}}">
    @csrf
    <div class="mb-3">
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <strong>{{ $error }}</strong>
            @endforeach
        </div>
        @endif
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="login" class="form-control" name="login" id="exampleInputEmail1" required aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Login: manager , Password: web2021</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check text-start d-flex justify-content-center">
        <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label ms-2" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary px-5">Login</button>
</form>
@endsection