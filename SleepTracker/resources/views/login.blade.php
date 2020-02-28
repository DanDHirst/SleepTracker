@extends('layout.sidebar')
@extends('layout.footer')
@section('sidebar')

<div class="container" style="padding: 60px" id="content">
    <div class="card-deck">
        <div class="card bg-dark text-white">
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
                        <label for="email">Email:</label>
                        <input type="text" id="email" placeholder="Email..." minlength="1" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="postcode">Postcode:</label>
                        <input type="text" id="postcode" placeholder="Postcode..." minlength="1" name="postcode" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button style="" type="submit" name="login" id="login" class="mt-6 btn btn-light">Login</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card bg-dark text-white">
            <div class="card-header">
                <h2>New Customer?</h2>
            </div>
            <div class="card-body">
                <form method="post" action="" id="registration" class="login-form">
                    <div class="form-group text-center">
                        <p><span>Please provide registration details below</span></p>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <label for="customer_name">Customer Name:</label>
                        <input type="text" id="regCustomer_name" placeholder="Customer Name..." minlength="1" name="regCustomer_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="postcode">Postcode:</label>
                        <input type="text" id="regPostcode" placeholder="Postcode..." minlength="1" name="regPostcode" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" id="regEmail" placeholder="Email..." minlength="1" name="regEmail" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="register" id="register" class="btn btn-light">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
