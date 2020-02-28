@extends('layout.sidebar')
@extends('layout.footer')
@section('sidebar')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<div class="container" id="content">
    <div class="card-deck">
        <div class="card mr-4 mb-4 bg-dark text-white" style="width: 300px; height: 300px; min-width: 300px; min-height: 300px">
            <h4 class="card-title" style="padding: 10px">Sleep Target: Past 3 Days</h4>
            <canvas id="3dayChart"></canvas>
        </div>
        <div class="card mr-4 mb-4 bg-dark text-white" style="width: 300px; height: 300px; min-width: 300px; min-height: 300px">
            <h4 class="card-title" style="padding: 10px">Sleep Target: Past 7 Days</h4>
            <canvas id="7dayChart"></canvas>
        </div>
        <div class="card mr-4 mb-4" style="width: 300px; height: 300px; min-width: 300px; min-height: 300px">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card mr-4 mb-4" style="width: 300px; height: 300px; min-width: 300px; min-height: 300px">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
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
                    data: [70, 30]
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
                    data: [90, 20]
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


