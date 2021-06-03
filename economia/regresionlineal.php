<html>
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <title>Regresión lineal</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>
	<script type="text/javascript">
		$("#btnPrueba").click(function(){
			prueba();
		});
		
		function prueba(){
	    Highcharts.chart('contenedor ', {
	          title: {
	            text: 'Scatter plot with regression line'
	          },
	          xAxis: {
	            min: -0.5,
	            max: 5.5
	          },
	          yAxis: {
	            min: 0
	          },
	          series: [{
	            type: 'line',
	            name: 'Regression Line',
	            data: [[0, 1.11], [5, 4.51]],
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
	            name: 'Observations',
	            data: [],
	            marker: {
	              radius: 4
	            }
	          }]
	        });    
	}
	</script>

	<?php require "menueconomia.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Sitema Contable ITT2</h1></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active">Pagina Principal</li>
		</ol>
		<!--Contenido dentro del div con margen-->
		<div class="text-center">
        <div class="btn-group" role="group" aria-label="">
            <button id="btnPrueba" type="button" class="btn btn-danger">Gráfico de Prueba</button>            
        </div>
      	</div>
      	<!--En este container se muestran los gráficos-->
        <div id="contenedor" style="min-width: 320px; height: 400px; margin: 0 auto"></div>
              
      	<!--Modal para gráficos-->    
        <div id="modal-1" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
             <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>        
                <div class="modal-body"> 
                	
                <figure class="highcharts-figure">
	            <div id="contenedor"></div>
	            <p class="highcharts-description">
	                Chart showing how a line series can be used to show a computed
	                regression line for a dataset. The source data for the regression line
	                is visualized as a scatter series.
	            </p>
        		</figure>
                </div>                    
        </div>
        </div>
        </div>

	<!---->
	   	</main>
		</div>
		</div>
 		<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="pluggins/Highcharts_7.0.3/code/highcharts.js"></script>
        <script src="pluggins/Highcharts_7.0.3/code/modules/exporting.js"></script>
        <script src="pluggins/Highcharts_7.0.3/code/modules/export-data.js"></script>        
        
        <script src="pluggins/Highcharts_7.0.3/code/modules/drilldown.js"></script>
	</body>
</html>