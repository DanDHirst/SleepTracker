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
            <div class="card bg-dark text-white" id="sleepTable" style="min-width: 400px; min-height: 500px">
                <div class="card-header">Recorded Sleep</div>
                <div class="card-body">
                    <table class="table-borderless text-white">
                        <thead>
                        <tr>
                            <th scope="col" class="p-2">Start Time</th>
                            <th scope="col" class="p-2">End Time</th>
                            <th scope="col" class="p-2">Notes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($Sleeps != null)
                            @foreach($Sleeps as $Sleep)
                                <tr>
                                    <td class="p-2">{{$Sleep->Sleep_Start}}</td>
                                    <td class="p-2">{{$Sleep->Sleep_End}}</td>
                                    <td class="p-2">{{$Sleep->Sleep_Notes}}</td>
                                    <td>
                                        <a class="fas fa-edit text-primary" aria-hidden="true" data-toggle="modal" data-target="#editSleepModal"
                                           onclick='showSleep({"SleepID":"{{$Sleep->Sleep_ID}}","start":"{{$Sleep->Sleep_Start}}","end":"{{$Sleep->Sleep_End}}","notes":"{{$Sleep->Sleep_Notes}}"})'></a>
                                    </td>
                                    <td>
                                        <a class="fas fa-times-circle text-danger" aria-hidden="true" data-toggle="modal" data-target="#deleteSleepModal"></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <button type="button" id="addEvent" class="btn btn-light" data-toggle="modal" data-target="#addSleepModal">
                        <i class="fas fa-plus"></i>
                        <span>Add Sleep</span>
                    </button>
                </div>
            </div>


            <div class="card bg-dark text-white" id="eventTable" style="min-width: 400px">
                <div class="card-header">Recorded Events</div>
                <div class="card-body">
                    <table class="table-borderless text-white">
                        <thead>
                        <tr>
                            <th scope="col" class="p-2">Title</th>
                            <th scope="col" class="p-2">Description</th>
                            <th scope="col" class="p-2">Start Time</th>
                            <th scope="col" class="p-2">End Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($Events != null)
                            @foreach($Events as $Event)
                                <tr>
                                    <td class="p-2">{{$Event->title}}</td>
                                    <td class="p-2">{{$Event->description}}</td>
                                    <td class="p-2">{{$Event->start_time}}</td>
                                    <td class="p-2">{{$Event->end_time}}</td>

                                    <td>
                                        <a class="fas fa-edit text-primary" aria-hidden="true" data-toggle="modal" data-target="#editEventModal" onclick='showEvent({"id":"{{$Event->id}}","title":"{{$Event->title}}","desc":"{{$Event->description}}","start":"{{$Event->start_time}}", "end":"{{$Event->end_time}}" })'></a>
                                    </td>
                                    <td>
                                        <a class="fas fa-times-circle text-danger" aria-hidden="true" data-toggle="modal" data-target="#deleteEventModal"></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <button type="button" id="addEvent" class="btn btn-light" data-toggle="modal" data-target="#addEventModal">
                        <i class="fas fa-plus"></i>
                        <span>Add Event</span>
                    </button>
                </div>
            </div>
        </div>

        <div id="deleteSleepModal" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Sleep?</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this sleep?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-light" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn-danger" onclick="deleteSleep({{$Sleep->Sleep_ID}})">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="deleteEventModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteEventModalLabel">Delete Event?</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this event?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-light" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn-danger" onclick="deleteEvent({{$Event->id}})">Delete</button>
                    </div>
                </div>
            </div>
        </div>


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
                                <input type="time" id="Start-Time" value = '' class="form-control" oninput="combineDateTime('Start-Time','Start-Date', 'startTime')"  required>
                                <label for="Start-date">Start date:</label>
                                <input type="date" id="Start-Date"  class="form-control" value="" oninput="combineDateTime('Start-Time','Start-Date', 'startTime')" required>
                                <label for="Start-Time">Combined:</label>
                                <input type="datetime-local" id="startTime" name="startTime" class="form-control" required  readonly>

                            </div>
                            <div class="form-group">
                                <label for="End-Time">End Time:</label>
                                <input type="time" id="End-Time" value = '' class="form-control" oninput="combineDateTime('End-Time','End-Date', 'endTime')"  required>
                                <label for="Start-date">End Date:</label>
                                <input type="date" id="End-Date"  class="form-control" value="" oninput="combineDateTime('End-Time','End-Date', 'endTime')" required>
                                <label for="Start-Time">Combined:</label>
                                <input type="datetime-local" id="endTime" name="endTime" class="form-control" required readonly>

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
                                <label for="Start-Time">Start Time:</label>
                                <input type="time" id="Event-Start-Time" value = '' class="form-control" oninput="combineDateTime('Event-Start-Time','Event-Start-Date', 'startDate')"  required>
                                <label for="Start-date">Start date:</label>
                                <input type="date" id="Event-Start-Date"  class="form-control" value="" oninput="combineDateTime('Event-Start-Time','Event-Start-Date', 'startDate')" required>
                                <label for="Start-Time">Combined:</label>
                                <input type="datetime-local" id="startDate" name="startDate" class="form-control" required readonly>

                            </div>
                            <div class="form-group">
                                <label for="End-Time">End Time:</label>
                                <input type="time" id="Event-End-Time" value = '' class="form-control" oninput="combineDateTime('Event-End-Time','Event-End-Date', 'endDate')"  required>
                                <label for="Start-date">End Date:</label>
                                <input type="date" id="Event-End-Date"  class="form-control" value="" oninput="combineDateTime('Event-End-Time','Event-End-Date', 'endDate')" required>
                                <label for="Start-Time">Combined:</label>
                                <input type="datetime-local" id="endDate" name="endDate" class="form-control" required readonly>
                            </div>
                            <div class="form-group">
                                <button style="" type="submit" name="addBtn" id="addBtn" class="mt-6 btn btn-dark pull-right">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Sleep Modal -->
        <div class="modal fade" id="editSleepModal" tabindex="-1" role="dialog" aria-labelledby="sleepModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sleepModalLabel">Edit Sleep</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="SleepData" class="login-form">
                            @csrf
                            <input type="datetime-local" id="Method" name="Update" class="form-control" value="true" hidden>
                            <div class="form-group text-center">
                                <p><span>Edit Sleep details below</span></p>
                            </div>
                            <input type="datetime-local" id="SleepID" name="SleepID" class="form-control" required readonly >
                            <hr/>
                            <div class="form-group">
                                <label for="Start-Time">Start Time:</label>
                                <input type="datetime-local" id="SleepStartTime" name="startTime" class="form-control" required>

                            </div>
                            <div class="form-group">
                                <label for="End-Time">End Time:</label>
                                <input type="datetime-local" id="SleepEndTime" name="endTime" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Notes">Additional Notes:</label>
                                <input type="text" id="NewSleepNotes" name="notes" class="form-control" >
                            </div>
                            <div class="form-group">
                                <button type="submit" name="addBtn" id="addBtn" class="mt-6 btn btn-dark pull-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Event Modal -->
        <div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Edit Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="EventData" class="login-form">
                            @csrf
                            <input type="datetime-local" id="Method" name="Update" class="form-control" value="true" hidden>
                            <div class="form-group text-center">
                                <p><span>Edit Event details below</span></p>
                            </div>
                            <input type="datetime-local" id="EventID" name="EventID" class="form-control" required readonly >
                            <hr/>
                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" id="EventTitle" name="title" placeholder="Event title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <input type="text" id="EventDescription" name="description" placeholder="Event description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Start-Time">Start Date:</label>
                                <input type="datetime-local" id="EventStartDate" name="startDate" class="form-control" required>

                            </div>
                            <div class="form-group">
                                <label for="End-Time">End Date:</label>
                                <input type="datetime-local" id="EventEndDate" name="endDate" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button style="" type="submit" name="addBtn" id="addBtn" class="mt-6 btn btn-dark pull-right">Edit</button>
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
        function showSleep(sleep){
            document.getElementById("SleepID").value = sleep.SleepID;
            document.getElementById("SleepStartTime").value = sleep.start;
            document.getElementById("SleepEndTime").value = sleep.end;
            document.getElementById("NewSleepNotes").value = sleep.notes;
        }
        function showEvent(event){
            document.getElementById("EventID").value = event.id;
            document.getElementById("EventTitle").value = event.title;
            document.getElementById("EventDescription").value = event.desc;
            document.getElementById("EventStartDate").value = event.start;
            document.getElementById("EventEndDate").value = event.end;
        }
        function combineDateTime(time, date, dateTime){
            let NewTime = document.getElementById(date).value +"T"+ document.getElementById(time).value;
            document.getElementById(dateTime).value = NewTime;
        }
    </script>
