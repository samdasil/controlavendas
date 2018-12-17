<?php require_once 'cabecalho.php'; ?>

<!-- Main Content -->
<div class="page-wrapper">

    <div class="container pt-30">

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-default border-panel card-view">

                    <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="1076" height="454" style="display: block; width: 1076px; height: 454px;"></canvas>

                </div>

            </div>
        
        </div>

    </div>

</div>

<script src="./assets/dist/js/Chart.min.js.download"></script>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        datasets: [{
        data: [2000, 21345, 18483, 24003, 23489, 24092, 50],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
        }]
    },
    options: {
        scales: {
        yAxes: [{
            ticks: {
            beginAtZero: false
            }
        }]
        },
        legend: {
        display: false,
        }
    }
    });
</script>
<?php require_once 'rodape.php'; ?>