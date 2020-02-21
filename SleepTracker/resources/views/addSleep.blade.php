@extends('layout.sidebar')
@section('sidebar')

    <div class="container" style="padding: 60px">
        <div class="card-deck">
            <div class="card bg-basic">
                <div class="card-header">
                    <h2>Add Sleep</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="addSleep" id="registration" class="login-form">
                        <div class="form-group text-center">
                            <p><span>Please input Sleep details below</span></p>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <label for="email">Start Time:</label>
                            <input type="datetime-local" id="startTime" name="startTime" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label for="postcode">End Time:</label>
                            <input type="datetime-local" id="endTime" name="endTime" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="postcode">Additional Notes:</label>
                            <input type="text" id="notes" name="notes" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button style="" type="submit" name="addBtn" id="addBtn" class="mt-6 btn btn-dark">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('footer')

