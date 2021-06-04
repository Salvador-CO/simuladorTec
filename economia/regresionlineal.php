<?php include("../conexion.php"); 

?>
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
		<script>
    		$(function(){	
				$("#adicional").on('click', function(){
					$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
				});		
				$(document).on("click",".eliminar",function(){
					var parent = $(this).parents().get(0);
					$(parent).remove();
				});
			});
				
		</script>
		<style type="text/css">
		    .tablaDiario{
		      margin-left: 30%;
		      margin-right: 50%;
		      width: 40%;
		      
		    }
		    td{
		      border-bottom:  #000  2px;
		    }
		    #tcargo{
		      border-top: 1px solid;
		    } 
		    .tablaiva{
		    	width: 100%;
		    }
	  	</style>

	</head>
	<?php require "menueconomia.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Sitema Contable ITT2</h1></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active">Pagina Principal</li>
		</ol>
	<!-- tabla input muestras -->
	<?php
        $sql ="SELECT * FROM regresion";
        $consulta = mysqli_query($conexion, $sql);
        if($consulta->num_rows === 0) {
        ?>
	<table align="center">
		<thead>
			<th>Ingresa el número de muestras:</th>
			
		</thead>
		<tbody>
		<tr>
			<form action="regresionlineal.php" method="POST">
				<td><p><input type="text" name="numero" class="form-control" placeholder="Número de muestras" /></p></td>
				<td><p>&nbsp;<input type="submit" value="Agregar" class="btn btn-primary"/></p></td>
			</form>
		</tr>
		</tbody>
	</table>
	<?php } ?>


	<!-- formularios para llenar tabla -->
	<form method="POST" action="datos/insertar.php" >
		<?php
            $sql ="SELECT * FROM regresion";
            $consulta = mysqli_query($conexion, $sql);
            if($consulta->num_rows === 0) {
            ?>
		<table align="center" id="tabla">
			<?php
			if(isset($_POST['numero'])){
				$a = $_POST['numero'];
			}else{
				$a = 0;
			}
			for ($i=0; $i < $a ; $i++) { 
						
			?>
			<thead>
				<th colspan="2">Ingresa el año:</th>
				<th>Ingresa la demanda:</th>
			</thead>
			<tbody>
				<tr>
					<td><input type="text" name="fecha[]" class="form-control" placeholder="Año"/></td>
					<td><input type="text" name="valor1[]" class="form-control" placeholder="Año" value="<?php echo $i ?>"/></td>
					<td><input type="text" name="valor2[]" class="form-control" placeholder="Demanda"/></td>
					<td><input type="text" name="nom_us[]" class="form-control" placeholder="nombre de usuario" hidden="true"/></td>
				</tr>
			</tbody>
			<?php } ?>
		</table>
	
	<br>
	<div class="btn-der" align="center">
		<input type="submit" name="insertar" value="Insertar" class="btn btn-info"/>	
	</div>
<?php }else{
		echo " ";
	} ?>
	</form>

	<!-- tabla datos insertados -->
	<div class="tablaDiario">
	<table class="table table-hover" align="center">
		<?php
            $sql ="SELECT * FROM regresion";
            $consulta = mysqli_query($conexion, $sql);
            if($consulta->num_rows === 0) {
            	
            }else{
        ?>
        <thead>
		<tr style="background-color:#3b6c9b; color: #ffff;">
			<th colspan="2" style="border: 1px solid #3b6c9b;"><center>Año</center></th>
			<th style="border: 1px solid #3b6c9b;"><center>Demanda</center></th>
		 </tr>
		</thead>
		<tbody>
		<tr>
		 	<?php
		 	$rownumber=0;
		    while($rowedit = mysqli_fetch_array($consulta)){
		    	$rownumber++;
		    	$fecha = $rowedit["fecha"];
		    	$valor1 = $rowedit["valor1"];
		    	$valor2 = $rowedit["valor2"];
		  	?>
		 	<td style="border: 1px solid #3b6c9b;"><center><?php echo $fecha; ?></center></td>
		 	<td style="border: 1px solid #3b6c9b;"><center><?php echo $valor1; ?></center></td>
		 	<td style="border: 1px solid #3b6c9b;"><center><?php echo $valor2; ?></center></td>
		</tr>
			<?php } }?>
		</tbody>	
	</table>
	</div>


		<!--Contenido dentro del div con margen-->
		<div class="text-center">
        <div class="btn-group" role="group" aria-label="">
            <button id="btnPrueba" type="button" class="btn btn-danger">Gráfica Regresión Lineal</button>            
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