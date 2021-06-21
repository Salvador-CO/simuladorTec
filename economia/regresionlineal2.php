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
        <link rel="icon" type="image/png" sizes="192x192"  href="../iconos/tecnm.png">
        
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
		    .btn-circle {
	          width: 30px;
	          height: 30px;
	          padding: 6px 0px;
	          border-radius: 15px;
	          text-align: center;
	          font-size: 12px;
	          line-height: 1.42857;
	        }

	  	</style>

	</head>


	<?php require "menueconomia.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Regresión lineal <button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#btnPrueba"><i class="fas fa-question"></i> </button></h1></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active"><b>Instrucciones:</b></li>
		</ol>
	<!-- modal de instruccines -->
        <div id="btnPrueba" class="modal fade" style="z-index: 1400;" data-target="#btnPrueba">
            <div class="modal-dialog modal-lg" role="dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div style="background: #1B396A; color: #fff; height: 75px;padding-left: 40px;">
                            <p><h3 class="modal-title col-11 text-center">Ayuda</h3></p>
                    </div>
                  <div class="modal-body">
                   <!--   contenido -->
                    <iframe src="#" width="100%" height="450px" style="border:0px"></iframe>
                  </div>      
                </div>
            </div>
        </div>
	<!-- tabla input muestras -->
	<?php
        $sql ="SELECT * FROM regresion WHERE nom_us= '$nombre'";
        $consulta = mysqli_query($conexion, $sql);
        if($consulta->num_rows === 0) {
        ?>

	<table align="center">
		<thead>
			<th>Ingresa el número de muestras:</th>
			
		</thead>
		<tbody>
		<tr>
			<div class="alert alert-info alert-dismissible fade show" style="font-size: 14px;" role="alert">
					<ul class="list-unstyled" style="margin-bottom: 0;">
						<li><strong>Nota: </strong>Agrega el numero de muestras a calcular. Debe ser mayor a 1.  </center></li>
		            </ul>
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">×</span>
		            </button>
    			</div>
			<form action="regresionlineal.php" method="POST">
				<td><p><input type="number" name="numero" class="form-control" placeholder="Número de muestras" required pattern="[2-9]{1,5}"></p></td>
				<td><p>&nbsp;<input type="submit" value="Agregar" class="btn btn-primary"/></p></td>
			</form>
		</tr>
		</tbody>
	</table>
	<?php } ?>


	<!-- formularios para llenar tabla -->
	<form method="POST" action="datos/insertar.php" >
		<?php
            $sql ="SELECT * FROM regresion WHERE nom_us= '$nombre'";
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
					<td><input type="text" name="fecha[]" class="form-control" placeholder="Año" required /></td>
					<td><input type="text" name="valor1[]" class="form-control" value="<?php echo $i ?>" required hidden="true"/></td>
					<td><input type="text" name="valor2[]" class="form-control" placeholder="Demanda" required /></td>
					<td><input type="text" name="nom_us[]" class="form-control" placeholder="nombre de usuario" value="<?php echo $nombre; ?>" required hidden="true"/></td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td>
					
					</td>
				</tr>
			</tfoot>
			<?php } ?>
		</table>
		
		<br>
		<div class="btn-der" align="center">
			<input type="submit" name="insertar" value="Insertar" class="btn btn-info"/>	
		</div>
		
	</form>	
	
	<?php } ?>


	<!-- tabla datos insertados -->
	<div class="tablaDiario">
	<table class="table table-hover" align="center">
		<?php
            $sql ="SELECT * FROM regresion WHERE nom_us= '$nombre'";
            $consulta = mysqli_query($conexion, $sql);
            if($consulta->num_rows === 0) {
            	
            }else{
        ?>
        <div class="alert alert-info alert-dismissible fade show" style="font-size: 14px;" role="alert">
			<ul class="list-unstyled" style="margin-bottom: 0;">
				<li><center><strong>Tabulación de las muestras</strong></center></li>
            </ul>
            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button> -->
    	</div>
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
	<?php 
		$sql ="SELECT * FROM regresion WHERE nom_us= '$nombre'";
        $consulta = mysqli_query($conexion, $sql);
         if($consulta->num_rows === 0) {
            	
            }else{
            ?>
			<div align="center">
				<a href="datos/eliminar.php" class="btn btn-danger" style="color: #ffff;">
		            <i class="fas fa-trash-alt"></i>
		        </a>
			</div>
	<?php }	?>
	<br>
	</div>

	<!-- Ecuación resultante de la regresión lineal -->
	<div class="tablaDiario">
	<table class="table" align="center">
		<?php 	
			$sql ="SELECT * FROM regresion WHERE nom_us= '$nombre'";
			$consulta = mysqli_query($conexion, $sql);
			if($consulta->num_rows === 0) {
            	
            }else{
		?>
		<div class="alert alert-info alert-dismissible fade show" style="font-size: 14px;" role="alert">
			<ul class="list-unstyled" style="margin-bottom: 0;">
				<li>Ecuación resultante: <i><strong>y = a.x + b</strong></i>.</li>
            </ul>
    	</div>

		<tbody>
			<?php 
				$sqln = "SELECT COUNT(valor1) AS contar FROM regresion WHERE nom_us= '$nombre'";
				$resulta = mysqli_query($conexion, $sqln);
				while ($row = mysqli_fetch_assoc($resulta)){
					$numero = $row['contar'];
					//echo "N= ".$numero."<br>";
				}
				
				$sqlp1 = "SELECT AVG(valor1) FROM regresion WHERE nom_us= '$nombre'";
				$resulta = mysqli_query($conexion, $sqlp1);
				while ($row1 = mysqli_fetch_assoc($resulta)){
					$va1 = $row1['AVG(valor1)'];
					//echo "x= ".$va1."<br>";
				}
				
				$sqlp2 ="SELECT AVG(valor2) FROM regresion WHERE nom_us = '$nombre'";
				$resultad = mysqli_query($conexion, $sqlp2);
				while ($row = mysqli_fetch_assoc($resultad)){
					$va2 = $row['AVG(valor2)'];
					//echo "y= ".$va2."<br>";
				}
				
				$sqlv3 ="SELECT SUM(valor3) FROM regresion WHERE nom_us= '$nombre'";
				$resultado = mysqli_query($conexion, $sqlv3);
				while ($row = mysqli_fetch_assoc($resultado)){
					$va3 = $row['SUM(valor3)'];
					//echo "x= ".$va3."<br>";	
				}
				
				$sqlv4 ="SELECT SUM(valor4) FROM regresion WHERE nom_us= '$nombre'";
				$resultado = mysqli_query($conexion, $sqlv4);
				while ($row = mysqli_fetch_assoc($resultado)){
					$va4 = $row['SUM(valor4)'];
					//echo "xy= ".$va4."<br>";	
				}
				$o1= ($va3/$numero)-($va1*$va1);
				//echo "ox= ".$o1."<br>";

				$o2= ($va4/$numero)-($va1*$va2);
				//echo "oxy= ".$o2."<br>";

				//echo "Y - ".$va2." = ".$o2/$o1."(X - ".$va1.")"."<br>";

				$div=$o2/$o1;
				
				$c= $div * $va1;
				//echo $c."<br>";

				$resta = $c-$va2;
				//echo "Y = ". $div."X"." - ".$c ."-".$va2."<br>";

				echo "<center><i> Y = ". $div."x"." + ".($resta*-1)."<br></i></center>";
			?>
		</tbody>
		<?php } ?>
	</table>
	</div>


		<!--Contenido dentro del div con margen-->
		<div class="text-center">
        <div class="btn-group" role="group" aria-label="">
            <a  class="btn btn-danger" data-toggle="modal" data-target="#btnGrafica" style="color: #ffff;">
            Gráfica
            </a>    
        </div>
      	</div>

        <div id="btnGrafica" class="modal fade" style="z-index: 1400;" data-target="#btnGrafica">
            <div class="modal-dialog modal-lg" role="dialog" >
            <!-- Modal content-->
            <div class="modal-content">
                <div style="background: #1B396A; color: #fff; height: 75px;padding-left: 40px;">
                        <p><h3 class="modal-title col-11 text-center">Gráfico de dispersión con línea de regresión</h3></p>
                </div>
              <div class="modal-body">
              	<div class="alert alert-info alert-dismissible fade show" style="font-size: 14px;" role="alert">
					<ul class="list-unstyled" style="margin-bottom: 0;">
						<li><strong>Nota: </strong>No olvides descargar la grafica en el formato que requieras.  <i class="fas fa-bars"></i> </center></li>
		            </ul>
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">×</span>
		            </button>
    			</div>
                <iframe src="grafico.php" width="100%" height="450px" style="border:0px"></iframe>
              </div>      
            </div>
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

        <script src="pluggins/Highcharts_7.0.3/code/modules/drilldown.js"></script>
	</body>
</html>