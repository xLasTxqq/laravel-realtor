@extends('master')
@section('title')
Applications
@endsection
@section('content')
<form class="mb-5" method="GET" action="{{route('application.index')}}">
    <h1>Filters</h1>
    <div class="d-flex justify-content-center align-items-center vw-100 px-5">
        <div class="mb-3 w-100">
            <label for="Input7" class="form-label w-75">Status</label>
            <select id="Input7" name="status" class="form-select text-center" aria-label="Default select example">
                <option value="" selected>All statuses</option>
                <option value="new" {{request()->status=='new'?'selected':''}}>New</option>
                <option value="processed" {{request()->status=='processed'?'selected':''}}>Processed</option>
                <option value="customer" {{request()->status=='customer'?'selected':''}}>Customer</option>
            </select>
        </div>
        <div class="mb-3 w-100">
            <label for="Input3" class="form-label">Date of the application</label>
            <input type="date" value="{{request()->created_at}}" name="created_at" class="form-control text-center datecenter" id="Input3">
        </div>
        <div class="mb-3 w-100">
            <label for="Input1" class="form-label">Full name</label>
            <input type="text" name="full_name" value="{{request()->full_name}}" class="form-control text-center" id="Input1">
        </div>

    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary w-25 mt-3 mx-3">Найти</button>
        <a href="{{route('application.index')}}" class="btn btn-primary w-25 mt-3 mx-3">Сбросить</a>
    </div>
</form>

<h1>All Applications</h1>
@if(Session::has('successed'))
<div class="alert alert-warning">{{ Session::get('successed') }}</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full name</th>
            <th scope="col">Phone number</th>
            <th scope="col">Date of the application</th>
            <th scope="col">Number house</th>
            <th scope="col">Number Flat</th>
            <th scope="col">Comment from client</th>
            <th scope="col">Status</th>
            <th scope="col">Date meeting</th>
            <th scope="col">Comment from manager</th>
            <th scope="col">Agreement date</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($applications as $application)
        <tr>
            <th scope="row">{{$application->id}}</th>
            <td>{{$application->full_name}}</td>
            <td>{{$application->phone_number}}</td>
            <td>{{$application->created_at}}</td>
            <td>{{$application->appartment->house_number}}</td>
            <td>{{$application->appartment->appartment_number}}</td>
            <td>{{$application->client_comment}}</td>
            <td>{{$application->status}}</td>
            <td>{{$application->date_meeting}}</td>
            <td>{{$application->manager_comment}}</td>
            <td>{{$application->date_of_purchase}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('application.edit',$application->id)}}">Update</a>
            </td>
            <td>
                <form method="POST" action="{{route('application.destroy',$application->id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <th scope="row" colspan="13">No applications</th>
        @endforelse
    </tbody>
</table>

{{$applications}}
@endsection