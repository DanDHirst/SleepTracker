@extends('layout.sidebar')
@extends('layout.footer')
@extends('layouts.app')
@section('content')
@section('sidebar')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<div class="container" id="content">
    <div class="card-deck">

        <div class="card mr-4 mb-4 bg-dark text-white" style="width: 300px; height: 320px; min-width: 300px; min-height: 320px">
            <h4 class="card-title" style="padding: 10px">Sleep Target: Past 3 Days</h4>
            <canvas id="3dayChart"></canvas>
            <h4 class="card-footer" style="font-size: 14px">@if($lastThreeTimeMissed !=0 && $lastThreeDaysAmount != 0 ){{ number_format((($lastThreeTimeMissed/ $lastThreeDaysAmount) *100),2) }}%. @else 100% @endif</h4></h4>
        </div>
        <div class="card mr-4 mb-4 bg-dark text-white" style="width: 300px; height: 320px; min-width: 300px; min-height: 320px">
            <h4 class="card-title" style="padding: 10px">Sleep Target: Past 7 Days</h4>
            <canvas id="7dayChart"></canvas>
            <h4 class="card-footer" style="font-size: 14px">@if($lastWeekTimeMissed !=0 && $lastWeekAmount != 0 ){{ number_format((($lastWeekTimeMissed/ $lastWeekAmount) *100),2) }}%. @else 100% @endif</h4>
        </div>
        <div class="card mr-4 mb-4 bg-dark text-white" style="width: 300px; height: 320px; min-width: 300px; min-height: 320px">
            <div class="card-body">
                <h5 class="card-title">Upcoming Event</h5>
                <p class="card-text">Event Data Here</p>
                <a href="EventData" class="btn btn-primary">Go to events</a>
            </div>
        </div>
        <div class="card mr-4 mb-4 bg-dark text-white" style="width: 300px; height: 320px; min-width: 300px; min-height: 320px">
            <div class="card-body">
                <h5 class="card-title">View Sleep Help</h5>
                <p class="card-text">Click below to get information about sleep</p>
                <a href="sleepInfo" class="btn btn-primary">sleep infomation</a>
            </div>
        </div>
    </div>
</div>

<script>
    new Chart(document.getElementById("3dayChart"), {
        type: 'doughnut',
        data: {
            labels: ["Hours Slept", "Hours Missed"],
            datasets: [
                {
                    label: "Population (millions)",
                    backgroundColor: ["#ffe419", "#5e5e5e"],
                    data: [{{$lastThreeDaysAmount}}, {{$lastThreeTimeMissed}}]
                }
            ]
        },
        options: {
            weight: 0,
            title: {
                display: false,
                text: 'Sleep Target: Past 3 Days'
            },
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 14
                }
            }
        }
    });
    new Chart(document.getElementById("7dayChart"), {
        type: 'doughnut',
        data: {
            labels: ["Hours Slept", "Hours Missed"],
            datasets: [
                {
                    label: "Population (millions)",
                    backgroundColor: ["#00cc00", "#5e5e5e"],
                    data: [{{$lastWeekAmount}}, {{$lastWeekTimeMissed}}]
                }
            ]
        },
        options: {
            weight: 0,
            title: {
                display: false,
                text: 'Sleep Target: Past 7 Days'
            },
            legend: {
                labels: {
                    fontColor: "white",
                    fontSize: 14
                }
            }
        }
    });
</script>


