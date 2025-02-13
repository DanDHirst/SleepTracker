<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class SleepData extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Sleeps = null;
        if(Auth::check()) {
            $SleepID = Auth::user()->id;
        }
        $Sleeps = DB::select('call view_user_sleep(?)',[$SleepID]);
        return view('SleepData',compact('Sleeps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "Create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;

        if($request->Update){
            DB::select('CALL update_sleep(?,?,?,?)',[$request->SleepID,$request->notes,$request->startTime,$request->endTime]);
            return redirect('SleepData');
        }
        else{
            $sleep = new Sleep(Auth::user()->id,$request->notes,$request->startTime,$request->endTime);
            $sleep->save();
            return redirect('SleepData');
        }


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
        return "show";
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
        DB::select("CALL drop_sleeps(?)", [$id]);
        return redirect('SleepData');

    }
}
