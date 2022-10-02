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
        @if (Session::has('successed'))
        <div class="alert alert-success">{{ Session::get('successed') }}</div>
        @endif
        @if(request()->route()->action['as']=='appartment.create')
        <button type="submit" class="btn btn-primary w-50 mt-3">Add</button>
        @elseif(request()->route()->action['as']=='appartment.edit')
        <button type="submit" class="btn btn-primary w-50 mt-3">Update</button>
        @endif
    </form>
    @endsection