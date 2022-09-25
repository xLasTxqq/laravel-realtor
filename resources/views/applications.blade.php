@extends('master')
@section('title')
    Applications
@endsection
@section('content')


        <form class="mb-5" method="GET" action="{{route('applications')}}">
            <h1>Filters</h1>
            <div class="d-flex justify-content-center align-items-center vw-100 px-5">
            <div class="mb-3 w-100">
                <label for="Input7" class="form-label w-75">Status</label>
                <select id="Input7" name="status" class="form-select text-center px-5" aria-label="Default select example">
                    <option value="" selected disabled hidden>Open this select menu</option>
                    <option value="New">New</option>
                    <option value="Processed">Processed</option>
                    <option value="Customer">Customer</option>
                </select>
            </div>
            <div class="mb-3 w-100">
                <label for="Input3" class="form-label">Date of the application</label>
                <input type="date" name="dateapplication" class="form-control text-center datecenter" id="Input3" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 w-100">
                <label for="Input1" class="form-label">Full name</label>
                <input type="text" name="fullname" class="form-control text-center" id="Input1" aria-describedby="emailHelp">
            </div>

            </div>
            <button type="submit" class="btn btn-primary w-25 mt-3">Найти</button>
        </form>

        <h1>All Applications</h1>
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
            </tr>
            </thead>
            <tbody>
            @forelse ($applications as $application)
                <tr>
                    <th scope="row">{{$application->id}}</th>
                    <td>{{$application->fullname}}</td>
                    <td>{{$application->number}}</td>
                    <td>{{$application->dateapplication}}</td>
                    <td>{{$application->numberhouse}}</td>
                    <td>{{$application->numberflat}}</td>
                    <td>{{$application->comment1}}</td>
                    <td>{{$application->status}}</td>
                    <td>{{$application->datemeeting}}</td>
                    <td>{{$application->comment2}}</td>
                    <td>{{$application->agreedate}}</td>
                </tr>
            @empty
                <th scope="row" colspan="12">No applications</th>
            @endforelse
            </tbody>
        </table>

    {{$applications}}
@endsection
