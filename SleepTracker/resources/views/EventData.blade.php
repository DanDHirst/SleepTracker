@extends('layout.sidebar')
@extends('layout.footer')
@extends('layouts.app')
@section('content')
@section('sidebar')
    @if(!Auth::check())
        <script>
            window.location.href = '{{url("home")}}';
        </script>
    @endif
    <div class="container" id="content">
        <div class="card-deck">
            <div class="card bg-dark text-white" id="sleepTable" style="width: 700px">
                <div class="card-header">Recorded Sleep</div>
                <table class="table-borderless text-white">
                    <thead>
                    <tr>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($Sleeps != null)
                        @foreach($Sleeps as $Sleep)
                            <tr>
                                <td>{{$Sleep->Sleep_Start}}</td>
                                <td>{{$Sleep->Sleep_End}}</td>
                                <td>{{$Sleep->Sleep_Notes}}</td>
                                <td>
                                    <a class="fas fa-times-circle text-danger" aria-hidden="true" onclick="deleteSleep({{$Sleep->Sleep_ID}})"></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>

                </table>
            </div>
            <div class="card bg-dark text-white" id="eventTable" style="width: 700px">
                <div class="card-header">Recorded Events</div>
                <table class="table-borderless text-white">
                    <thead>
                    <tr>
                        <th scope="col" class="p-3">Title</th>
                        <th scope="col" class="p-3">Description</th>
                        <th scope="col" class="p-3">Start Time</th>
                        <th scope="col" class="p-3">End Time</th>
                        <th scope="col" class="p-3">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($Events != null)
                        @foreach($Events as $Event)
                            <tr>
                                <td class="p-3">{{$Event->title}}</td>
                                <td class="p-3">{{$Event->description}}</td>
                                <td class="p-3">{{$Event->start_time}}</td>
                                <td class="p-3">{{$Event->end_time}}</td>

                                <td>
                                    <a class="fas fa-edit text-primary" aria-hidden="true" onclick="editEvent({{$Event->id}})"></a>
                                </td>
                                <td>
                                    <a class="fas fa-times-circle text-danger" aria-hidden="true" onclick="deleteEvent({{$Event->id}})"></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>

                </table>
            </div>
        </div>
        <br>
        <button type="button" id="addEvent" class="btn btn-light" data-toggle="modal" data-target="#addSleepModal" style="width: 49.5%; height: 50px">
            <i class="fas fa-plus"></i>
            <span>Add Sleep</span>
        </button>
        <button type="button" id="addEvent" class="btn btn-light" data-toggle="modal" data-target="#addEventModal" style="width: 50%; height: 50px">
            <i class="fas fa-plus"></i>
            <span>Add Event</span>
        </button>

        <!-- Sleep Modal -->
        <div class="modal fade" id="addSleepModal" tabindex="-1" role="dialog" aria-labelledby="sleepModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sleepModalLabel">Add Sleep</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="SleepData" class="login-form">
                            @csrf

                            <div class="form-group text-center">
                                <p><span>Please input Sleep details below</span></p>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <label for="Start-Time">Start Time:</label>
                                <input type="datetime-local" id="startTime" name="startTime" class="form-control" required>

                            </div>
                            <div class="form-group">
                                <label for="End-Time">End Time:</label>
                                <input type="datetime-local" id="endTime" name="endTime" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Notes">Additional Notes:</label>
                                <input type="text" id="notes" name="notes" class="form-control" >
                            </div>
                            <div class="form-group">
                                <button type="submit" name="addBtn" id="addBtn" class="mt-6 btn btn-dark pull-right">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Modal -->
        <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Add Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="EventData" class="login-form">
                            @csrf

                            <div class="form-group text-center">
                                <p><span>Please input Event details below</span></p>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" id="title" name="title" placeholder="Event title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <input type="text" id="description" name="description" placeholder="Event description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Start-Time">Start Date:</label>
                                <input type="datetime-local" id="startDate" name="startDate" class="form-control" required>

                            </div>
                            <div class="form-group">
                                <label for="End-Time">End Date:</label>
                                <input type="datetime-local" id="endDate" name="endDate" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button style="" type="submit" name="addBtn" id="addBtn" class="mt-6 btn btn-dark pull-right">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <form id="deleteEvent" method="POST" action="" hidden>
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <div class="form-group">
            <input id="deleteEventBtn" type="submit" class="btn btn-danger delete-user" value="Delete user" hidden>
        </div>
    </form>
    <form id="deleteSleep" method="POST" action="" hidden>
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <div class="form-group">
            <input id="deleteSleepBtn" type="submit" class="btn btn-danger delete-user" value="Delete user" hidden>
        </div>
    </form>
@section('footer')

    <script>
        function deleteEvent(userID) {
            document.getElementById("deleteEvent").action = "EventData/"+userID;
            document.getElementById("deleteEventBtn").click();
        }


        function deleteSleep(userID) {
            document.getElementById("deleteSleep").action = "SleepData/"+userID;
            document.getElementById("deleteSleepBtn").click();
        }
    </script>
