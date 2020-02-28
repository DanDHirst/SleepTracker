<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class ViewSleep extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //first method that will be called when calling the this controller

//        $Sleeps = \App\ViewSleep::all(); // pulls data from model View sleep and stores in an object
//        foreach ($Sleeps as $Sleep){ // iterate through each sleep and echo the sleep ID
//            echo $Sleep->Sleep_ID;
//        }
        $Sleeps = DB::select('call view_user_sleep(2)');


        $sleeps = [];
        $calendar=[];
            foreach ($Sleeps as $key => $value)
            {

                $sleeps[] = Calendar::event(
                    $value->Sleep_Notes,
                    true,
                    new \DateTime($value->Sleep_Start),
                    new \DateTime($value->Sleep_End.'+1 day'),
                    null,
                    // Add color
                    [
                        'color' => '#000000',
                        'textColor' => '#008000',
                    ]
                );
            }

        $calendar = Calendar::addEvents($sleeps);

        return view('Calender', compact('calendar'));
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
