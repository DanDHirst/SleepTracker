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
            <div class="card bg-dark text-white">
                <div class="card-header">
                    <a style="font-size: 20px">Add Sleep</a>
                </div>
                <div class="card-body">
                    <form method="post" action="SleepData" class="login-form">
                        @csrf

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
            <div class="card bg-dark text-white" id="sleepTable">
                <div class="card-header">Recorded Sleep</div>
                <table class="table-borderless text-white">
                    <thead>
                    <tr>
                        <th scope="col">Sleep Start</th>
                        <th scope="col">Sleep End</th>
                        <th scope="col">Sleep Notes</th>
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
        </div>
    </div>
    <form id="deleteSleep" method="POST" action="" hidden>
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <div class="form-group">
            <input id="deleteSleepBtn" type="submit" class="btn btn-danger delete-user" value="Delete user" hidden>
        </div>
    </form>
    @section('footer')


        <script>
        function deleteSleep(userID) {
            document.getElementById("deleteSleep").action = "SleepData/"+userID;
            document.getElementById("deleteSleepBtn").click();
        }
        </script>

