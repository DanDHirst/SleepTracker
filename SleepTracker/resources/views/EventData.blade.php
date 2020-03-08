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
                    <a style="font-size: 20px">Add Event</a>
                </div>
                <div class="card-body">
                    <form method="post" action="CHANGE THIS" class="login-form">
                        @csrf

                        <div class="form-group text-center">
                            <p><span>Please input Event details below</span></p>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <label for="Start-Time">Start Date:</label>
                            <input type="datetime-local" id="startDate" name="startDate" value="2018-06-12T19:30" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label for="End-Time">End Date:</label>
                            <input type="datetime-local" id="endDate" name="endDate" class="form-control" value="2018-06-12T21:30" required>
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
            <div class="card bg-dark text-white" id="eventTable">
                <div class="card-header">Events</div>
                <table class="table-borderless text-white">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($Events != null)
                        @foreach($Events as $Event)
                            <tr>
                                <td>alert({{$Event->title}})</td>

                                <td>
                                    <a class="fas fa-times-circle text-danger" aria-hidden="true" onclick="deleteUser({{$Event->id}})"></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@section('footer')

