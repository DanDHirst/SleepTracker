@extends('layout.sidebar')
@extends('layout.footer')
@section('sidebar')

<div class="container" style="padding: 60px" id="content">
    <div class="card-deck">
        <div class="card bg-dark text-white" style="height: fit-content">
            <div class="card-header">
                <h2>Login</h2>
            </div>
            <div class="card-body">
                <form method="post" action="" id="registration" class="login-form">
                    <div class="form-group text-center">
                        <p><span>Please input Login details below</span></p>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <label for="logUsername">Username:</label>
                        <input type="text" id="logUsername" placeholder="Username..." minlength="1" name="logUsername" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="logPassword">Password:</label>
                        <input type="password" id="logPassword" placeholder="Password..." minlength="1" name="logPassword" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button style="" type="submit" name="login" id="login" class="mt-6 btn btn-light">Login</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card bg-dark text-white" style="height: fit-content">
            <div class="card-header">
                <h2>Register</h2>
            </div>
            <div class="card-body">
                <form method="post" action="" id="registration" class="login-form">
                    <div class="form-group text-center">
                        <p><span>Please provide registration details below</span></p>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <label for="regEmail">Email:</label>
                        <input type="text" id="regEmail" placeholder="Email..." minlength="1" name="regEmail" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="regUsername">Username:</label>
                        <input type="text" id="regUsername" placeholder="Username..." minlength="1" name="regUsername" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="regPassword">Password:</label>
                        <input type="password" id="regPassword" placeholder="Password..." minlength="1" name="regPassword" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="regEmail">Email:</label>
                        <input type="text" id="regEmail" placeholder="Email..." minlength="1" name="regEmail" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="regCountry">Country:</label>
                        <select id="regCountry" placeholder="Country..." name="regCountry" class="form-control" required>
                            <option value="Other">Other</option>
                            <option value="England">England</option>
                            <option value="Scotland">Scotland</option>
                            <option value="Wales">Wales</option>
                            <option value="North Ireland">North Ireland</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="regQuestion">Security Question:</label>
                        <input type="text" id="regQuestion" placeholder="Question..." name="regQuestion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="regAnswer">Security Answer:</label>
                        <input type="text" id="regAnswer" placeholder="Answer..." name="regAnswer" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="register" id="register" class="btn btn-light">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
