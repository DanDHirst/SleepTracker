@extends('layout.sidebar')
@extends('layout.footer')
@extends('layouts.app')
@section('content')
@section('sidebar')
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
                                    <a class="fas fa-times-circle text-danger" aria-hidden="true" onclick="deleteUser({{$Users->id}})"></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <form id="deleteUser" method="POST" action="" hidden>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <div class="form-group">
                <input id="deleteUserBtn" type="submit" class="btn btn-danger delete-user" value="Delete user" hidden>
            </div>
        </form>
    </div>

@section('footer')

    <script>
        function deleteUser(userID) {
            document.getElementById("deleteUser").action = "viewUsers/"+userID;
            document.getElementById("deleteUserBtn").click();
        }
    </script>

