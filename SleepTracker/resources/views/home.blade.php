@extends('layout.sidebar')
@extends('layouts.app')
@section('sidebar')
@section('content')

<div class="container" id="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body bg-dark">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif

                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <form method="post" action="" id="registration" class="login-form">
                                <div class="form-group text-center">
                                    <p><span class="text-white">Account Overview</span></p>
                                </div>
                                <hr/>
                                <div class="form-group w-25">
                                    <label for="username">Username:</label>
                                    <input type="text" id="username" value="{{Auth::user()->name}}" minlength="1" name="username" class="form-control" required>
                                </div>
                                <div class="form-group w-50">
                                    <label for="email">Email:</label>
                                    <input type="text" id="email" value="{{Auth::user()->email}}" minlength="1" name="email" class="form-control" required>
                                </div>
                                <div class="form-group w-25">
                                    <label for="age">Age:</label>
                                    <input type="text" id="age" value="{{Auth::user()->age}}" minlength="1" name="age" class="form-control" required>
                                </div>
                                <div class="form-group w-25">
                                    <label for="country">Country:</label>
                                    <input type="text" id="country" value="{{Auth::user()->country}}" minlength="1" name="country" class="form-control" required>
                                </div>
                                <div class="form-group w-25">
                                    <label for="gender">Gender:</label>
                                    <input type="text" id="gender" value="{{Auth::user()->gender}}" minlength="1" name="gender" class="form-control" required>
                                </div>
                            </form>
                            <form id="deleteUser" method="POST" action="/viewUsers/">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <div class="form-group">
                                    <input id="deleteUserBtn" type="submit" class="btn btn-danger delete-user" value="Delete user">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
