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
            <div class="card bg-dark text-white" id="editUser">
                <div class="card-header">Update User Records</div>
                <form>
                    <div class="form-group">
                        <label for="id">ID:</label>
                        <input type="text" id="id" value="" name="id" class="form-control w-auto" required>
                        <label for="name">Name</label>
                        <input type="text" id="name" value="" name="name" class="form-control w-auto" required>
                        <label for="email">Email</label>
                        <input type="text" id="email" value="" name="email" class="form-control w-auto" required>
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
                        <input type="submit" id="submitUpdate" value="Update" name="submitUpdate" class="mt-6 btn btn-dark">
                    </div>

                </form>
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

