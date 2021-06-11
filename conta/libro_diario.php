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
        <link rel="stylesheet" type="text/css" href="css/genConta.css">
        <title>Libro diario</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<!--  <link rel="stylesheet" href="assets/css/main.css" />-->

		
		
	  	<style>
		    #status,#titulo  { padding:10px; background:#88C4FF; color:#000; font-weight:bold; font-size:12px; margin-bottom:10px; display:none; width:100%; }
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
		    .tablaiva{
		    	width: 100%;
		    }
	  	</style>

	  	<style>
			/* Style the buttons that are used to open and close the accordion panel */
			.accordion1 {
			    background-color: #000;
			    cursor: pointer;
			    padding: 18px;
			    width: 100%;
			    text-align: left;
			    border: 1px solid white;
			    outline: none;
			    transition: 0.4s;
			    /**font: 20px Lato, sans-serif;**/
			}

			/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
			.active1, .accordion1:hover {
			   /* background-color: #34495E ;*/
			    background-color: #3b6c9b;


			}

			/* Style the accordion panel. Note: hidden by default */
			.panel1 {
			    padding: 0 18px;
			    background-color: white;
			    max-height: 0;
			    overflow: hidden;
			    transition: max-height 0.2s ease-out;
			}

			p{
				font: 16px Lato, sans-serif; 
			}

			.accordion1:after {
			    content: '\02795'; /* Unicode character for "plus" sign (+) */
			    font-size: 13px;
			    float: right;
			    margin-left: 5px;
			}

			.active1:after {
			    content: "\2796"; /* Unicode character for "minus" sign (-) */
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
		<!--  -->

	</head>


	<?php require "menuconta.php" ?>

		<!--Titulo-->
	<div class="container-fluid">
		    <center><h1 class="mt-4">Libro Diario <button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#btnPrueba" title="¡Da clic para obtener mas información!"><i class="fas fa-question"></i> </button></h1></center>
		    

		<div id="btnPrueba" class="modal fade" style="z-index: 1400;" data-target="#btnPrueba">
            <div class="modal-dialog modal-lg" role="dialog" >
            <!-- Modal content-->
            <div class="modal-content">
                <div style="background: #1B396A; color: #fff; height: 75px;padding-left: 40px;">
                        <p><h3 class="modal-title col-11 text-center">Ayuda</h3></p>
                </div>
              <div class="modal-body">
              	

                <iframe src="#" width="100%" height="450px" style="border:0px"></iframe>
              </div>      
            </div>
          </div>
        </div>

		    <ol class="breadcrumb mb-4">
		    	<li class="breadcrumb-item active"><b>Instrucciones:</b> En el siguiente apartado podrás realizar el registro del libro diario con los datos dados en el Reactivo Integrador Multidisciplina (RIM), en donde deberás crear: 1) Un encabezado, 2) El registro del asiento, 3) Notas al pie del registro del asiento. Así mismo, al terminar de realizar tu ejercicio deberás descargarlo en formato PDF para posteriormente poder subirlo en el apartado “Carga de archivos”. </li>
		    </ol>
		    
		  	<div class="registro">
		   	<br>
			</div>
			<!-- Modal -->
	            <div id="miModal" class="modal">
	                <div class="flex" >
	                    <div class="contenido-modal">
	                        <div class="modal-header ">
	                            Catálogo de cuentas
	                            <span class="close" id="close">&times;</span>
	                        </div>
	                        <div class="modal-body">
	                           <iframe src="buscador/index.php" width="100%" height="450px" style="border:0px"></iframe>            
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <script src="css/main.js"></script>
	        



			<!--Contenido dentro del div con margen-->
			<!--  -->
	</div>
		<!-- fin cabezera -->
<!-- Datos iniciales -->

