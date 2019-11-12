        <div id="chart-container">
        <canvas id="oilChart"></canvas>
    </div>
    <br>

    <div id="chart-container1">
        <canvas id="oilChart1"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph1();
        });
        


        function showGraph1()
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
                        data: [133.3, 86.2, 52.2],
                        datasets: [
                            {
                                label: 'Estudiantes',
                                backgroundColor: [
                                                    "#FF4F33",
                                                    "#FFCA33",
                                                    "#337DFF"
                                                ],
                                borderColor: '#CCCCC',
                                hoverBackgroundColor: '#CCCCC',
                                hoverBorderColor: '#666666',
                                data: cantidad
                            }
                        ]
                    };

                    var graphTarget = $("#oilChart");

                    var pieGraph = new Chart(graphTarget, {
                        type: 'pie',
                        //doughnut
                        data: chartdata
                    });
                });
            }
        }

        </script>