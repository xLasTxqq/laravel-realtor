<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlatRequest;
use App\Models\Appartment;
use App\Models\Flat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $rooms=$request->rooms;
        // $numberflat=$request->numberflat;
        // $floor=$request->floor;

        // $flats = Auth::guest() ? Flat::where('status','Free')->where(function ($query) use ($rooms,$numberflat,$floor) {
        //     if(trim($rooms)!=='') $query->where('rooms',$rooms);
        //     if(trim($numberflat)!=='') $query->where('numberflat',$numberflat);
        //     if(trim($floor)!=='') $query->where('floor',$floor);
        // })->paginate(8) : Flat::where(function ($query) use ($rooms,$numberflat,$floor) {
        //     if(trim($rooms)!=='') $query->where('rooms',$rooms);
        //     if(trim($numberflat)!=='') $query->where('numberflat',$numberflat);
        //     if(trim($floor)!=='') $query->where('floor',$floor);
        // })->paginate(8);
        // return view('welcome',['flats'=>$flats]);
        return view('welcome',['flats'=>[]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addflat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlatRequest $request)
    {
        Appartment::create($request->validated());
        return redirect()->route('appartment.create')->with('successed','Apartment added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
