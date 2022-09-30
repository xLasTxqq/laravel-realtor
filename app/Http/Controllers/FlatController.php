<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlatRequest;
use App\Models\Application;
use App\Models\Flat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlatController extends Controller
{

    public function create()
    {
        return view('addflat');
    }

    public function add(FlatRequest $request){
        Flat::create([
            'numberhouse' => $request->numberhouse,
            'floor' => $request->floor,
            'numberflat' => $request->numberflat,
            'rooms' => $request->rooms,
            'area' => $request->area,
            'livingspace' => $request->livingspace,
            'cost' => $request->cost,
            'status' => $request->status,
            'booked' => $request->booked,
            'purchasedname' => $request->purchasedname,
            'purchasedphone' => $request->purchasedphone,

        ]);
        return back();
    }
    public function all(Request $request){
        $rooms=$request->rooms;
        $numberflat=$request->numberflat;
        $floor=$request->floor;

        $flats = Auth::guest() ? Flat::where('status','Free')->where(function ($query) use ($rooms,$numberflat,$floor) {
            if(trim($rooms)!=='') $query->where('rooms',$rooms);
            if(trim($numberflat)!=='') $query->where('numberflat',$numberflat);
            if(trim($floor)!=='') $query->where('floor',$floor);
        })->paginate(8) : Flat::where(function ($query) use ($rooms,$numberflat,$floor) {
            if(trim($rooms)!=='') $query->where('rooms',$rooms);
            if(trim($numberflat)!=='') $query->where('numberflat',$numberflat);
            if(trim($floor)!=='') $query->where('floor',$floor);
        })->paginate(8);

        return view('welcome',['flats'=>$flats]);
    }
}
