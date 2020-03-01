@extends('layout.sidebar')
@extends('layout.footer')
@section('sidebar')

    <div class="container" id="content" style="width: 40%">
        <div class="card-deck">
            <div class="card bg-dark text-white">
                <div class="card-header">
                    <a style="font-size: 20px">Add Sleep</a>
                </div>
                <div class="card-body">
                    <form method="post" action="addSleep" class="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="UserID">UserID:</label>
                            <input type="text" id="userID" name="userID" class="form-control" value="
                            @if (Auth::check()){{ Auth::user()->id }}@endif" >
                        </div>
                        <div class="form-group text-center">
                            <p><span>Please input Sleep details below</span></p>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <label for="Start-Time">Start Time:</label>
                            <input type="datetime-local" id="startTime" name="startTime" value="2018-06-12T19:30" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label for="End-Time">End Time:</label>
                            <input type="datetime-local" id="endTime" name="endTime" class="form-control" value="2018-06-12T21:30" required>
                        </div>
                        <div class="form-group">
                            <label for="Notes">Additional Notes:</label>
                            <input type="text" id="notes" name="notes" class="form-control" >
                        </div>
                        <div class="form-group">
                            <button style="" type="submit" name="addBtn" id="addBtn" class="mt-6 btn btn-dark">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('footer')

