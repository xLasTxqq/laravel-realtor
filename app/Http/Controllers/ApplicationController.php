<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\FlatRequest;
use App\Models\Application;
use App\Models\Flat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function create()
    {
    return view('addapplication');
    }

    public function add(ApplicationRequest $request){
        $agreedate=$request->status==='Customer'? now() : null;
        Application::create([
            'fullname' => $request->fullname,
            'number' => $request->number,
            'dateapplication' => $request->dateapplication,
            'numberhouse' => $request->numberhouse,
            'numberflat' => $request->numberflat,
            'comment1' => $request->comment1,
            'status' => $request->status,
            'datemeeting' => $request->datemeeting,
            'comment2' => $request->comment2,
            'agreedate' => $agreedate,
        ]);
        return back();
    }
    public function all(Request $request){
        $status=$request->status;
        $dateapplication=$request->dateapplication;
        $fullname=$request->fullname;
        $applications=Application::where(function ($query) use ($status,$dateapplication,$fullname) {
                if(trim($status)!=='') $query->where('status',$status);
                if(trim($dateapplication)!=='') $query->where('dateapplication',$dateapplication);
                if(trim($fullname)!=='') $query->where('fullname',$fullname);
            })->paginate(8);

        return view('applications',['applications'=>$applications]);
    }
}
