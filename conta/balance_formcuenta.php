<?php include("../conexion.php");?>

<html>
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="css/emergente.css">
        <title>Estado de Situación Financiera</title>
        <link rel="icon" type="image/png" sizes="192x192"  href="../iconos/tecnm.png">
        
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<style type="text/css">
			.conten{
  				overflow:hidden;
				margin-left: 2%;
				margin-right: 2%;
			}
			.left {
				margin-right: 12px;
				width: 49%;
				float: left;
			}
			.right{
				overflow:hidden;
				width: 49%;
				float: left;
				min-height:170px;
			}
			@media screen and (max-width: 640px) {
			   .left, .right { 
			    float: none;
			    margin-right:0;
			    width:auto;
			    border:0;
			  }
		</style>
	</head>

	<?php require "menuconta.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Estado de Situación Financiera</h1><h5>-En forma de cuenta-</h5></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active"><b>Instrucciones:</b> En el siguiente apartado se visualiza el Estado de Situación Financiera en forma de cuenta, el cual podrás descargarlo en formato "PDF". Recuerda que al terminar de realizar tu ejercicio deberás subirlo en formato PDF en el apartado “Carga de archivos”. </li>
		</ol>
		<!--Contenido dentro del div con margen-->
			<!--  -->
	  			<?php 
	  			$sqlenc ="SELECT * FROM encabezado WHERE nom_us='$nombre'";
	            $encabezado = mysqli_query($conexion, $sqlenc); ?>
	  			 <div class="tablaDiario">	            
		            	<div class="row">    
			            <table class="table ">
			               <!--  <thead style="background: #000; color: #fff;">
					            <tr align="center" >
					              <th scope="col" colspan="2">Encabezado</th>
					            </tr>
					         </thead> -->
			                <tbody>
			              <?php
			                $rownumber=0;
			                while($enca = mysqli_fetch_array($encabezado)){
			                $rownumber++;
			                $id=$enca["id"];
			                $nom = $enca["nomEm"];
			                $ape = $enca["fechaEm"];
			                $ciu = $enca["tipoDoc"];
			                $cel = $enca["firma"];
			              ?>
				            <tr  align="center" >
				              <!--  <td scope="row"><?php echo $rownumber; ?></td>-->
				              <td style= "border: none; height: 5px;"  id="nomEm:<?php echo $id; ?>" ><b><?php echo $nom; ?></b></td>
				            </tr>
				            <tr  align="center" >
				            	<td  style="border: none;" id="fechaEm:<?php echo $id; ?>" ><b><?php echo $ape; ?></b></td>
				            </tr>
				            
			            <?php
			            }
			            ?>    
			                </tbody>
			             </table>
		            </div>
		        	</div>
  			<!--  -->
		</div>
			<!--Contenido Fuera del div para q crees lo q quieras -->
	   	<div class="conten"><!-- inicio de conten -->

	   	<div class="left"><!-- inicio de left -->
	   		<!-- Tabla de activo a corto plazo -->
		  	<table class="table">
				<thead>
				    <tr >
				      <th colspan="2" scope="col" style="background-color:#3b6c9b; color: #ffff;"><center> ACTIVO</center></th>
				    </tr>
				    <tr class="thead-light">
				      <th colspan="2" scope="col"style="color: #3b6c9b;"><u>Activo a corto plazo</u></th>
				    </tr>
				</thead>

			<tbody>

				<?php
				$sql = "SELECT * FROM `mayor` WHERE `codigo_cuen` BETWEEN 100 AND 140 && nom_us='$nombre' ";
				$sql2 = "SELECT * FROM `resulanal` WHERE `codigo`= 115.09 && nom_us='$nombre'";
		            $rescargo = $conexion->query($sql2);
		            $datocargo = $rescargo->fetch_assoc();
		            if(isset($datocargo['c1']) ){
		                $DES = $datocargo['des'];
		                $infin = $datocargo['c1'];
		                }else{
		                  $infin="0";
		                }
				$consulta = mysqli_query($conexion, $sql);
				if($consulta->num_rows === 0) {
					$sumaACP=0;
				?>  	
				    <tr>
				      <td>-------</td>
				      <td align="right">$ <?php echo number_format(0,2);?></td>
				    </tr>
				<?php  
				}else{
					$sumaACP=0;
					while($rowedit = mysqli_fetch_array($consulta)){
						$id= $rowedit["id"];
						$codigo= $rowedit["codigo_cuen"];
						$cuenta = $rowedit["cuenta"];
						$SD = $rowedit["SD"];
						$SA = $rowedit["SA"];
						if ($SD==0) {
							$SD=$rowedit["SA"];
							$SDV="SUM(`SA`)";
						}elseif($SA==0){
							$SD = $rowedit["SD"];
							$SDV="SUM(`SD`)";
						}
					

				?>
				<?php 
			 	if ($cuenta=="Inventario inicial") {
			 		if ($infin==0) {
			 			?>
			 		<tr>
				      <td><?php echo $cuenta; ?></td>
				      <td align="right">$ <?php echo number_format($SD,2);?></td>
				      <?php $sumaACP = ($sumaACP) + ($SD) ?>
				    </tr>

			 			<?php
			 		}else{
			 			?>
					<tr>
				      <td>Inventario</td>
				      <td align="right" >$ <?php echo number_format($infin,2);?></td>
				    </tr>	
				    	<?php $sumaACP = ($sumaACP) + ($infin) ?>
					<?php
			 		}
			 		?>
			 		<?php
			 	}else{
			 		?>
			 		<tr>
				      <td><?php echo $cuenta; ?></td>
				      <td align="right">$ <?php echo number_format($SD,2);?></td>
				    </tr>
				    <?php $sumaACP = ($sumaACP) + ($SD) ?>
				<?php
				}
				}//fin del ciclo 
				}//fin del else principal
				?>
			</tbody>

				<tfoot>
				  	<tr>
				      <td scope="col"><strong>Total de activo a corto plazo</strong></td>
				      <td align="right">$ <?php echo number_format($sumaACP,2);?></td>
				    </tr>
				</tfoot>

			</table>	
			<!-- Fin de Tabla de activo a corto plazo -->

			<!-- Tabla de activo a largo plazo -->
		  		<table class="table">

				<thead>
				    <tr class="thead-light">
				      <th colspan="2" scope="col" style="color: #3b6c9b;"><u>Activo a largo plazo</u></th>
				    </tr>
				</thead>

			<tbody>
				<?php
				$sql = "SELECT * FROM `mayor` WHERE `codigo_cuen` BETWEEN 150 AND 195 && nom_us='$nombre'";
				$consulta = mysqli_query($conexion, $sql);
				if($consulta->num_rows === 0) {
					$sumaAlP=0;
				?>
				    <tr>
				      <td>-------</td>
				      <td align="right">$ <?php echo number_format(0,2);?></td>
				    </tr>
				<?php }else{
					$sumaAlP=0;
					while($rowedit = mysqli_fetch_array($consulta)){
					$rownumber++;
					$id= $rowedit["id"];
					$codigo= $rowedit["codigo_cuen"];
					$cuenta = $rowedit["cuenta"];
					$SD = $rowedit["SD"];
					$SA = $rowedit["SA"];
					if ($SD==0) {
						$SD=$rowedit["SA"];
						$SDV2="SUM(`SA`)";
					}elseif($SA==0){
						$SD = $rowedit["SD"];
						$SDV2="SUM(`SD`)";
					}
					$sumaAlP = ($sumaAlP) + ($SD);
					?>
					<tr>
				      <td><?php echo $cuenta; ?></td>
				      <td align="right">$ <?php echo number_format($SD,2);?></td>
				    </tr>
					<?php
				}//fin del while
				}//fin del else general?>
			</tbody>

				<tfoot>
				  	<tr>
				      <td><strong> Total de activo a largo plazo</strong></td>
				      <td align="right">$ <?php echo number_format($sumaAlP,2);?></td>
				    </tr>
				    <tr>
				      <td><strong> TOTAL DE ACTIVO</strong></td>
				      <?php $TA= ($sumaACP)+($sumaAlP)?>
				      <td align="right"> <strong> $ <?php echo number_format($TA,2);?></strong></td>
				    </tr>
				</tfoot>

				</table>	
			<!-- Fin de Tabla de activo a largo plazo -->
		</div><!-- fin de left -->

		<div class="right"><!-- inicio de left -->
			<!-- Tabla de Pasivo a corto plazo -->
		  		<table class="table">

				<thead>
				    <tr >
				      <th colspan="2" scope="col" style="background-color:#3b6c9b; color: #ffff;"><center> PASIVO</center></th>
				    </tr>
				    <tr class="thead-light">
				      <th colspan="2" scope="col"style="color: #3b6c9b;"><u>Pasivo a corto plazo</u></th>
				    </tr>
				</thead>

			<tbody>
				<?php
				$sql = "SELECT * FROM `mayor` WHERE `codigo_cuen` BETWEEN 200 AND 240 && nom_us='$nombre'";
				$consulta = mysqli_query($conexion, $sql);
				if($consulta->num_rows === 0) {
					$sumaPCP=0;
				?>
				    <tr>
				      <td>-------</td>
				      <td align="right">$ <?php echo number_format(0,2);?></td>
				    </tr>
				<?php }else{
					$sumaPCP=0;
					while($rowedit = mysqli_fetch_array($consulta)){
					
					$id= $rowedit["id"];
					$codigo= $rowedit["codigo_cuen"];
					$cuenta = $rowedit["cuenta"];
					$SD = $rowedit["SD"];
					$SA = $rowedit["SA"];
					if ($SD==0) {
						$SA=$rowedit["SA"];
					}elseif($SA==0){
						$SA = $rowedit["SD"];
					}
					$sumaPCP=($sumaPCP)+($SA);
				?>
					<tr>
				      <td><?php echo $cuenta; ?></td>
				      <td align="right">$ <?php echo number_format($SA,2);?></td>
				    </tr>
					<?php
				}//fin del while
				}//fin del else general?>
			</tbody>

				<tfoot>
				  	<tr>
				      <td><strong> Total de pasivo a corto plazo </strong></td>
				      <td align="right">$ <?php echo number_format($sumaPCP,2);?></td>
				    </tr>
				</tfoot>

				</table>	
			<!-- Tabla de Pasivo a corto plazo -->
			<!-- Tabla de Pasivo a largo plazo -->
		  		<table class="table">

				<thead>
				    <tr class="thead-light">
				      <th colspan="2" scope="col"style="color: #3b6c9b;"><u>Pasivo a largo plazo</u></th>
				    </tr>
				</thead>

			<tbody>
				<?php
				$sqlpla = "SELECT * FROM `mayor` WHERE `codigo_cuen` BETWEEN 250 AND 290 && nom_us='$nombre'";
				$consulta = mysqli_query($conexion, $sqlpla);
				if($consulta->num_rows === 0) {
					$sumaPLP=0;
				?>
				    <tr>
				      <td>-------</td>
				      <td align="right">$ <?php echo number_format(0,2);?></td>
				    </tr>
				<?php }else{
					$sumaPLP=0;
					while($rowedit = mysqli_fetch_array($consulta)){
					
					$id= $rowedit["id"];
					$codigo= $rowedit["codigo_cuen"];
					$cuenta = $rowedit["cuenta"];
					$SD = $rowedit["SD"];
					$SA = $rowedit["SA"];
					if ($SD==0) {
						$SA=$rowedit["SA"];
					}elseif($SA==0){
						$SA = $rowedit["SD"];
					}
					$sumaPLP=($sumaPLP)+($SA);
				?>
					<tr>
				      <td><?php echo $cuenta; ?></td>
				      <td align="right">$ <?php echo number_format($SA,2);?></td>
				    </tr>
					<?php
				}//fin del while
				}//fin del else general?>
			</tbody>

				<tfoot>
				  	<tr>
				      <td><strong> Total de pasivo a largo plazo </strong></td>
				      <td align="right">$ <?php echo number_format($sumaPLP,2);?></td>
				    </tr>
				    <tr>
				      <td><strong> TOTAL DE PASIVO</strong></td>
				      <?php $TP= ($sumaPCP)+($sumaPLP)?>
				      <td align="right">$ <?php echo number_format($TP,2);?></td>
				    </tr>
				</tfoot>

				</table>	
			<!-- Tabla de Pasivo a largo plazo -->	

			<!-- capital -->
			<!-- Tabla de capital contribuido-->
		  		<table class="table">

				<thead>
				    <tr >
				      <th colspan="2" scope="col" style="background-color:#3b6c9b; color: #ffff;"><center> CAPITAL CONTABLE</center></th>
				    </tr>
				    <tr class="thead-light">
				      <th colspan="2" scope="col"style="color: #3b6c9b;"><u>Capital contribuido</u></th>
				    </tr>
				</thead>

			<tbody>
				<?php
				$sql = "SELECT * FROM `mayor` WHERE `codigo_cuen` BETWEEN 300 AND 307 && nom_us='$nombre'";
				$consulta = mysqli_query($conexion, $sql);
				if($consulta->num_rows === 0) {
					$sumaCC=0;
				?>
				    <tr>
				      <td>-------</td>
				      <td align="right">$ <?php echo number_format(0,2);?></td>
				    </tr>
				<?php }else{
					$sumaCC=0;
					while($rowedit = mysqli_fetch_array($consulta)){
					$id= $rowedit["id"];
					$codigo= $rowedit["codigo_cuen"];
					$cuenta = $rowedit["cuenta"];
					$SD = $rowedit["SD"];
					$SA = $rowedit["SA"];
					if ($SD==0) {
						$SA=$rowedit["SA"];
					}elseif($SA==0){
						$SA = $rowedit["SD"];
					}
					$sumaCC=($sumaCC)+($SA);
				?>
					<tr>
				      <td><?php echo $cuenta; ?></td>
				      <td align="right">$ <?php echo number_format($SA,2);?></td>
				    </tr>
					<?php
				}//fin del while
				}//fin del else general?>
			</tbody>

				<tfoot>
				  	<tr>
				      <td><strong> Total de capital contribuido	 </strong></td>
				      <td align="right">$ <?php echo number_format($sumaCC,2);?></td>
				    </tr>
				</tfoot>

				</table>	
			<!-- Tabla de capital cpntribuido -->
			<!-- Tabla de Capital ganado -->
		  		<table class="table">

				<thead>
				    <tr class="thead-light">
				      <th colspan="2" scope="col"style="color: #3b6c9b;"><u>Capital ganado</u></th>
				    </tr>
				</thead>

			<tbody>
				<?php
				$sqlc2 = "SELECT `c2` FROM `resulanal` WHERE `id` ='32' AND nom_us='$nombre' ";
				$sqlc3 = "SELECT `c2` FROM `rescon` WHERE `codigo`='UPAI' AND nom_us='$nombre' ";
				
				$consulta1 = mysqli_query($conexion, $sqlc2);
				$consulta2 = mysqli_query($conexion, $sqlc3);
				if($consulta1->num_rows === 0 && $consulta2->num_rows === 0 ) {
					$resER=0;
				?>
				    <tr>
				      <td>-------</td>
				      <td align="right">$ <?php echo number_format(0,2);?></td>
				    </tr>
				<?php }else{
				$d1=$consulta1->fetch_assoc();
			    $d2=$consulta2->fetch_assoc();

			    if (isset($d1['c2'])) {
			    	$resER=$d1['c2'];
			    }elseif (isset($d2['c2'])) {
			    	$resER=$d2['c2'];
			    }
			  
			    ?>
			    <tr>
			    	<?php 
			    	if ($resER>0) {
			    		$cuentaer="Utilidad Operativa";
			    	}else{
			    		$cuentaer="Perdida Operativa";
			    	}
			    	 ?>
				      <td><?php echo $cuentaer;?></td>
				      <td align="right">$ <?php echo number_format($resER,2);?></td>
				    </tr>
			    <?php
				}//fin del else general?>
			</tbody>

				<tfoot>
				  	<tr>
				      <td><strong> Total de capital ganado </strong></td>
				      <td align="right">$ <?php echo number_format($resER,2);?></td>
				    </tr>
				    <tr>
				      <td><strong>Total capital contable</strong></td>
				      <?php $TCC= ($sumaCC)+($resER)?>
				      <td align="right">$ <?php echo number_format($TCC,2);?></td>
				    </tr>
				     <tr>
				      <td><strong>TOTAL PASIVO + CAPITAL</strong></td>
				      <?php $PmasC= ($TP)+($TCC)?>
				      <td align="right"> <strong> $ <?php echo number_format($PmasC,2);?></strong></td>
				    </tr>
				</tfoot>

				</table>	
			<!-- Tabla de Capital ganado -->	
			<!-- fin del capital -->
		</div><!-- fin de left -->
		<center><a href="pdf/balancegen.php" target="_blank"> <button  title="Descargar balanza de comprobación.pdf" type="button" class="btn btn-dark"><i class="fa fa-download"></i></button></a></center>
	   	</div><!-- fin de conten -->
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