@extends('master')
@section('title')
Create application
@endsection
@section('content')

<form method="POST" action="{{route('application.store')}}" class="d-flex flex-column align-items-center w-75 py-5">
    <h1 class="mb-5">CREATE APPLICATION</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <strong>{{ $error }}</strong>
        @endforeach
    </div>
    @endif
    @csrf
    <input required type="hidden" name="appartment_id" value="{{$appartment->id}}">
    <div class="mb-3 w-100">
        <label for="Input1" class="form-label">Full name</label>
        <input required type="text" name="full_name" class="form-control text-center" id="Input1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3 w-100">
        <label for="Input2" class="form-label">Phone number</label>
        <input required type="tel" name="phone_number" class="form-control text-center" placeholder="+_(___)___-____" pattern="[+]{1}[0-9]{1}[(]{1}[0-9]{3}[)]{1}[0-9]{3}-[0-9]{4}" id="Input2" aria-describedby="emailHelp">
    </div>
    <div class="mb-3 w-100">
        <label for="Input6">Comment from client</label>
        <textarea class="form-control text-center" name="client_comment" placeholder="Leave a comment here" id="Input6"></textarea>
    </div>
    @if (Session::has('successed'))
    <div class="alert alert-success">{{ Session::get('successed') }}</div>
    @endif
    <button type="submit" class="btn btn-primary w-50 mt-3">Create</button>
</form>
<script src="{{asset('/js/create-application.js')}}"></script>
@endsection