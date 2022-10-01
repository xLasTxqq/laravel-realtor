@extends('master')
@section('title')
AddFlat
@endsection
@section('content')

@if(request()->route()->action['as']=='appartment.create')
<form method="POST" action="{{route('appartment.store')}}" class="d-flex flex-column align-items-center w-75 py-5">
    <h1 class="mb-5">ADD APPARTMENT</h1>
    @elseif(request()->route()->action['as']=='appartment.edit')
    <form method="POST" action="{{route('appartment.update',$appartment->id)}}" class="d-flex flex-column align-items-center w-75 py-5">
        <h1 class="mb-5">UPDATE APPARTMENT</h1>
        @method('PATCH')
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <strong>{{ $error }}</strong>
            @endforeach
        </div>
        @endif
        @csrf
        <div class="mb-3 w-100">
            <label for="Input1" class="form-label">Number house</label>
            <input required type="text" name="house_number" class="form-control text-center" value="{{!empty($appartment)?$appartment->house_number:old('house_number')}}" id="Input1">
        </div>
        <div class="mb-3 w-100">
            <label for="Input2" class="form-label">Floor</label>
            <input required name="floor" type="number" step="0.5" class="form-control text-center" value="{{!empty($appartment)?$appartment->floor:old('floor')}}" id="Input2">
        </div>
        <div class="mb-3 w-100">
            <label for="Input3" class="form-label">Appartment number</label>
            <input required name="appartment_number" type="number" class="form-control text-center" value="{{!empty($appartment)?$appartment->appartment_number:old('appartment_number')}}" id="Input3">
        </div>
        <div class="mb-3 w-100">
            <label for="Input4" class="form-label">Number of rooms</label>
            <input required name="number_of_rooms" type="number" class="form-control text-center" value="{{!empty($appartment)?$appartment->number_of_rooms:old('number_of_rooms')}}" id="Input4">
        </div>
        <div class="mb-3 w-100">
            <label for="Input5" class="form-label">Apartment area</label>
            <input required name="apartment_area" type="number" step="0.1" class="form-control text-center" value="{{!empty($appartment)?$appartment->apartment_area:old('apartment_area')}}" id="Input5">
        </div>
        <div class="mb-3 w-100">
            <label for="Input6" class="form-label">Living space</label>
            <input required name="living_space" type="number" step="0.1" class="form-control text-center" value="{{!empty($appartment)?$appartment->living_space:old('living_space')}}" id="Input6">
        </div>
        <div class="mb-3 w-100">
            <label for="Input7" class="form-label">Price</label>
            <input required name="price" type="number" step="0.1" class="form-control text-center" value="{{!empty($appartment)?$appartment->price:old('price')}}" id="Input7">
        </div>
        <div class="mb-3 w-100">
            <label for="Input9" class="form-label">Currency</label>
            <input required name="currency" type="text" class="form-control text-center" value="{{!empty($appartment)?$appartment->currency:old('currency')}}" id="Input8">
        </div>
        <!-- 
        <div class="mb-3 w-100">
        <label for="Input8" class="form-label w-75">Status</label>
        <select required id="Input8" name="status" class="form-select text-center px-5" aria-label="Default select example">
            <option value="" selected disabled hidden>Open this select menu</option>
            <option value="Free">Free</option>
            <option value="Booked">Booked</option>
            <option value="Purchased">Purchased</option>
        </select>
        </div> -->
        <!-- 
    <div class="mb-3 w-100 d-none" id="booked">
        <label for="Input9" class="form-label">Booked before</label>
        <input type="date" name="booked" class="form-control text-center datecenter" id="Input9" aria-describedby="emailHelp">
    </div>

    <div class="mb-3 w-100 d-none" id="purchased1">
        <label for="Input10" class="form-label">Purchased full name</label>
        <input type="text" name="purchasedname" class="form-control text-center" id="Input10" aria-describedby="emailHelp">
    </div>

    <div class="mb-3 w-100 d-none" id="purchased2">
        <label for="Input11" class="form-label">Purchased phone number</label>
        <input type="tel" name="purchasedphone" pattern="[+]{1}[0-9]{1}[(]{1}[0-9]{3}[)]{1}[0-9]{3}-[0-9]{4}" class="form-control text-center" id="Input11" aria-describedby="emailHelp">
    </div> -->
        @if (Session::has('successed'))
        <div class="alert alert-success">{{ Session::get('successed') }}</div>
        @endif
        @if(request()->route()->action['as']=='appartment.create')
        <button type="submit" class="btn btn-primary w-50 mt-3">Add</button>
        @elseif(request()->route()->action['as']=='appartment.edit')
        <button type="submit" class="btn btn-primary w-50 mt-3">Update</button>
        @endif
    </form>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js" type="text/javascript"></script>
<script>
    let select = document.getElementById('Input8');
    let booked = document.getElementById('booked');
    let purchased1 = document.getElementById('purchased1');
    let purchased2 = document.getElementById('purchased2');
    let inputbooked = document.getElementById('Input9');
    let inputpurchased1 = document.getElementById('Input10');
    let inputpurchased2 = document.getElementById('Input11');

    select.addEventListener('change', () => {
        if (select.value === "Free") {
            booked.classList.add("d-none");
            purchased1.classList.add("d-none");
            purchased2.classList.add("d-none");
            inputbooked.required = false;
            inputpurchased1.required = false;
            inputpurchased2.required = false
        }
        if (select.value === "Booked") {
            purchased1.classList.add("d-none");
            purchased2.classList.add("d-none");
            booked.classList.remove("d-none");
            inputbooked.required = true;
            inputpurchased1.required = false;
            inputpurchased2.required = false
        }
        if (select.value === "Purchased") {
            booked.classList.add("d-none");
            purchased1.classList.remove("d-none");
            purchased2.classList.remove("d-none");
            inputbooked.required = false;
            inputpurchased1.required = true;
            inputpurchased2.required = true
        }
    })

    $(inputpurchased2).mask("+7(999)999-9999");
</script> -->
    @endsection