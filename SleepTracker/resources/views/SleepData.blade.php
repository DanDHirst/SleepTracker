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
                    <a style="font-size: 20px">Add Sleep</a>
                </div>
                <div class="card-body">
                    <form method="post" action="addSleep" class="login-form">
                        @csrf

                        <div class="form-group text-center">
                            <p><span>Please input Sleep details below</span></p>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <label for="Start-Time">Start Time:</label>
                            <input type="datetime-local" id="startTime" name="startTime" value="2018-06-12T19:30" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label for="End-Time">End Time:</label>
                            <input type="datetime-local" id="endTime" name="endTime" class="form-control" value="2018-06-12T21:30" required>
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
            <div class="card bg-dark text-white" id="sleepTable">
                <div class="card-header">Recorded Sleep</div>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <a class="fas fa-times-circle text-danger" aria-hidden="true" onclick=""></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>
                            <a class="fas fa-times-circle text-danger" aria-hidden="true" onclick=""></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>
                            <a class="fas fa-times-circle text-danger" aria-hidden="true" onclick=""></a>
                        </td>
                    </tr>
                    </tbody>
{{--                    @if ($Sleeps != null)
                        @foreach($Sleeps as $Sleep)
                        <li>
                           <p>{{$Sleep->id.$Sleep->Sleep_Start.$Sleep->Sleep_End.$Sleep->Sleep_Notes}}</p>

                        </li>
                        @endforeach
                    @endif--}}
                </table>
            </div>
        </div>
    </div>
    @section('footer')

