
<!-- calendar.blade.php -->

{{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

<body>
<div class="container" id="content">
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <div class="card-deck">
        <div class="card bg-dark text-white" style="width: 540px; min-width: 540px">
            <a class="card-header" style="font-size: 20px">
                View Previous Nights Sleep
            </a>
            <div class="card-body">
                <div class="panel panel-default">
                    <div class="panel-body text-dark" id="calendar">
                        {!! $calendar->calendar() !!}
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <label for="selectDate">Select Date:</label>
                <input type="date" id="selectDate" name="selectDate">
            </div>
        </div>
        <div class="card bg-dark text-white">
            <div class="card-header">
                <a style="font-size: 20px">Add Sleep</a>
            </div>
            <div class="card-body">
                <form method="post" action="addSleep" class="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="UserID">UserID:</label>
                        <input type="text" id="userID" name="userID" class="form-control" >
                    </div>
                    <div class="form-group text-center">
                        <p><span>Edit/View Sleep details below</span></p>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
</body>

@extends('layout.sidebar')
