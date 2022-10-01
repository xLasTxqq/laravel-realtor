<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\ApplicationUpdateRequest;
use App\Models\Appartment;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ApplicationController2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $applications = Application::with('appartment')->where(function ($query) use ($request) {
            if (!empty($request->status)) $query->where('status', $request->status);
            if (!empty($request->created_at)) $query->where('created_at', 'like', $request->created_at . '%');
            if (!empty($request->full_name)) $query->where('full_name', $request->full_name);
        })->paginate(8);
        return view('applications', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Appartment $appartment)
    {
        return view('addapplication', compact('appartment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationRequest $request)
    {
        Application::create($request->validated());
        return redirect()->route('application.create', $request->appartment_id)->with('successed', 'Application has been sent');
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
    public function edit(Application $application)
    {
        return view('edit-application', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationUpdateRequest $request, Application $application)
    {
        $application
            ->update($request->status == 'customer'
                ?
                Arr::add($request->validated(), 'date_of_purchase', now())
                :
                $request->validated());
        return redirect()->route('application.edit', $application->id)->with(
            'successed',
            "Application has been updated"
        );
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
            ->route('application.index')
            ->with(
                'successed',
                Application::destroy($id)
                    ?
                    "Application has been deleted"
                    :
                    "An error occurred and the application was not deleted, please try again"
            );
    }
}
