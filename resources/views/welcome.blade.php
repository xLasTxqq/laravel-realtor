@extends('master')
@section('title')
    Main
@endsection
@section('content')

    <form class="mb-5" method="GET" action="/">
        <h1>Filters</h1>
        <div class="d-flex justify-content-center align-items-center vw-100 px-5">
            <div class="mb-3 w-100">
                <label for="Input4" class="form-label">Number of rooms</label>
                <input name="rooms" type="number" class="form-control text-center" id="Input4" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 w-100">
                <label for="Input3" class="form-label">Number Flat</label>
                <input name="numberflat" type="number" class="form-control text-center" id="Input3" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 w-100">
                <label for="Input2" class="form-label">Floor</label>
                <input name="floor" type="number" class="form-control text-center" id="Input2" aria-describedby="emailHelp">
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-25 mt-3">Найти</button>
    </form>

    @guest
        <h1>All Free Flats</h1>
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
            </tr>
            </thead>
            <tbody>
            @forelse ($flats as $flat)
                <tr>
                    <th scope="row">{{$flat->id}}</th>
                    <td>{{$flat->numberhouse}}</td>
                    <td>{{$flat->floor}}</td>
                    <td>{{$flat->numberflat}}</td>
                    <td>{{$flat->rooms}}</td>
                    <td>{{$flat->area}}м²</td>
                    <td>{{$flat->livingspace}}м²</td>
                    <td>{{$flat->cost}}р</td>
                </tr>
            @empty
                <th scope="row" colspan="8">No flats</th>
            @endforelse
            </tbody>
        </table>
    @endguest

    @auth
        <h1>All Flats</h1>
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
                <th scope="col">Status</th>
                <th scope="col">Booked before</th>
                <th scope="col">Purchased full name</th>
                <th scope="col">Purchased phone number</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($flats as $flat)
            <tr>
                <th scope="row">{{$flat->id}}</th>
                <td>{{$flat->numberhouse}}</td>
                <td>{{$flat->floor}}</td>
                <td>{{$flat->numberflat}}</td>
                <td>{{$flat->rooms}}</td>
                <td>{{$flat->area}}м²</td>
                <td>{{$flat->livingspace}}м²</td>
                <td>{{$flat->cost}}р</td>
                <td>{{$flat->status}}</td>
                <td>{{$flat->booked}}</td>
                <td>{{$flat->purchasedname}}</td>
                <td>{{$flat->purchasedphone}}</td>
            </tr>
            @empty
                <th scope="row" colspan="12">No flats</th>
            @endforelse
            </tbody>
        </table>
    @endauth
                {{$flats}}
        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
@endsection
