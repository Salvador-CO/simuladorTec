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
        <title>Balanza de pagos</title>
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
			    padding: 10px;
			    width: 100%;
			    text-align: left;
			    border: 1px solid white;
			    
			    
			    /**font: 20px Lato, sans-serif;**/
			}

			.accordion2 {
			    background-color: #3b6c9b;
			    padding: 10px;
			    width: 100%;
			    text-align: left;
			    border: 1px solid white;
			    
			    
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

			
		</style>
		<!--  -->

	</head>


	<?php require "menueconomia.php" ?>

		<!--Titulo-->
	<div class="container-fluid">
		    <center><h1 class="mt-4">Balanza de pagos</h1></center>
		    <ol class="breadcrumb mb-4">
		    	<li class="breadcrumb-item active"><b>Instrucciones:</b> En el siguiente apartado podrás realizar tu Balanza de Pagos, conforme a la información proporcionada en el Reactivo Integrador Multidisciplina (RIM). Así mismo, al terminar de realizar tu ejercicio deberás descargarlo en formato PDF para posteriormente poder subirlo en el apartado “Carga de archivos”. </li>
		    </ol>
		    
		  	<div class="registro">
		   	<br>
			</div>
			<!-- Modal -->
	            
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
            $sql ="SELECT * FROM encabezadoeco WHERE nom_us='$nombre'";
            $consulta = mysqli_query($conexion, $sql);
            if($consulta->num_rows === 0) {
              ?>
              	<!-- ven modal -->
				<div >
					<h4 class="accordion1" style="text-align: center;"><font size="3"  color="#fff"> Encabezado </font></h4>
					<div class="panel1">
						<form method="POST" action="balanza/guardartitulo.php" >
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
	<br>
	<div class="registro">
		    <h4 class="accordion2" style="text-align: center;"><font size="3"  color="#fff">  Registro(s) </font></h4>
		    <div>
		    <form id="myForm" action="balanza/guardar.php" method="POST">
		        <div class="form-row">
		           <div class="form-group col-md-6">
		                <label for="tipo">Tipo:</label>
		                <select name="tipo" id="tipo" class="form-control">
		                    <option value="Balanza de cuenta corriente" > Balanza de cuenta corriente</option>
		                    <option value="Balanza de cuenta capital" > Balanza de cuenta capital</option>
		                    <option value="Balanza financiera" > Balanza financiera</option>
		                    <option value="Balanza de pagos" > Balanza de pagos</option>
		                    <option value="Errores y omisiones" > Errores y omisiones</option>
		                </select>
		            </div>
		           <div class="form-group col-md-6">
		                <label for="concepto">Concepto:</label>
		                <input type="text" name="concepto" class="form-control" required >
		            </div> 
		            <div class="form-group col-md-3">
		                <label for="ingresos">Ingresos o variación de pasivos:</label>
		                <input type="text" name="ingresos_vpasivos" class="form-control" value="0">
		            </div>
		            <div class="form-group col-md-3">
		                <label for="pagos">Pagos o variación de activos: </label>
		                <input type="number" step = "any" name="pagos_vactivos" class="form-control" value="0">
		            </div>
		             <div class="form-group col-md-3">
		                <label for="saldos">Saldos o (VP-VA): </label>
		                <input type="number" step = "any" name="saldos_vpva" class="form-control" value="0">
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
	      
	      $sql = "SELECT * FROM `regbalanza` Where nom_us= '$nombre'";
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
<!-- DUDAAAAAAAA-->
	    	<?php 
	    	$sql_query = "SELECT `tipo` FROM `regbalanza` WHERE `nom_us`='$nombre'";
              $resultset = mysqli_query($conexion, $sql_query) or die("error base de datos:". mysqli_error($conexion));
              while( $num = mysqli_fetch_assoc($resultset) ) {
              $asiento= implode(";", $num);
             
	    	 ?>
	    	 

	    		<table class="table table-hover">
                <thead>

                	<tr style="background-color:#3b6c9b; color: #ffff;">
                		<th colspan="4" style="border: 1px solid #fff;" ><?php echo "<center> Registro de asiento: ".$num['tipo']."</center>"; ?></th>
                	</tr>
                	<tr style="background-color:#3b6c9b; color: #ffff; ">
                		<th  style="border: 1px solid #fff;"><center>Tipo</center></th>
                		<th  style="border: 1px solid #fff;"><center>Concepto</center></th>
                		<th  style="border: 1px solid #fff;"><center>Ingresos</center></th>
                    	<th  style="border: 1px solid #fff;"><center>Pagos</center></th>
                    	<th  style="border: 1px solid #fff;"><center>Saldos</center></th>
                    	<th  style="border: 1px solid #fff;"><center>Acción</center></th>
                  </tr>

              	</thead>
                <?php
	    		$sql = "SELECT * FROM `regbalanza` Where nom_us= '$nombre'";  //Duda
	    		
	      		$consulta1 = mysqli_query($conexion, $sql);
	      		if($consulta1->num_rows === 0) {
	        		echo "<br><div style=\"border:1px solid #88C4FF; background-color:#88C4FF;\">
	                	<center>No hay datos</center>
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
		              $tipo_bp = $rowedit["tipo"];
		              $concepto_bp = $rowedit["concepto"];
		              $ingresos_bp = $rowedit["ingresos"];
		              $pagos_bp = $rowedit["pagos"];
		              $saldos_bp = $rowedit["saldos"];
		              $nom_us = $rowedit["nom_us"];
	              	?>
	              	<tr>
	              		<td style="background-color: #ECDBA5; border: 1px solid #fff; width: 101px;" id="tipo:<?php echo $id; ?>" contenteditable="false"><?php echo $tipo_bp; ?></td>
	              		<td style="background-color: #c3dec9; border: 1px solid #fff;" id="concepto:<?php echo $id; ?>" contenteditable="false"><?php echo $concepto_bp; ?></center></td>
	              		<td style="background-color: #ECDBA5; border: 1px solid #fff; width: 101px" id="ingresos:<?php echo $id; ?>" contenteditable="true"><?php echo $ingresos_bp; ?></td>
						<td style="background-color: #c3dec9; border: 1px solid #fff;" id="pagos:<?php echo $id; ?>" contenteditable="true"><?php echo $pagos_bp; ?></td>
                    	<td class="text-right" style="background-color: #ECDBA5; border: 1px solid #fff;" id="saldos:<?php echo $id; ?>" contenteditable="true"><?php echo $saldos_bp; ?></td>
                    	<td style="background-color: #c3dec9; border: 1px solid #ffff; width: 150px;"><center><a href="balanza/eliminar_reg.php?no=<?php echo $id; ?>"> <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> </a></center></td>
	              	</tr>
	              	    <!-- Modal asiento -->
				       
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
                   <td class="text-right" style="border-right: 1px solid #fff;  border-bottom: 2px solid #fff; background-color:#3b6c9b; color: #ffff;" colspan="5"><b ><strong>Saldo final</strong></b></td>
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