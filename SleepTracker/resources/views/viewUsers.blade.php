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
            <div class="card bg-dark text-white scroll" id="userTable">
                <div class="card-header">User Records</div>
                <table class="table-borderless text-white">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Country</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($Users != null)
                        @foreach($Users as $Users)
                            <tr>
                                <td>{{$Users->id}}</td>
                                <td>{{$Users->name}}</td>
                                <td>{{$Users->email}}</td>
                                <td>{{$Users->country}}</td>
                                <td>{{$Users->age}}</td>
                                <td>{{$Users->gender}}</td>
                                <td>
                                    <a class="fas fa-times-circle text-danger" aria-hidden="true"></a>
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

    <script>
        function deleteSleep(userID) {
            document.getElementById("deleteSleep").action = "SleepData/"+userID;
            document.getElementById("deleteSleepBtn").click();
        }
    </script>

