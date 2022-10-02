@extends('master')
@section('title')
Main
@endsection
@section('content')

<form class="mb-5" method="GET" action="{{route('appartment.index')}}">
    <h1>Filters</h1>
    <div class="d-flex justify-content-center align-items-center vw-100 px-5">
        <div class="mb-3 w-100">
            <label for="Input4" class="form-label">Number of rooms</label>
            <input name="number_of_rooms" type="number" class="form-control text-center" value="{{request()->number_of_rooms}}" id="Input4">
        </div>
        <div class="mb-3 w-100">
            <label for="Input3" class="form-label">Appartment number</label>
            <input name="appartment_number" type="number" class="form-control text-center" value="{{request()->appartment_number}}" id="Input3">
        </div>
        <div class="mb-3 w-100">
            <label for="Input2" class="form-label">Floor</label>
            <input name="floor" type="number" step="0.5" class="form-control text-center" value="{{request()->floor}}" id="Input2">
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary w-25 mt-3 mx-3">Найти</button>
        <a href="{{route('appartment.index')}}" class="btn btn-primary w-25 mt-3 mx-3">Сбросить</a>
    </div>
</form>
@guest
<h1>All Free Appartments</h1>
@else
<h1>All appartments</h1>
@endguest
@if(Session::has('successed'))
<div class="alert alert-warning">{{ Session::get('successed') }}</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Number house</th>
            <th scope="col">Floor</th>
            <th scope="col">Number Flat</th>
            <th scope="col">Number of rooms</th>
            <th scope="col">Apartment area</th>
            <th scope="col">Living space</th>
            <th scope="col">Cost</th>
            <th scope="col">Create application</th>
            @auth
            <th scope="col">Status</th>
            <th scope="col">Booked before</th>
            <th scope="col">Purchased full name</th>
            <th scope="col">Purchased phone number</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
            @endauth
        </tr>
    </thead>
    <tbody>
        @forelse ($appartments as $appartment)
        <tr>
            <th scope="row">{{$appartment->id}}</th>
            <td>{{$appartment->house_number}}</td>
            <td>{{$appartment->floor}}</td>
            <td>{{$appartment->appartment_number}}</td>
            <td>{{$appartment->number_of_rooms}}</td>
            <td>{{$appartment->apartment_area}}м²</td>
            <td>{{$appartment->living_space}}м²</td>
            <td>{{$appartment->price.$appartment->currency}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('application.create',$appartment->id)}}">Create application</a>
            </td>
            @auth
            @if(!empty($appartment->applications->first()->status))
            <td>{{$appartment->applications->first()->status}}</td>
            <td>{{$appartment->applications->first()->date_meeting}}</td>
            <td>{{$appartment->applications->first()->full_name}}</td>
            <td>{{$appartment->applications->first()->phone_number}}</td>
            @else
            <td>new</td>
            <td></td>
            <td></td>
            <td></td>
            @endif
            <td>
                <a class="btn btn-primary" href="{{route('appartment.edit',$appartment->id)}}">Update</a>
            </td>
            <td>
                <form method="POST" action="{{route('appartment.destroy',$appartment->id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            @endauth
        </tr>
        @empty
        <th scope="row" colspan="{{auth()->check()?15:9}}">No appartments</th>
        @endforelse
    </tbody>
</table>
{{$appartments}}
<!-- <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
</div> -->
@endsection