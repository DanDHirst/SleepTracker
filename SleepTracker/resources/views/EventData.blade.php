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
{{--            <div class="card bg-dark text-white">
                <div class="card-header">
                    <a style="font-size: 20px">Add Event</a>
                </div>
                <div class="card-body">
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
                            <button style="" type="submit" name="addBtn" id="addBtn" class="mt-6 btn btn-dark">Add</button>
                        </div>
                    </form>
                </div>
            </div>--}}
            <div class="card bg-dark text-white" id="eventTable" style="height: calc(100vh - 100px)">
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
                                    <a class="fas fa-times-circle text-danger" aria-hidden="true" onclick="deleteEvent({{$Event->id}})"></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>

                </table>
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
@section('footer')

    <script>
        function deleteEvent(userID) {
            document.getElementById("deleteEvent").action = "EventData/"+userID;
            document.getElementById("deleteEventBtn").click();
        }
    </script>
