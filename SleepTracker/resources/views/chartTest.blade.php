<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<canvas id="doughnut-chart" max-width="400" max-height="400"></canvas>


<script>
    new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
            labels: [],
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
                display: true,
                text: 'Sleep Target: Past 3 Days'
            }
        }
    });
</script>
