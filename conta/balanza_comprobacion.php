<?php include("../conexion.php");?>
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
        <title>Balanza de Comprobación</title>
        <link rel="icon" type="image/png" sizes="192x192"  href="../iconos/tecnm.png">
        
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>
	<style type="text/css">
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

	<?php require "menuconta.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Balanza de Comprobación   <button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#btnPrueba" title="¡Da clic para obtener mas información!"><i class="fas fa-question"></i> </button></h1></center>
	  
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
                <embed src="../manual/balanza_com.pdf#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />
              </div>      
            </div>
          </div>
      </div>

	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active"><b>Instrucciones:</b> En el siguiente apartado podrás verificar la balanza de comprobación con base en los datos dados en el esquema de mayor. Así mismo, al terminar de realizar tu ejercicio deberás descargarlo en formato PDF para posteriormente poder subirlo en el apartado “Carga de archivos”. </li>
		</ol>
		<!--Contenido dentro del div con margen-->
			
		</div>
	<!---->
	<div class="container">
			<?php
			$sql = "SELECT * FROM `mayor` where nom_us='$nombre' ORDER BY `mayor`.`codigo_cuen` ASC";
			$consulta = mysqli_query($conexion, $sql);
			if($consulta->num_rows === 0) {
			  echo "<br><div style=\"border:1px solid #88C4FF;background-color:#88C4FF;\">
                    <center>No hay datos, registra tu primer asiento</center>
                     </div>";
			} else {
			?>
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
			<div class="row">
			<div id="status"></div>      
			<table class="table table-hover table-success">
			    <thead class="thead-dark">
			      <tr align="center">
			        <th scope="col" style="border: none;  background: #FFF; color: #fff;"></th>
			        <th scope="col"style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">Nombre de la cuenta</th>
			        <th scope="col" colspan="2" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">Movimiento del mes</th>
			        <th scope="col" colspan="2" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">Saldo del mes</th>
			      </tr>
			      <tr align="center">
			        <th scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; "># CUENTA</th>
			        <th scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">ACTIVO - PASIVO - CAPITAL </th>
			        <th scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">DEBE</th>
			        <th scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">HABER</th>
			        <th scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">DEUDOR</th>
			        <th scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">ACREEDOR</th>
			      </tr>
			    </thead>
			    <tbody>
			<?php
			$rownumber=0;
			while($rowedit = mysqli_fetch_array($consulta)){
			$rownumber++;
			$id= $rowedit["id"];
			$codigo= $rowedit["codigo_cuen"];
			$cuenta = $rowedit["cuenta"];
			$MD = $rowedit["MD"];
			$MA = $rowedit["MA"];
			$SD = $rowedit["SD"];
			$SA = $rowedit["SA"];

			?>
			<tr>
			  <td align="center" scope="row"><?php echo $codigo; ?></td>
			  <td  id="Nombres:<?php echo $rownumber; ?>" contenteditable="false"><?php echo $cuenta; ?></td>
			  <td align="right" id="Apellidos:<?php echo $rownumber; ?>" contenteditable="false">$ <?php echo $MD; ?></td>
			  <td align="right" id="Ciudad:<?php echo $rownumber; ?>" contenteditable="false">$ <?php echo $MA;?></td>
			  <td align="right" id="Cel:<?php echo $rownumber; ?>" contenteditable="false"> <?php echo $SD; ?></td>
			  <td align="right" id="Cel:<?php echo $rownumber; ?>" contenteditable="false"> <?php echo $SA; ?></td>
		
			</tr>
			<?php
			}
			?>    
			    </tbody>
			    <?php 
			    $sumMD = "SELECT SUM(MD) FROM `mayor` where nom_us='$nombre'";
				$resMD = mysqli_query($conexion, $sumMD);
	                $datoMD = $resMD->fetch_assoc();
	              if(isset($datoMD['SUM(MD)'])){
	                $resMD = $datoMD['SUM(MD)'];
	              }else{
	                $resMD="0";
	                }
	            $sumMA = "SELECT SUM(MA) FROM `mayor` where nom_us='$nombre'";
				$resMA = mysqli_query($conexion, $sumMA);
	                $datoMA = $resMA->fetch_assoc();
	              if(isset($datoMA['SUM(MA)'])){
	                $resMA = $datoMA['SUM(MA)'];
	              }else{
	                $resMA="0";
	                }
	            $sumSD = "SELECT SUM(SD) FROM `mayor` where nom_us='$nombre'";
				$resSD = mysqli_query($conexion, $sumSD);
	                $datoSD = $resSD->fetch_assoc();
	              if(isset($datoSD['SUM(SD)'])){
	                $resSD = $datoSD['SUM(SD)'];
	              }else{
	                $resSD="0";
	                }
	            $sumSA = "SELECT SUM(SA) FROM `mayor` where nom_us='$nombre'";
				$resSA = mysqli_query($conexion, $sumSA);
	                $datoSA = $resSA->fetch_assoc();
	              if(isset($datoSA['SUM(SA)'])){
	                $resSA = $datoSA['SUM(SA)'];
	              }else{
	                $resSA="0";
	                }
			     ?>
			    <tfoot align="right">
			    <tr align="right" style="height:1px; ">			

	              <th  style="border-right: 1px solid #000; right; border-top: 2px solid #000" colspan="2"><b><strong>Total </strong></b></th>
	              <th style="border-right: 1px solid #000; border-top: 2px solid #000 "><b><strong>$ <?php echo number_format($resMD,2); ?></strong></b></th>
	              <th style="border-right: 1px solid #000; border-top: 2px solid #000 "><b><strong>$ <?php echo number_format($resMA,2); ?></strong></b></th>
	              <th style="border-right: 1px solid #000; border-top: 2px solid #000 "><b><strong>$ <?php echo number_format($resSD,2); ?></strong></b></th>
	              <th style="border-right: 1px solid #000; border-top: 2px solid #000 "><b><strong>$ <?php echo number_format($resSA,2); ?></strong></b></th>

	          	</tr>
	          	<tr >
	          		<td align="center" style="border:none;" colspan="9" >
	              	<a href="pdf/balanza.php" target="_blank"> <button  title="Descargar balanza de comprobación.pdf" type="button" class="btn btn-dark"><i class="fa fa-download"></i></button> </a>
	              </td>
	          	</tr>
			    </tfoot>
			 </table>
			</div>
			<?php }?>
	</div>
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