<!DOCTYPE html>
<html>
<head>
<title>Graficos</title>


<link href="css/grafico_barra.css" rel="stylesheet" media="all">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/Chart.js"></script>


</head>
<body>

    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>
    <br>

    <div id="chart-container1">
        <canvas id="graphCanvas1"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });
        


        function showGraph()
        {
            {
                $.post("validacion_graficos.php",
                function (data)
                {
                    console.log(data);
                    var estado = [];
                    var cantidad = [];

                    for (var i in data) {
                        estado.push(data[i].estado);
                        cantidad.push(data[i].cantidad);
                    }

                    var chartdata = {
                        labels: estado,
                        datasets: [
                            {
                                label: 'Estudiantes',
                                backgroundColor: '#3377FF',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: cantidad
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        //doughnut
                        data: chartdata
                    });
                });
            }
        }

        </script>














 
</body>
</html>