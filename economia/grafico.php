<?php
    session_start();
    $nombre = $_SESSION['nombre'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    include("../conexion.php");
?>
<html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>
        <link rel="icon" type="image/png" sizes="192x192"  href="../iconos/tecnm.png">
        

		<style type="text/css">
        #container {
            height: 400px; 
        }

        .highcharts-figure, .highcharts-data-table table {
            min-width: 310px; 
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        .highcharts-data-table th {
        	font-weight: 600;
            padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

		</style>
	</head>
	<body>
<script src="code/highcharts.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>
<script src="code/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
</figure>
        

		<script type="text/javascript">
        Highcharts.chart('container', {
            title: {
                text: 'Gráfico de dispersión con línea de regresión'
            },
            xAxis: {
                min: 0,
                max: 5.5
            },
            yAxis: {
                min: 0
            },
            series: [{
                type: 'line',
                name: 'Línea de regresión',
                data: [[0, 
                <?php
                $sql ="SELECT MIN(`valor2`) AS minimo FROM `regresion` WHERE `nom_us`='$nombre'";
                $res = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_array($res)){
                    $min = $row['minimo'];
                    echo $min;
                }
                ?>
                ], [
                <?php
                $sql ="SELECT MAX(`valor1`) AS max FROM `regresion` WHERE `nom_us`='$nombre'";
                $res = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_array($res)){
                    $max = $row['max'];
                    echo $max;
                }
                ?>
                , <?php
                $sql ="SELECT MAX(`valor2`) AS max1 FROM `regresion` WHERE `nom_us`='$nombre'";
                $res = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_array($res)){
                    $max1 = $row['max1'];
                    echo $max1;
                }
                ?>]],
                marker: {
                    enabled: false
                },
                states: {
                    hover: {
                        lineWidth: 0
                    }
                },
                enableMouseTracking: false
            }, {
                type: 'scatter',
                name: 'Muestras',
                data: [
                <?php
                $sql ="SELECT * FROM regresion WHERE nom_us= '$nombre'";
                $resulta = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_array($resulta)){
                    $numero = $row['valor2'];
                    echo $numero.",";
                }
                ?>
                ],
                marker: {
                    radius: 4
                }
            }]
        });
		</script>
        
        </body>
</html>
