@extends('layout.sidebar')
@extends('layout.footer')
@section('sidebar')

<div class="card bg-dark text-white" id="content">
    <div class="card-body">
        <form method="post" action="" id="registration" class="login-form">
            <div class="form-group text-center">
                <p><span class="text-white">Account Overview</span></p>
            </div>
            <hr/>
            <div class="form-group w-25">
                <label for="username">Username:</label>
                <input type="text" id="username" placeholder="" minlength="1" name="username" class="form-control" required>
            </div>
            <div class="form-group w-50">
                <label for="email">Email:</label>
                <input type="text" id="email" placeholder="" minlength="1" name="email" class="form-control" required>
            </div>
            <div class="form-group btn-group-vertical">
                <label for="password">Password:</label>
                <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#passwordReveal" aria-expanded="false" aria-controls="passwordReveal">
                    Reveal Password
                </button>
                <div class="collapse" id="passwordReveal">
                    <div class="card card-body bg-dark">
                        Example Password
                    </div>
                </div>
            </div>
            <div class="form-group w-25">
                <label for="age">Age:</label>
                <input type="text" id="age" placeholder="" minlength="1" name="age" class="form-control" required>
            </div>
            <div class="form-group w-25">
                <label for="gender">Gender:</label>
                <select class="form-control" id="genderSelect">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="form-group w-50">
                <label for="secQuestion">Security Question:</label>
                <input type="text" id="age" placeholder="" minlength="1" name="secQuestion" class="form-control" required>
            </div>
            <div class="form-group btn-group-vertical">
                <label for="secAnswer">Security Answer:</label>
                <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#secAnsReveal" aria-expanded="false" aria-controls="passwordReveal">
                    Reveal Security Answer
                </button>
                <div class="collapse" id="secAnsReveal">
                    <div class="card card-body bg-dark">
                        Example Security Answer
                    </div>
                </div>
            </div>
{{--            <div class="form-group">
                <button style="" type="submit" name="save" id="login" class="mt-6 btn btn-dark">Save</button>
            </div>--}}
        </form>
    </div>
</div>
