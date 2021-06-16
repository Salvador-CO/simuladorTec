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
        <title>Tarjetas de almacen</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	</head>

	<style>
		    #statusCP,#titulo,#statusPEPS,#statusUEPS  { padding:10px; background:#88C4FF; color:#000; font-weight:bold; font-size:12px; margin-bottom:10px; display:none; width:100%; }
		    .registro{
		      
		      margin-left: 3%;
		      margin-right: 3%;
		    }
		    .cabecera{
		      margin-left: 3%;
		      margin-right: 3%;
		    }
		    .tablaDiario{
		      margin-left: 1%;
		      margin-right: 1%;
		    }
		    td{
		      border-bottom:  #000  2px;
		    }
		    #tcargo{
		      border-top: 1px solid;
		    } 
	</style>
	<!-- progreso -->
	<style type="text/css">
			
		.prue{
			align-content: center;
			align-items: center;
			width: 10%;
			height: 30px;

		}
		.cajon1{
			align-content: center;
			align-items: center;
			float:left;
			
			margin-left: 3%;
			margin-right:  10%;
		}
		.cajon2{
			align-content: center;
			align-items: center;
			float:left;
			
			margin-right:  10%;
		}
		.cajon3{
			align-content: center;
			align-items: center;
			float:left;
			
			
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
	<!-- progreso -->

	<?php require "menuconta.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Tarjetas de almacén  <button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#btnPrueba"><i class="fas fa-question"></i> </button></h1></center>


		<!-- modal de instrccines -->
      <div id="btnPrueba" class="modal fade" style="z-index: 1400;" data-target="#btnPrueba">
          <div class="modal-dialog modal-lg" role="dialog" >
            <!-- Modal content-->
            <div class="modal-content">
                <div style="background: #1B396A; color: #fff; height: 75px;padding-left: 40px;">
                        <p><h3 class="modal-title col-11 text-center">Ayuda</h3></p>
                </div>
              <div class="modal-body">
               <!--   contenido -->
                <embed src="../manual/tarjeta.pdf#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />
              </div>      
            </div>
          </div>
      </div>

		    <ol class="breadcrumb mb-4">
		         <li class="breadcrumb-item active"><b>Instrucciones:</b> En el siguiente apartado podrás realizar la tarjeta de almacen que se te indique en el Reactivo Integrador Multidisciplina (RIM). Así mismo, al terminar de realizar tu ejercicio deberás descargarlo en formato PDF para posteriormente poder subirlo en el apartado “Carga de archivos”. </li>
			</ol>
		<!--Contenido dentro del div con margen-->
		</div>	
	<!---->


	<?php 
            $sql ="SELECT * FROM diario WHERE nom_us='$nombre' && concepto='Almacen'";
              //echo $sql;  
              $consulta = mysqli_query($conexion, $sql);
              if($consulta->num_rows === 0) {
              echo "<br><div style=\"border:1px solid #88C4FF;background-color:#88C4FF;margin-left: 50px;margin-right: 50px;\">
                    <center>-Para poder mostrar las tarjetas de almacen deberás ingresar alguna cuenta perteneciente a estas-</center>
                     </div>";
    }else{?>

<!-- Tabla Costo promedio-->
	<div class="cabecera">
  		
	    <?php 
	      $sqlcp = "SELECT * FROM tarjetacp WHERE num_us='$nombre'";
	      $consultacp = mysqli_query($conexion, $sqlcp);
	      if($consultacp->num_rows === 0) {

	      	?>
	      		<div >
	      		<form action="tarjetas/consultas.php" method= "POST" >
					<br>
					<center>
						<h4>1) Método de Costo Promedio</h4>
						<button type="submit" class="btn btn-outline-light"> <img src="tarjetas/tabla.svg" width="100" height="100"> </button><br>
						<input type="text" id="botonCP" name="num" title ="Generar tablas" value="0" style="visibility:hidden">
					</center>
				</form>	
				</div>	
	      	<?php
	        //echo "<div style=\"border:1px solid #88C4FF; background-color:#88C4FF;\">
	          //      <center>No hay datos, registra tu primer asiento en el libro diario</center>
	         //</div>";
	        //echo "No hay resultados <br><br><br>";
	      } else {   ?>
	      	<h4 class="accordion1" style="text-align: center;">
  			<font size="5" color="#1B2631"><u>MÉTODO DE COSTO PROMEDIO</u></font>
  			</h4>
  			<!--  -->
  			<?php 
  			$sql ="SELECT * FROM encabezado WHERE nom_us='$nombre'";
            $consulta = mysqli_query($conexion, $sql); ?>
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
		                while($rowedit = mysqli_fetch_array($consulta)){
		                $rownumber++;
		                $id=$rowedit["id"];
		                $nom = $rowedit["nomEm"];
		                $ape = $rowedit["fechaEm"];
		                $ciu = $rowedit["tipoDoc"];
		                $cel = $rowedit["firma"];
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
	      <div id="statusCP"></div>      
	      <table id="rayadoD" cellspacing="0" cellpadding="0" class="table table-striped">
	          <thead >
	             <tr align="center">
	              <th colspan="2" style="background: #fff; border: none;">
	            <div class="prue">
	  			  	<form action="tarjetas/consultas.php" method= "POST" >
						<center>
							<input type="text" id="botonCP" name="num" value="1" style="display:none">
							<button type="submit" class="btn btn-outline-light"> <img src="tarjetas/actualizar.png" width="25" height="25"> </button> 
						</center>
					</form>	
  				</div>
	              </th>

	              <th scope="col"  colspan="3" style="border-right: 1px solid #fff;  background: #1B2631; color: #fff;">Unidades</th>
	              <th scope="col"  style="border-right: 1px solid #fff; background: #1B2631; color: #fff;">Costo</th>
	              <th scope="col" colspan="3"  style="border-right: 1px solid #fff; background: #1B2631; color: #fff;">Valores</th>
	              
	            </tr>
	            <tr style="background: #000; color: #fff;">
	              <th scope="col" style="border-right: 1px solid #fff;">Fecha</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Cocepto</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Entrada (+)</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Salida (-)</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Existencia</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Unitario</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Debe</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Haber</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Saldo</th>
	              
	              <!--<th scope="col">Acción</th>-->
	            </tr>
	          </thead>
	          <tbody>
	            <?php
	              $contadorCP=0;
	              while($rescp = mysqli_fetch_array($consultacp)){
	              $contadorCP++;
	              $id_cp = $rescp["id_cp"];
	              $fecha_cp = $rescp["fecha_cp"];
	              $concepto_cp = $rescp["concepto_cp"];
	              $entrada_cp = $rescp["entrada_cp"];
	              $salida_cp = $rescp["salida_cp"];
	              $existencia_cp = $rescp["existencia_cp"];
	              $unitario_cp = $rescp["unitario_cp"];
	              $cargo_cp = $rescp["cargo_cp"];
	              $abono_cp = $rescp["abono_cp"];
	              $saldo_cp = $rescp["saldo_cp"];
	              ?>
	              
	                <tr class="table-success">

	                <td style="border-right: 1px solid #27AE60;" id="fecha_cp:<?php echo $id_cp; ?>" contenteditable="false"><?php echo trim($fecha_cp); ?></td>
	                <td style="border-right: 1px solid #27AE60;" id="concepto_cp:<?php echo $id_cp; ?>" contenteditable="true"><?php echo rtrim($concepto_cp); ?></td>
	                <td style="border-right: 1px solid #27AE60;" id="entrada_cp:<?php echo $id_cp; ?>" contenteditable="true"><?php echo $entrada_cp; ?></td>
	                <td style="border-right: 1px solid #27AE60;" id="salida_cp:<?php echo $id_cp; ?>" contenteditable="true"><?php echo $salida_cp; ?></td>
	                <td style="border-right: 1px solid #27AE60;" id="existencia_cp:<?php echo $id_cp; ?>" contenteditable="true"><?php echo $existencia_cp; ?></td>
	                <td style="border-right: 1px solid #27AE60;" id="unitario_cp:<?php echo $id_cp; ?>" contenteditable="true"><?php echo $unitario_cp; ?></td>
	                <td align="right" style="border-right: 1px solid #27AE60;" id="cargo_cp:<?php echo $id_cp; ?>" contenteditable="true"><?php echo $cargo_cp; ?></td>
	                <td align="right" style="border-right: 1px solid #27AE60;" id="abono_cp:<?php echo $id_cp; ?>" contenteditable="true"><?php echo $abono_cp; ?></td>
	                <td style="border-right: 1px solid #27AE60;" id="saldo_cp:<?php echo $id_cp; ?>" contenteditable="true"><?php echo $saldo_cp; ?></td>
	                
	              </tr>
	              <?php
	              }
	              ?>    
 				</tbody>

	            <!--  -->
	            <tfoot align="right">
	              <tr  style="height:1px; border-bottom: 2px solid #27AE60"><td colspan="9" height="1px" ></td></tr>
	             	<td align="center" class="table-success"  style="border-right: 1px solid #27AE60; border-bottom: 2px solid #27AE60;" id="tabono" colspan="9">
	              	<a href="pdf/tarjetacp.php" target="_blank">  <button title="Descargar tarjeta de almacen" type="button" class="btn btn-dark"><i class="fa fa-download"> </i></button> </a>

	              	<a href="diario/eliminar.php?dato=cp&&nom=<?php echo $nombre; ?>"><button title="Eliminar tarjeta de almacen" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> </a>
	            	</td>
	            </tfoot>
	      </table>
	    </div>
	<?php }?>
  	</div>
<!-- Tabla Costo promedio-->


<!-- MÉTODOS PEPS -->
	<div class="cabecera">
	    <?php 
	      $sqlPEPS = "SELECT * FROM tarjetapeps WHERE nom_us='$nombre'";
	      $consultaPEPS = mysqli_query($conexion, $sqlPEPS);
	      if($consultaPEPS->num_rows === 0) {
	      	?>
	      		<div >
	      		<form action="tarjetas/consultas.php" method= "POST" >
					<center>
						<h4>2) Método Primeras Entradas Primeras Salidas (PEPS)</h4>
						<button type="submit" class="btn btn-outline-light"> <img src="tarjetas/tabla.svg" width="100" height="100"> </button><br>
						<input type="text" id="botonCP" name="num" title ="Generar tablas" value="2" style="visibility:hidden">
					</center>
				</form>	
				</div>		
	      	<?php
	        //echo "<div style=\"border:1px solid #88C4FF; background-color:#88C4FF;\">
	          //      <center>No hay datos, registra tu primer asiento en el libro diario</center>
	         //</div>";
	        //echo "No hay resultados <br><br><br>";
	      } else {   ?>
	      	<h4 class="accordion1" style="text-align: center;">
  			<font size="5"  color="#1B2631"><u>MÉTODO PRIMERAS ENTRADAS, PRIMERAS SALIDAS (PEPS)</u></font>
  			</h4>
  			

  			<!--  -->
  			<?php 
  			$sql ="SELECT * FROM encabezado WHERE nom_us='$nombre'";
            $consulta = mysqli_query($conexion, $sql); ?>
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
		                while($rowedit = mysqli_fetch_array($consulta)){
		                $rownumber++;
		                $id=$rowedit["id"];
		                $nom = $rowedit["nomEm"];
		                $ape = $rowedit["fechaEm"];
		                $ciu = $rowedit["tipoDoc"];
		                $cel = $rowedit["firma"];
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
	      <div id="statusPEPS"></div>      
	      <table id="rayadoD" cellspacing="0" cellpadding="0" class="table table-striped">
	        
	        <thead >
	        	<tr align="center">
					<th colspan="2" style="background: #fff; border: none;">
						<div class="prue">
						  	<form action="tarjetas/consultas.php" method= "POST" >
							<center>
								<input type="text" id="botonCP" name="num" value="2" style="display:none">
								<button type="submit" class="btn btn-outline-light"> <img src="tarjetas/actualizar.png" width="25" height="25"> </button>
							</center>
							</form>	
						</div>
					</th>

					<th scope="col"  colspan="3" style="border-right: 1px solid #fff; background: #1B2631; color: #fff;">Entradas</th>
					<th scope="col"  colspan="3" style="border-right: 1px solid #fff; background: #1B2631; color: #fff;">Salidas</th>
					<th scope="col"  colspan="2" style="border-right: 1px solid #fff; background: #1B2631; color: #fff;">Existecia y Saldo</th>
				</tr>
	            <tr style="background: #000; color: #fff;">
	              <th scope="col" style="border-right: 1px solid #fff;">Fecha</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Concepto</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Unidades</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Costo Unitario</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Total</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Unidades</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Costo Unitario</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Total</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Unidades</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Total</th>
	              
	              <!--<th scope="col">Acción</th>-->
	            </tr>
	        </thead>
	        
	        <tbody>
	            <?php
	              $contadorPEPS=0;
	              while($resPEPS = mysqli_fetch_array($consultaPEPS)){
	              $contadorPEPS++;
	              $id_peps = $resPEPS["id_peps"];
	              $fecha_peps = $resPEPS["fecha_peps"];
	              $concepto_peps = $resPEPS["concepto_peps"];
	              $unidades_ent_peps = $resPEPS["unidades_ent_peps"];
	              $costounitario_ent_peps = $resPEPS["costounitario_ent_peps"];
	              $total_ent_peps = $resPEPS["total_ent_peps"];
	              $unidades_sal_peps = $resPEPS["unidades_sal_peps"];
	              $costounitario_sal_peps = $resPEPS["costounitario_sal_peps"];
	              $total_sal_peps = $resPEPS["total_sal_peps"];
	              $unidades_peps = $resPEPS["unidades_peps"];
	              $total_peps = $resPEPS["total_peps"];
	              ?>
	              
	                <tr class="table-danger">

	                <td style="border-right: 1px solid #E62E3F;" id="fecha_peps:<?php echo $id_peps; ?>" contenteditable="false"><?php echo trim($fecha_peps); ?></td>
	                <td style="border-right: 1px solid #E62E3F;" id="concepto_peps:<?php echo $id_peps; ?>" contenteditable="true"><?php echo trim($concepto_peps); ?></td>
	                <td style="border-right: 1px solid #E62E3F;" id="unidades_ent_peps:<?php echo $id_peps; ?>" contenteditable="true"><?php echo rtrim($unidades_ent_peps); ?></td>
	                <td style="border-right: 1px solid #E62E3F;" id="costounitario_ent_peps:<?php echo $id_peps; ?>" contenteditable="true"><?php echo $costounitario_ent_peps; ?></td>
	                <td style="border-right: 1px solid #E62E3F;" id="total_ent_peps:<?php echo $id_peps; ?>" contenteditable="true"><?php echo $total_ent_peps; ?></td>
	                <td style="border-right: 1px solid #E62E3F;" id="unidades_sal_peps:<?php echo $id_peps; ?>" contenteditable="true"><?php echo $unidades_sal_peps; ?></td>
	                <td style="border-right: 1px solid #E62E3F;" id="costounitario_sal_peps:<?php echo $id_peps; ?>" contenteditable="true"><?php echo $costounitario_sal_peps; ?></td>
	                <td align="right" style="border-right: 1px solid #E62E3F;" id="total_sal_peps:<?php echo $id_peps; ?>" contenteditable="true"><?php echo $total_sal_peps; ?></td>
	                <td align="right" style="border-right: 1px solid #E62E3F;" id="unidades_peps:<?php echo $id_peps; ?>" contenteditable="true"><?php echo $unidades_peps; ?></td>
	                <td style="border-right: 1px solid #E62E3F;" id="total_peps:<?php echo $id_peps; ?>" contenteditable="true"><?php echo $total_peps; ?></td>
	                
	              </tr>
	              <?php
	              }
	              ?>    
 				</tbody>

	            <!--  -->
	            <tfoot align="right">
	              <tr  style="height:1px; border-bottom: 2px solid #E62E3F"><td colspan="9" height="1px" ></td></tr>
	              
	              <td align="center" class="table-danger"  style="border-right: 1px solid #E62E3F; border-bottom: 2px solid #E62E3F;" id="tabono" colspan="10">
	              	<a href="pdf/tarjetapeps.php" target="_blank">  <button title="Descargar tarjeta de almacen" type="button" class="btn btn-dark"><i class="fa fa-download"></i></button> </a>
	              		<a href="diario/eliminar.php?dato=peps&&nom=<?php echo $nombre; ?>"><button title="Eliminar tarjeta de almacen" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> </a> 
	              </td>
	            </tfoot>
	      </table>
	    </div>
	<?php }?>
  	</div>
<!-- MÉTODOS PEPS -->

<!-- MÉTODOS UEPS -->
	<div class="cabecera">
	    <?php 
	      $sqlUEPS = "SELECT * FROM tarjetaueps WHERE nom_us='$nombre'";
	      $consultaUEPS = mysqli_query($conexion, $sqlUEPS);
	      if($consultaUEPS->num_rows === 0) {
	      	?>
	      	<div >
	      		<form action="tarjetas/consultas.php" method= "POST" >
					<center>
						<h4>3) Metodo Últimas Entradas Primeras Salidas (UEPS)</h4>
						<button type="submit" class="btn btn-outline-light"> <img src="tarjetas/tabla.svg" width="100" height="100"> </button><br>
						<input type="text" id="botonCP" name="num" title ="Generar tablas" value="3" style="visibility:hidden">
					</center>
				</form>	
			</div>		
	      	<?php
	        //echo "<div style=\"border:1px solid #88C4FF; background-color:#88C4FF;\">
	          //      <center>No hay datos, registra tu primer asiento en el libro diario</center>
	         //</div>";
	        //echo "No hay resultados <br><br><br>";
	      } else {   ?>

	      	<h4 class="accordion1" style="text-align: center;">
	      		<font size="5"  color="#1B2631"><u>METODO ÚLTIMAS ENTRADAS, PRIMERAS SALIDAS (UEPS) </u></font>
  			</h4>
  			<!--  -->
  			<?php 
  			$sql ="SELECT * FROM encabezado WHERE nom_us='$nombre'";
            $consulta = mysqli_query($conexion, $sql); ?>
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
		                while($rowedit = mysqli_fetch_array($consulta)){
		                $rownumber++;
		                $id=$rowedit["id"];
		                $nom = $rowedit["nomEm"];
		                $ape = $rowedit["fechaEm"];
		                $ciu = $rowedit["tipoDoc"];
		                $cel = $rowedit["firma"];
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
	      <div id="statusUEPS"></div>      
	      <table id="rayadoD" cellspacing="0" cellpadding="0" class="table table-striped">
	        
	        <thead >
	        	<tr align="center">
					<th colspan="2" style="background: #fff; border: none;">
						<div class="prue">
						  	<form action="tarjetas/consultas.php" method= "POST" >
							<center>
								<input type="text" id="botonCP" name="num" value="3" style="display:none">
								<button type="submit" class="btn btn-outline-light"> <img src="tarjetas/actualizar.png" width="25" height="25"> </button>
							</center>
							</form>	
						</div>
					</th>

					<th scope="col"  colspan="3" style="border-right: 1px solid #fff; background: #1B2631; color: #fff;">Entradas</th>
					<th scope="col"  colspan="3" style="border-right: 1px solid #fff; background: #1B2631; color: #fff;">Salidas</th>
					<th scope="col"  colspan="2" style="border-right: 1px solid #fff; background: #1B2631; color: #fff;">Existecia y Saldo</th>
				</tr>
	            <tr style="background: #000; color: #fff;">
	              <th scope="col" style="border-right: 1px solid #fff;">Fecha</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Concepto</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Unidades</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Costo Unitario</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Total</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Unidades</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Costo Unitario</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Total</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Unidades</th>
	              <th scope="col" style="border-right: 1px solid #fff;">Total</th>
	              
	              <!--<th scope="col">Acción</th>-->
	            </tr>
	        </thead>
	        
	        <tbody>
	            <?php
	              $contadorUEPS=0;
	              while($resUEPS = mysqli_fetch_array($consultaUEPS)){
	              $contadorUEPS++;
	              $id_ueps = $resUEPS["id_ueps"];
	              $fecha_ueps = $resUEPS["fecha_ueps"];
	              $concepto_ueps = $resUEPS["concepto"];
	              $unidades_ent_ueps = $resUEPS["unidades_ent"];
	              $costounitario_ent_ueps = $resUEPS["costounitario_ent"];
	              $total_ent_ueps = $resUEPS["total_ent"];
	              $unidades_sal_ueps = $resUEPS["unidades_sal"];
	              $costounitario_sal_ueps = $resUEPS["costounitario_sal"];
	              $total_sal_ueps = $resUEPS["total_sal"];
	              $unidades_ueps = $resUEPS["unidades"];
	              $total_ueps = $resUEPS["total"];
	              ?>
	              
	                <tr class="table-warning">

	                <td style="border-right: 1px solid #FFCB2E;" id="fecha_ueps:<?php echo $id_ueps; ?>" contenteditable="false"><?php echo trim($fecha_ueps); ?></td>
	                <td style="border-right: 1px solid #FFCB2E;" id="concepto:<?php echo $id_ueps; ?>" contenteditable="true"><?php echo trim($concepto_ueps); ?></td>
	                <td style="border-right: 1px solid #FFCB2E;" id="unidades_ent:<?php echo $id_ueps; ?>" contenteditable="true"><?php echo rtrim($unidades_ent_ueps); ?></td>
	                <td style="border-right: 1px solid #FFCB2E;" id="costounitario_ent:<?php echo $id_ueps; ?>" contenteditable="true"><?php echo $costounitario_ent_ueps; ?></td>
	                <td style="border-right: 1px solid #FFCB2E;" id="total_ent:<?php echo $id_ueps; ?>" contenteditable="true"><?php echo $total_ent_ueps; ?></td>
	                <td style="border-right: 1px solid #FFCB2E;" id="unidades_sal:<?php echo $id_ueps; ?>" contenteditable="true"><?php echo $unidades_sal_ueps; ?></td>
	                <td style="border-right: 1px solid #FFCB2E;" id="costounitario_sal:<?php echo $id_ueps; ?>" contenteditable="true"><?php echo $costounitario_sal_ueps; ?></td>
	                <td align="right" style="border-right: 1px solid #FFCB2E;" id="total_sal:<?php echo $id_ueps; ?>" contenteditable="true"><?php echo $total_sal_ueps; ?></td>
	                <td align="right" style="border-right: 1px solid #FFCB2E;" id="unidades:<?php echo $id_ueps; ?>" contenteditable="true"><?php echo $unidades_ueps; ?></td>
	                <td style="border-right: 1px solid #FFCB2E;" id="total:<?php echo $id_ueps; ?>" contenteditable="true"><?php echo $total_ueps; ?></td>
	                
	              </tr>
	              <?php
	              }
	              ?>    
 				</tbody>

	            <!--  -->
	           <tfoot align="right">
	              <tr  style="height:1px; border-bottom: 2px solid #FFCB2E"><td colspan="9" height="1px" ></td></tr>
	              
	              <td align="center" class="table-warning"  style="border-right: 1px solid #FFCB2E; border-bottom: 2px solid #FFCB2E;" id="tabono" colspan="10">
	              	<a href="pdf/tarjetaueps.php" target="_blank">  <button title="Descargar tarjeta de almacen" type="button" class="btn btn-dark"><i class="fa fa-download"></i></button> </a>
	              		<a href="diario/eliminar.php?dato=ups&&nom=<?php echo $nombre; ?>"><button title="Eliminar tarjeta de almacen" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> </a>
	              </td>
	            </tfoot>
	      </table>
	    </div>
	<?php }?>
  	</div>
<!-- MÉTODOS UEPS-->

	<?php } ?>
 
	   	</main>
	   	
        <!-- scrip costo promedio -->
        <script>
			$(function(){
			  //Mensaje
			    var message_status = $("#statusCP");
			    $("td[contenteditable=true]").blur(function(){
			        var rownumber = $(this).attr("id");
			        var value = $(this).text();
			        $.post('tarjetas/procesocp.php' , rownumber + "=" + value, function(data){
			            if(data != '')
			      {
			        message_status.show();
			        message_status.html(data);
			        //hide the message
			        setTimeout(function(){message_status.html("REGISTRO ACTUALIZADO CORRECTAMENTE");},2000);
			      } else {
			        //message_status().html = data;
			      }
			        });
			    });
			});
		</script>
        <!-- scrip costo promedio -->

        <!-- scrip costo promedio -->
        <script>
			$(function(){
			  //Mensaje
			    var message_status = $("#statusPEPS");
			    $("td[contenteditable=true]").blur(function(){
			        var rownumber = $(this).attr("id");
			        var value = $(this).text();
			        $.post('tarjetas/procesopeps.php' , rownumber + "=" + value, function(data){
			            if(data != '')
			      {
			        message_status.show();
			        message_status.html(data);
			        //hide the message
			        setTimeout(function(){message_status.html("REGISTRO ACTUALIZADO CORRECTAMENTE");},2000);
			      } else {
			        //message_status().html = data;
			      }
			        });
			    });
			});
		</script>
        <!-- scrip costo promedio -->

        <!-- scrip costo promedio -->
        <script>
			$(function(){
			  //Mensaje
			    var message_status = $("#statusUEPS");
			    $("td[contenteditable=true]").blur(function(){
			        var rownumber = $(this).attr("id");
			        var value = $(this).text();
			        $.post('tarjetas/procesoueps.php' , rownumber + "=" + value, function(data){
			            if(data != '')
			      {
			        message_status.show();
			        message_status.html(data);
			        //hide the message
			        setTimeout(function(){message_status.html("REGISTRO ACTUALIZADO CORRECTAMENTE");},2000);
			      } else {
			        //message_status().html = data;
			      }
			        });
			    });
			});
		</script>
        <!-- scrip costo promedio -->

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
        <!-- insertar datos -->
	</body>
</html>