<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()) {
            $lastThree = DB::select('CALL group_previous(?,?)',[Auth::user()->id,3]); // get the 3 most recent sleeps
            $lastWeek = DB::select('CALL group_previous(?,?)',[Auth::user()->id,7]); // get the 7 most recent sleeps
            $lastWeekAmount = 0; // amount of time slept
            foreach ($lastWeek as $week){ // loop through each day to find the time slept
                $lastWeekAmount += $week->Difference;
            }
            $lastWeekTimeMissed= 0;
            if ($lastWeekAmount < 56){
                $lastWeekTimeMissed = 56 - $lastWeekAmount;
            }
            $lastThreeDaysAmount = 0; // amount of time slept
            foreach ($lastThree as $week){ // loop through each day to find the time slept
                $lastThreeDaysAmount += $week->Difference;
            }
            $lastThreeTimeMissed= 0;
            if ($lastWeekAmount < 24){
                $lastThreeTimeMissed = 24 - $lastThreeDaysAmount;
            }


            return view('dashboard',compact('lastWeekAmount','lastWeekTimeMissed','lastThreeTimeMissed','lastThreeDaysAmount'));
        }
        else{
            return redirect('home');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
