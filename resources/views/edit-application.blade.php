@extends('master')
@section('title')
Create application
@endsection
@section('content')
<form method="POST" action="{{route('application.update',$application->id)}}" class="d-flex flex-column align-items-center w-75 py-5">
    @method('PUT')
    <h1 class="mb-5">UPDATE APPLICATION</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <strong>{{ $error }}</strong>
        @endforeach
    </div>
    @endif
    @csrf
    <div class="mb-3 w-100">
        <label for="Input1" class="form-label">Full name</label>
        <input readonly required type="text" value="{{$application->full_name}}" class="form-control text-center" id="Input1">
    </div>
    <div class="mb-3 w-100">
        <label for="Input2" class="form-label">Phone number</label>
        <input readonly required value="{{$application->phone_number}}" type="tel" class="form-control text-center" placeholder="+_(___)___-____" pattern="[+]{1}[0-9]{1}[(]{1}[0-9]{3}[)]{1}[0-9]{3}-[0-9]{4}" id="Input2">
    </div>
    <!-- <div class="mb-3 w-100">
            <label for="Input3" class="form-label">Date of the application</label>
            <input required type="date" name="dateapplication" class="form-control text-center datecenter" id="Input3">
        </div> -->
    <div class="mb-3 w-100">
        <label for="Input4" class="form-label">Number house</label>
        <input required type="text" readonly value="{{$application->appartment->house_number}}" class="form-control text-center" id="Input4">
    </div>
    <div class="mb-3 w-100">
        <label for="Input5" class="form-label">Number appartment</label>
        <input required readonly value="{{$application->appartment->appartment_number}}" type="text" class="form-control text-center" id="Input5">
    </div>

    <div class="mb-3 w-100">
        <label for="Input6">Comment from client</label>
        <textarea class="form-control text-center" readonly id="Input6">{{$application->client_comment}}</textarea>
    </div>

    <div class="mb-3 w-100">
        <label for="Input7" class="form-label w-75">Status</label>
        <select required id="Input7" name="status" class="form-select text-center px-5" aria-label="Default select example">
            <option value="new" {{$application->status=='new'?'selected':''}}>New</option>
            <option value="processed" {{$application->status=='processed'?'selected':''}}>Processed</option>
            <option value="customer" {{$application->status=='customer'?'selected':''}}>Customer</option>
        </select>
    </div>

    <div class="mb-3 w-100 d-none" id="processed1">
        <label for="Input8" class="form-label">Date meeting</label>
        <input type="date" name="date_meeting" class="form-control text-center datecenter" id="Input8">
    </div>
    <div class="mb-3 w-100 d-none" id="processed2">
        <label for="Input9">Comment from manager</label>
        <textarea class="form-control text-center" name="manager_comment" placeholder="Leave a comment here" id="Input9"></textarea>
    </div>
    @if (Session::has('successed'))
    <div class="alert alert-success">{{ Session::get('successed') }}</div>
    @endif
    <button type="submit" class="btn btn-primary w-50 mt-3">Update</button>
</form>

<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js" type="text/javascript"></script> -->
<script>
    let select = document.getElementById('Input7');
    let processed1 = document.getElementById('processed1');
    let processed2 = document.getElementById('processed2');
    let inputprocessed1 = document.getElementById('Input8');
    let inputprocessed2 = document.getElementById('Input9');

    select.addEventListener('change', () => {
        if (select.value === "processed") {
            processed1.classList.remove("d-none");
            processed2.classList.remove("d-none");
            inputprocessed1.required = true;
            inputprocessed2.required = true;
        }
        else {
            processed1.classList.add("d-none");
            processed2.classList.add("d-none");
            inputprocessed1.required = false;
            inputprocessed2.required = false;
        }
    })

    // $('#Input2').mask("+9(999)999-9999");
</script>
@endsection