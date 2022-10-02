<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppartmentRequest;
use App\Models\Appartment;
use Illuminate\Http\Request;

class AppartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $appartments = (auth()->check()
            ?
            Appartment::with(['applications' => function ($query) {
                $query->where(['status' => 'processed', 'status' => 'customer']);
            }])
            :
            Appartment::with('applications')->whereDoesntHave('applications', function ($query) {
                $query->where(['status' => 'processed', 'status' => 'customer']);
            }))
            ->where(function ($query) use ($request) {
                if (!empty($request->number_of_rooms)) $query->where('number_of_rooms', $request->number_of_rooms);
                if (!empty($request->appartment_number)) $query->where('appartment_number', $request->appartment_number);
                if (!empty($request->floor)) $query->where('floor', $request->floor);
            })->paginate(8);
        return view('welcome', compact('appartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-appartment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppartmentRequest $request)
    {
        Appartment::create($request->validated());
        return redirect()->route('appartment.create')->with('successed', 'Apartment added successfully');
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
    public function edit(Appartment $appartment)
    {
        return view('create-appartment', compact('appartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AppartmentRequest $request, Appartment $appartment)
    {
        $appartment->update($request->validated());
        return redirect()->route('appartment.edit', $appartment->id)->with('successed', 'Apartment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()
            ->route('appartment.index')
            ->with(
                'successed',
                Appartment::destroy($id)
                    ?
                    "Appartment has been deleted"
                    :
                    "An error occurred and the appartment was not deleted, please try again"
            );
    }
}
