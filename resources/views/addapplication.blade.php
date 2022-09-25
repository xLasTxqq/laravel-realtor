@extends('master')
@section('title')
    AddApplication
@endsection
@section('content')

    <form method="POST" action="/addapplication" class="d-flex flex-column align-items-center w-75 py-5">
        <h1 class="mb-5">ADD APPLICATION</h1>
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
            <input required type="text" name="fullname" class="form-control text-center" id="Input1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 w-100">
            <label for="Input2" class="form-label">Phone number</label>
            <input required type="tel" name="number" class="form-control text-center" pattern="[+]{1}[0-9]{1}[(]{1}[0-9]{3}[)]{1}[0-9]{3}-[0-9]{4}" id="Input2" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 w-100">
            <label for="Input3" class="form-label">Date of the application</label>
            <input required type="date" name="dateapplication" class="form-control text-center datecenter" id="Input3" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 w-100">
            <label for="Input4" class="form-label">Number house</label>
            <input required type="text" name="numberhouse" class="form-control text-center" id="Input4" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 w-100">
            <label for="Input5" class="form-label">Number Flat</label>
            <input required name="numberflat" type="text" class="form-control text-center" id="Input5" aria-describedby="emailHelp">
        </div>

        <div class="mb-3 w-100">
            <label for="Input6">Comment from client</label>
            <textarea class="form-control text-center" name="comment1" placeholder="Leave a comment here" id="Input6"></textarea>
        </div>

        <div class="mb-3 w-100">
            <label for="Input7" class="form-label w-75">Status</label>
            <select required id="Input7" name="status" class="form-select text-center px-5" aria-label="Default select example">
                <option value="" selected disabled hidden>Open this select menu</option>
                <option value="New">New</option>
                <option value="Processed">Processed</option>
                <option value="Customer">Customer</option>
            </select>
        </div>

        <div class="mb-3 w-100 d-none" id="processed1">
            <label for="Input8" class="form-label">Date meeting</label>
            <input type="date" name="datemeeting" class="form-control text-center datecenter" id="Input8" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 w-100 d-none" id="processed2">
            <label for="Input9">Comment from manager</label>
            <textarea class="form-control text-center" name="comment2" placeholder="Leave a comment here" id="Input9"></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-50 mt-3">Add</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js" type="text/javascript"></script>
    <script>
        let select = document.getElementById('Input7');
        let processed1 = document.getElementById('processed1');
        let processed2 = document.getElementById('processed2');
        let inputprocessed1 = document.getElementById('Input8');
        let inputprocessed2 = document.getElementById('Input9');

        select.addEventListener('change',()=>{
            if(select.value==="New")
            {processed1.classList.add("d-none"); processed2.classList.add("d-none");
            inputprocessed1.required = false; inputprocessed2.required = false;}
            if(select.value==="Customer")
            {processed1.classList.add("d-none"); processed2.classList.add("d-none");
            inputprocessed1.required = false; inputprocessed2.required = false;}
            if(select.value==="Processed")
            {processed1.classList.remove("d-none");processed2.classList.remove("d-none");
            inputprocessed1.required = true; inputprocessed2.required = true;}
        })

        $('#Input2').mask("+7(999)999-9999");
    </script>
@endsection
