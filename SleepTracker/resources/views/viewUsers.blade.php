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
                                    <button class="btn btn-info" onclick="showUser({{$Users}})">Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="card bg-dark text-white" id="editUser">
                <div class="card-header">Update User Records</div>
                <form method="post" action="viewUsers">
                    @csrf
                    <div class="form-group">
                        <label for="id">ID:</label>
                        <input type="text" id="id" value="" name="id" class="form-control w-auto" required readonly>
                        <label for="name">Name</label>
                        <input type="text" id="name" value="" name="name" class="form-control w-auto" required>
                        <label for="email">Email</label>
                        <input type="email" id="email" value="" name="email" class="form-control w-auto" required>
                        <label for="country">Country</label>
                        <select id="country" value="" name="country" class="form-control" style="width: auto" required>
                            <option value="Other">Other</option>
                            <option value="England">England</option>
                            <option value="Scotland">Scotland</option>
                            <option value="Wales">Wales</option>
                            <option value="North Ireland">North Ireland</option>
                        </select>
                        <label for="age">Age</label>
                        <input type="number" id="age" value="" name="age" class="form-control" style="width: auto" required>
                        <label for="gender">Gender</label>
                        <select id="gender" value="" name="gender" class="form-control" style="width: auto" required>
                            <option value="Other">Other</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select><br>
                        <input type="submit" id="submitUpdate" value="Update" class="mt-6 btn btn-danger">
                    </div>

                </form>
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

        function showUser(User){
            document.getElementById("id").value = User.id;
            document.getElementById("name").value = User.name;
            document.getElementById("email").value = User.email;
            document.getElementById("country").value = User.country;
            document.getElementById("age").value = User.age;
            document.getElementById("gender").value = User.gender;

        }

        function deleteUser(userID) {
            document.getElementById("deleteUser").action = "viewUsers/"+userID;
            document.getElementById("deleteUserBtn").click();
        }
    </script>

