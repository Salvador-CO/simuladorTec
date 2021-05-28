<html>
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="css/emergente.css">
        <title>Estado de costos de Producción y Venta</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="css/emergente.css">
		<style>
			.p1{

				margin-left: 12%;	
			}

			.b{
				margin-left: 31%;
				padding:1%;	
			}

		</style>
	</head>

	<?php require "menuconta.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Estado de Costos de Producción y Ventas</h1></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active"><b>Instrucciones:</b> En el siguiente apartado se visualiza el Reporte del estado de costos de producción y venta, pudiendo descargarlo en formato "Excel", para así editarlo conforme lo indique el Reactivo Integrador Multidisciplina (RIM). Recuerda que al terminar de realizar tu ejercicio deberás subirlo en formato PDF en el apartado “Carga de archivos”. </li>
		</ol>
		</div>

		<br>
    <!----> 

        <div class="p1">
                <embed src="../anexos/Plantilla_EstadoCPV.pdf" type="application/pdf" width="85%" height="600px" />
        </div>
    <br>

    <div class="b">
    	<a href="pdf/Plantilla_Estado de costos de produccion y venta.xlsx" target="_blank" > <button  title="Plantilla_Estado de costos de produccion y venta.xlsx" type="button" class="btn btn-dark"><i class="fa fa-download"></i> Descargar plantilla de <br>"Estado de costos de producción y venta"</button> </a>   	
    </div>
    <br><br>
			
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
	</body>
</html>