<!-- Datos Libro diario -->
  	
	<!-- titulo -->
	<div class="registro">


            <?php
            $sql ="SELECT * FROM encabezado WHERE nom_us='$nombre'";
            $consulta = mysqli_query($conexion, $sql);
            if($consulta->num_rows === 0) {
              ?>
              <!-- Nota del encabezado -->
			<div class="alert alert-info alert-dismissible fade show" style="font-size: 14px;" role="alert">
				<ul class="list-unstyled" style="margin-bottom: 0;">
					<li><strong>1) </strong> Registra el encabezado de tu ejercicio.</li>
	            </ul>
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	              <span aria-hidden="true"><p><strong>x</strong></p></span>
	            </button>
	    	</div>
              	<!-- ven modal -->
				<div >
					<h4 class="accordion1" style="text-align: center;"><font size="3"  color="#fff"> Encabezado </font></h4>
					<div class="panel1">
						<form method="POST" action="diario/guardartitulo.php" >
							<div class="row uniform">
								<div class="form-group col-md-4">
									<label>Nombre o denominación social de la entidad:</label>
									<input type="text" name="empresa" id="empresa" value=""  class="form-control"/>
								</div>

								<div class="form-group col-md-4">
									<label>Período contable:</label>
									<input type="text" name="fec" id="fec" class="form-control" />
															
								</div>
								<div class="form-group col-md-4">
									<label>Autorizador por:</label>
									<input type="text" name="aut" id="aut" class="form-control"/>
								</div>
								<input type="text" name="nom_us" class="form-control" readonly  hidden= "true" value="<?php echo $nombre;?>">
							</div>
							<div class="form-group col-md-12">
								
									<center>
										
									<input type="submit"  value="Agregar" class="btn btn-dark" />
									<input type="reset" value="Limpiar" class="btn btn-dark">
								</center>
									
							</div>
						</form>
					</div>
				</div>
	              <?php
	            } else {
	            ?>
	            <div class="tablaDiario">	            
	            	<div class="row">
		            <div id="titulo"></div>      
		            <table class="table table-striped">
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
			            <tr class="table-success" align="center" >
			              <!--  <td scope="row"><?php echo $rownumber; ?></td>-->
			              <td style= "border: none;"  id="nomEm:<?php echo $id; ?>" contenteditable="true"><b><?php echo $nom; ?></b></td>
			            </tr>
			            <tr class="table-success" align="center" >
			            	<td  style="border: none;" id="fechaEm:<?php echo $id; ?>" contenteditable="true"><b><?php echo $ape; ?></b></td>
			            </tr>
			            
		            <?php
		            }
		            ?>    
		                </tbody>
		             </table>
	            </div>
	        	</div>

	            <?php }?>
    </div>
	<!-- fin titulo -->
	
	<!--  -->
	<div class="registro">
		 <!-- Nota del del los registros de asiento -->
			<div class="alert alert-info alert-dismissible fade show" style="font-size: 14px;" role="alert">
				<ul class="list-unstyled" style="margin-bottom: 0;">
					<li><strong>2) </strong> Registra los asientos correspondientes a tu ejercicio.</li>
	            </ul>
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	              <span aria-hidden="true"><p><strong>x</strong></p></span>
	            </button>
	    	</div>
		    <h4 class="accordion1" style="text-align: center;"><font size="3"  color="#fff">  Registro de asiento(s) </font></h4>
		    <div class="panel1">
		    <form id="myForm" action="diario/guardar.php" method="POST">
		        <div class="form-row">
		           <div class="form-group col-md-4">
		                <label for="num_asiento"># de asiento:</label>
		                <input type="text" name="num_asiento" class="form-control" required >
		            </div> 
		            <div class="form-group col-md-4">
		                <label for="fecha">Fecha de operación:</label>
		                <input type="date" name="fecha" class="form-control" required>
		            </div>
		            <div class="form-group col-md-4">
		                <label for="poliza">Póliza:</label>
		                <select name="poliza" id="poliza" class="form-control">
		                    <option value="s/p" selected>(s/p ) Sin poliza</option>
		                    <option value="I" > (I) Ingresos</option>
		                    <option value="E" > (E) Egresos</option>
		                    <option value="D" > (D) Diario</option>
		                </select>
		            </div>
		            

		            <div class="form-group col-md-2">            
		                <label for="cod_cuenta">Código de cuenta:</label>
		                <input type="number" step = "any" name="cod_cuenta" id="cod_cuenta" class="form-control" required>
		            </div>
		            <div class="form-group col-md-10">
		                <label for="cuenta">Cuenta:</label>
		                <input type="text" name="cuenta" id="cuenta" class="form-control" readonly="readonly">
		            </div>

		            <div class="form-group col-md-3">
		                <label for="parcial">Parcial:</label>
		                <input type="text" name="parcial" class="form-control" value="---">
		            </div>
		            <div class="form-group col-md-3">
		                <label for="cargo">Debe: </label>
		                <input type="number" step = "any" name="cargo" class="form-control" value="0">
		            </div>
		             <div class="form-group col-md-3">
		                <label for="abono">Haber: </label>
		                <input type="number" step = "any" name="abono" class="form-control" value="0">
		            </div>
		            <div class="form-group col-md-3">
		                <label for="nom_us">Registrado por: </label>
		                <input type="text" name="nom_us" class="form-control" readonly  value="<?php echo $nombre;?>">
		            </div>
		        </div> <!-- cierre de form-row -->
		        <!-- dejo fuera a submit -->
		        <div class="form-group col-md-12"><center>
		            <input type="submit" value="Agregar" class="btn btn-dark">
		            <input type="reset" value="Limpiar" class="btn btn-dark"></center>
		        </div>
		    </form>	    	    	
	</div>

	<!-- Tabla diario-->
	<div class="tablaDiario">
			    <?php
	      
	      $sql = "SELECT * FROM `diario` Where nom_us= '$nombre'";
	      $consulta = mysqli_query($conexion, $sql);
	      if($consulta->num_rows === 0) {
	        echo "<br><div style=\"border:1px solid #88C4FF; background-color:#88C4FF;\">
	                <center>No hay datos, registra tu primer asiento.</center>
	         </div>";
	        //echo "No hay resultados <br><br><br>";
	      } else {
	    ?>
	    <br>
	    <div class="row">

	    	<?php 
	    	$sql_query = "SELECT DISTINCT `numAsiento` FROM `diario` WHERE `nom_us`='$nombre' && `numAsiento` NOT IN (SELECT `numAsiento` from diario where `numAsiento` ='AIVA')";
              $resultset = mysqli_query($conexion, $sql_query) or die("error base de datos:". mysqli_error($conexion));
              while( $num = mysqli_fetch_assoc($resultset) ) {
              $asiento= implode(";", $num);
             
	    	 ?>
	    	 

	    		<table class="table table-hover">
                <thead>

                	<tr style="background-color:#3b6c9b; color: #ffff;">
                		<th colspan="4" style="border: 1px solid #fff;" ><?php echo "<center> Registro de asiento: ".$num['numAsiento']."</center>"; ?></th>
                	</tr>
                	<tr style="background-color:#3b6c9b; color: #ffff; ">
                		<th  style="border: 1px solid #fff;"><center>Fecha</center></th>
                		<th  style="border: 1px solid #fff;"><center>Código</center></th>
                		<th  style="border: 1px solid #fff;"><center>Póliza</center></th>
                		<th  style="border: 1px solid #fff;" ><center>Cuenta</center></th>
                		<th  style="border: 1px solid #fff;"><center>Parcial</center></th>
                    	<th  style="border: 1px solid #fff;"><center>Debe</center></th>
                    	<th  style="border: 1px solid #fff;"><center>Haber</center></th>
                    	<th  style="border: 1px solid #fff;"><center>Acción</center></th>
                  </tr>

              	</thead>
                <?php
	    		$sql = "SELECT * FROM `diario` Where nom_us= '$nombre' && numAsiento='$asiento'";
	    		
	      		$consulta1 = mysqli_query($conexion, $sql);
	      		if($consulta1->num_rows === 0) {
	        		echo "<br><div style=\"border:1px solid #88C4FF; background-color:#88C4FF;\">
	                	<center>No hay datos, registra tu primer asiento.</center>
	         		</div>";
	        	//echo "No hay resultados <br><br><br>";
	      		} else { 
	    		 ?>
                <tbody>
                	<?php
		              $rownumber=0;
		              while($rowedit = mysqli_fetch_array($consulta1)){
		              $rownumber++;
		              $id=$rowedit["id"];
		              //$numAsiento=$rowedit["numAsiento"];
		              $fecha_d = $rowedit["fecha"];
		              $codigo_d = $rowedit["codigo_cuen"];
		              $poliza_d = $rowedit["poliza"];
		              $concepto_d = $rowedit["concepto"];
		              $parcial_d = $rowedit["parcial"];
		              $cargo_d = $rowedit["cargo"];
		              $abono_d = $rowedit["abono"];
		              $nom_us = $rowedit["nom_us"];
	              	?>
	              	<tr>
	              		<td style="background-color: #ECDBA5; border: 1px solid #fff; width: 101px;" id="fecha:<?php echo $id; ?>" contenteditable="false"><?php echo $fecha_d; ?></td>
	              		<td style="background-color: #c3dec9; border: 1px solid #fff;" id="codigo_cuen:<?php echo $id; ?>" contenteditable="false"><?php echo $codigo_d; ?></center></td>
	              		<td style="background-color: #ECDBA5; border: 1px solid #fff; width: 101px" id="poliza:<?php echo $id; ?>" contenteditable="true"><?php echo $poliza_d; ?></td>
	                    <?php  
							if ($cargo_d === "0") {
							?>
								<td align="center"style="background-color: #c3dec9; border: 1px solid #fff; width: 500%;" id="concepto:<?php echo $id; ?>" contenteditable="false"><?php echo $concepto_d; ?></td>
							<?php
							}else{
							?>
								<td align="left" style="background-color: #c3dec9; border: 1px solid #fff; width: 500%;;" id="concepto:<?php echo $id; ?>" contenteditable="false"><?php echo $concepto_d; ?></td>
							<?php 
							}
						?>
						<td style="background-color: #c3dec9; border: 1px solid #fff;" id="parcial:<?php echo $id; ?>" contenteditable="true"><?php echo $parcial_d; ?></td>
                    	<td class="text-right" style="background-color: #ECDBA5; border: 1px solid #fff;" id="cargo:<?php echo $id; ?>" contenteditable="true"><?php echo $cargo_d; ?></td>
                    	<td class="text-right" style="background-color: #c3dec9; border: 1px solid #fff;" id="abono:<?php echo $id; ?>" contenteditable="true"><?php echo $abono_d; ?></center></td>
                    	<td style="background-color: #c3dec9; border: 1px solid #ffff; width: 150px;"><center><a href="diario/eliminar_reg.php?no=<?php echo $id; ?>"> <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> </a></center></td>
	              	</tr>
	              	    <!-- Modal asiento -->
				        <div  id="test1" class="modal fade" role="dialog" style="z-index: 1400;">
				        	<div class="modal-dialog">
				        		
				        		<!-- Modal content-->
				        		<div class="modal-content">

				        		<div class="modal-header">
				        			<h5 class="modal-title" id="exampleModalLabel">Cerrar asiento </h5>
				        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				        				<span aria-hidden="true">×</span>
				        			</button>
				        		</div>
				        		<div class="modal-body">
				        			<div class="form-group">
				        			<form method="POST" action="diario/guardarasiento.php" id="result-username">
				        				<div class="form-group col-md-12">
				        					<input type="number" name="numAsiento" id="numAsiento" required class="form-control" placeholder="Numero de asiento"> </input>
				        					<!--  -->        									
				        				</div>
				        				<div class="form-group col-md-12">
				        					<input type="descripcion" name="descripcion" id="cuenta" placeholder="Redacción del asiento" required class="form-control"/>
				        				</div>
				        				<div class="form-group col-md-12" hidden="true">
				        					<label>usuario</label>
				        					<input type="text" name="nom_us" id="nom_us" class="form-control" value="<?php echo $nombre ?>"/>
				        				</div>

				        			</form>
				        			</div>
				        		</div>					        		

					        	</div>
					        	</div>
				        </div>
	             <?php } ?>
                </tbody>
                <tfoot>
                	<?php  
			            // Codigo para buscar en tu base de datos acá
			            // SELECT SUM(`cargo`) FROM `diario` WHERE `nom_us`='admin'
			            $sqlcargo = "SELECT SUM(cargo) FROM diario  Where nom_us= '$nombre' && `numAsiento` NOT IN (SELECT `numAsiento` from diario where `numAsiento` ='AIVA')";
			            $sqlabono = "SELECT SUM(abono) FROM diario  Where nom_us= '$nombre' && `numAsiento` NOT IN (SELECT `numAsiento` from diario where `numAsiento` ='AIVA')";
			            //cargo
			            $rescargo = $conexion->query($sqlcargo);
			              $datocargo = $rescargo->fetch_assoc();
			            if(isset($datocargo['SUM(cargo)'])){
			              $cargo = $datocargo['SUM(cargo)'];
			            }else{
			              $cargo="0";
			            }
			            //abono
			            $resabono = $conexion->query($sqlabono);
			              $datoabono = $resabono->fetch_assoc();
			            if(isset($datoabono['SUM(abono)'])){
			              $abono = $datoabono['SUM(abono)'];
			            }else{
			              $abono="0";
			            }
			        ?>
			        <!--Suma individual de cada asiento-->
                	<tr>
                		<?php 
                		 	$sqlcargo_i = "SELECT SUM(cargo) FROM diario  Where nom_us= '$nombre' && numAsiento ='$asiento'";
			            	$sqlabono_i = "SELECT SUM(abono) FROM diario  Where nom_us= '$nombre' && numAsiento ='$asiento'";

			            	$res_car = $conexion->query($sqlcargo_i);
				            $dacargo = $res_car->fetch_assoc();
				            if(isset($dacargo['SUM(cargo)'])){
				              $cargo_i = $dacargo['SUM(cargo)'];
				            }else{
				              $cargo_i="0";
				            }
				            //abono
				            $res_abo = $conexion->query($sqlabono_i);
				              $dabono = $res_abo->fetch_assoc();
				            if(isset($dabono['SUM(abono)'])){
				              $abono_i = $dabono['SUM(abono)'];
				            }else{
				              $abono_i="0";

				            }
				           
                		?>
                		<td colspan="3">
                			<?php 
                			$sql = "SELECT descripcion FROM asientos Where nom_us= '$nombre' && numAsiento='$asiento'";
                			$resultset1 = mysqli_query($conexion, $sql) or die("error base de datos:". mysqli_error($conexion));
                			$a = $resultset1->fetch_assoc();
                			if (isset($a)) {
                			$asi1= implode(";", $a);
                			echo $asi1;
                			}else{
                				$asi1= 'No has registrado datos.';
                				echo $asi1;
                			}
                			?>
                			
                		</td>
                		<td class="text-right" >
                			<?php
                			if ($cargo_i == 0) {
                				//echo "Existe una diferecia de $ ".$abono_i;
                			}else{
                				$r=$cargo_i-$abono_i;
                				if ($r > 0) {
                					echo "<font color=\"red\">Las sumas no son iguales (Diferencia: $".$r.")";
                				}else{

                				}	
                			}if ($abono_i == 0) {
                				//echo "<Existe una diferecia de $".$cargo_i;
                			}else{
                				$r=$abono_i-$cargo_i;
                				if ($r > 0) {
                					echo "<font color=\"red\">Las sumas no son iguales (Diferencia: $".$r.")";
                				}else{

                				}
                				
                			}
                			?>
                		</td>
                		
                		<td class="text-right" style="background-color:#3b6c9b; color: #ffff;"><b ><strong>Total</b></strong></td>
                		<td class="text-right" style="background-color: #ECDBA5; border: 1px solid #fff;">$<?php echo $cargo_i; ?></td>
                		<td class="text-right" style="background-color: #c3dec9; border: 1px solid #fff;">$<?php echo $abono_i; ?></td>
                		<?php 
                		if ($cargo_i == $abono_i) {

                			?>
                			<?php 
                			$countAs = "SELECT COUNT(*) FROM asientos Where nom_us= '$nombre' && numAsiento='$asiento'";
							$res = mysqli_query($conexion, $countAs);
				                $dato = $res->fetch_assoc();
				              if($dato['COUNT(*)']==1){
				                ?>
				                <td align="center" style="background-color: #c3dec9; border: 1px solid #fff;" id="tabono"></td>
				                <?php
				              }else{
				                ?>
				                <td align="center" style="background-color: #c3dec9; border: 1px solid #fff;" id="tabono"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#test1"><i class="fas fa-edit" aria-hidden="true"></i></button></td>
				                <?php
				                }
                			 ?>
                			<?php
                		}
                		?>
                		
                    </tr>
                    <?php  }}?>

                    <!--Suma total del debe y haber-->
                   <tr  style="height:1px; border-bottom: 2px solid #fff">
                   		<td colspan="9" height="1px" ></td>
                   </tr>
                   <td class="text-right" style="border-right: 1px solid #fff;  border-bottom: 2px solid #fff; background-color:#3b6c9b; color: #ffff;" colspan="5"><b ><strong>Total de debe y haber</strong></b></td>
                   <td align="right" style="background-color: #ECDBA5; border: 1px solid #fff;" id="tcargo" >$<?php echo $cargo; ?></td>
                   <td align="right" style="background-color: #c3dec9; border: 1px solid #fff;" id="tabono" >$<?php echo $abono; ?></td>
                   <?php  
		              if ($cargo == $abono) {
		              	?>
		              		<td align="center" style="background-color: #c3dec9; border: 1px solid #fff;" id="tabono" >
		              			<a href="pdf/diario.php" target="_blank"> <button  title="Descargar Libro diario.pdf" type="button" class="btn btn-dark"><i class="fa fa-download"></i></button> </a>
		              		</td>
		              	<?php
		              }else{
		              	?>
		              		<td title="¡Para poder descargar el formato PDF necesitas igualar tus totales!" align="center" class="table-success"  style="background-color: #c3dec9; border: 1px solid #fff;" id="tabono" > <font size="2" color="red">Existe <br> una diferencia <br> en tu total</font> 
		              		</td>
		              <?php
		              }
		            ?>
		            
                </tfoot>

            </table>
	    </div>

	    <?php }?>
	</div>
  	 
  	<!-- Fin de Tabla -->




  <!-- busqueda cuentas -->
	  <script>
	      document.getElementById("cod_cuenta").onchange = function(){alerta()};
	      
	      function alerta() {
	          // Creando el objeto para hacer el request
	          var request = new XMLHttpRequest();
	   
	          // Objeto PHP que consultaremos
	          request.open("POST", "diario/busquedacat.php");
	   
	          // Definiendo el listener
	          request.onreadystatechange = function() {
	              // Revision si fue completada la peticion y si fue exitosa
	              if(this.readyState === 4 && this.status === 200) {
	                  // Ingresando la respuesta obtenida del PHP
	                  document.getElementById("cuenta").value = this.responseText;
	              }
	          };
	   
	          // Recogiendo la data del HTML
	          var myForm = document.getElementById("myForm");
	          var formData = new FormData(myForm);
	   
	          // Enviando la data al PHP
	          request.send(formData);
	      }
	  </script>
	<!-- acordeon -->
  	<script type="text/javascript">
		var acc = document.getElementsByClassName("accordion1");
		var i;

		for (i = 0; i < acc.length; i++) {
		  acc[i].addEventListener("click", function() {
		    this.classList.toggle("active1");
		    var panel = this.nextElementSibling;
		    if (panel.style.maxHeight){
		      panel.style.maxHeight = null;
		    } else {
		      panel.style.maxHeight = panel.scrollHeight + "px";
		    } 
		  });
		}
	</script>
  <!--  
		<div class="gen">
			s
		</div>
	-->
	   	</main>
	   <!-- titulo -->
	   <script>
		    $(function(){
		      //Mensaje
		        var message_status = $("#titulo");
		        $("td[contenteditable=true]").blur(function(){
		            var rownumber = $(this).attr("id");
		            var value = $(this).text();
		            $.post('diario/titulo.php' , rownumber + "=" + value, function(data){
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
	   <!--  -->
		<!--TABLA  -->
		<script>
		    $(function(){
		      //Mensaje
		        var message_status = $("#status");
		        $("td[contenteditable=true]").blur(function(){
		            var rownumber = $(this).attr("id");
		            var value = $(this).text();
		            $.post('diario/proceso.php' , rownumber + "=" + value, function(data){
		                if(data != '')
		          {
		            message_status.show();
		            message_status.html(data);
		            //hide the message
		            setTimeout(function(){message_status.html("REGISTRO ACTUALIZADO CORRECTAMENTE");},2000);
		            setTimeout(function(){location.reload();},1000);
		          } else {
		            //message_status().html = data;
		          }
		            });
		        });
		    });
 		</script>
		<!--  -->
		</div>
		</div>
		<!--  -->
		<script type="text/javascript">
			$(document).ready(function() {	
			    $('#numAsiento').on('blur', function() {
			        $('#result-username').html('<img src="diario/images/loader2.gif" />').fadeOut(1000);
			 
			        var username = $(this).val();		
			        var dataString = 'username='+username;
			 
			        $.ajax({
			            type: "POST",
			            url: "diario/validar.php",
			            data: dataString,
			            success: function(data) {
			                $('#result-username').fadeIn(1000).html(data);
			            }
			        });
			    });              
			});    
			</script>
 		<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="lib/js/invoice.js"></script>
        			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="lib/js/invoice.js"></script>
	</body>
</html>