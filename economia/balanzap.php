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
		    .prin{
		    	border: 1px solid;
		    	margin-left: 2%;
		      margin-right: 2%;
		    }
		    .titulotabla{
		    	background: #3B6C9B;
		    	color: #fff;
		    }

		    td,th{
		    	border: 1px solid;


		    }
	  	</style>

	  	
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

			<!--Contenido dentro del div con margen-->
			<!--  -->
	</div>
		<!-- fin cabezera -->


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
	<br>
	<!-- principal -->
		<div class="prin">
			<!-- Tabla 1 - Balanza de cuenta corriente -->
			<table class="table">
				<thead align="center">
			  		<tr class="titulotabla">
			      	<th scope="col" colspan="5" >Balanza de Cuenta Corriente</th>
			    	</tr>
				    <tr class="titulotabla">
				      <th scope="col">Concepto</th>
				      <th scope="col">Ingresos</th>
				      <th scope="col">Pagos</th>
				      <th scope="col">Saldos</th>
				      <th><button type="button" class="btn btn-info " data-toggle="modal" data-target="#test1"><i class="fas fa-edit" aria-hidden="true"></i></button></th>
				    </tr>
			  	</thead>
			  	<tbody>
				  	<?php
				  	$sql1 = "SELECT * FROM regbalanza WHERE nom_us='$nombre' && tipo = 'BCC'";
	            	$consulta1 = mysqli_query($conexion, $sql1);
	            	if ($consulta1->num_rows === 0) {
				  	?>
				  	<tr>
				      <th scope="row"></th>
				      <td></td>
				      <td></td>
				      <td></td>
				      <td></td>
				    </tr>
				    <?php
					} else {
						 while($rowedit = mysqli_fetch_array($consulta1)){
			                $id=$rowedit["id"];
			                $con = $rowedit["concepto"];
			                $ing = $rowedit["ingresos"];
			                $pag = $rowedit["pagos"];
			                $sal = $rowedit["saldos"];
					?>
					 <tr>
				      <th scope="row"> <?php echo $con;?></th>
				      <td align="right"><?php echo number_format($ing,2); ?></td>
				      <td align="right"><?php echo number_format($pag,2); ?></td>
				      <td align="right"><?php echo number_format($sal,2); ?></td>
				      <td><center><a href="balanza/eliminar_reg.php?no=<?php echo $id; ?>" > <button type="button" class="btn " onclick="return Confirmation()" ><i class="fas fa-trash-alt"></i></button> </a></center></td>
				    </tr>
					<?php
					} //Fin del while
					} //Fin del else general
					?>
			  	</tbody>
			  	<tfoot>
			  		<tr class="titulotabla">
			  			<td> <strong>Saldo por balanza cuenta corriente</strong> </td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  		</tr>
			  	</tfoot>
			</table>
			<!-- Tabla 2 - Balanza de cuenta capital -->
			<table class="table">
				<thead align="center">
			  		<tr class="titulotabla">
			      	<th scope="col" colspan="5" >Balanza de Cuenta Capital</th>
			    	</tr>
				    <tr class="titulotabla">
				      <th scope="col">Concepto</th>
				      <th scope="col">Ingresos</th>
				      <th scope="col">Pagos</th>
				      <th scope="col">Saldos</th>
				      <th><button type="button" class="btn btn-info " data-toggle="modal" data-target="#test2"><i class="fas fa-edit" aria-hidden="true"></i></button></th>
				    </tr>
			  	</thead>
			  	<tbody>
				  	<?php
				  	$sql2 = "SELECT * FROM regbalanza WHERE nom_us='$nombre' && tipo = 'BCCap'";
	            	$consulta2 = mysqli_query($conexion, $sql2);
	            	if ($consulta2->num_rows === 0) {
				  	?>
				  	<tr>
				      <th scope="row"></th>
				      <td></td>
				      <td></td>
				      <td></td>
				      <td></td>
				    </tr>
				    <?php
					} else {
						 while($rowedit = mysqli_fetch_array($consulta2)){
			                $id=$rowedit["id"];
			                $con = $rowedit["concepto"];
			                $ing = $rowedit["ingresos"];
			                $pag = $rowedit["pagos"];
			                $sal = $rowedit["saldos"];
					?>
					 <tr>
				      <th scope="row"> <?php echo $con;?></th>
				      <td align="right"><?php echo number_format($ing,2); ?></td>
				      <td align="right"><?php echo number_format($pag,2); ?></td>
				      <td align="right"><?php echo number_format($sal,2); ?></td>
				      <td><center><a href="balanza/eliminar_reg.php?no=<?php echo $id; ?>" > <button type="button" class="btn " onclick="return Confirmation()" ><i class="fas fa-trash-alt"></i></button> </a></center></td>
				    </tr>
					<?php
					} //Fin del while
					} //Fin del else general
					?>
			  	</tbody>
			  	<tfoot>
			  		<tr class="titulotabla">
			  			<td> <strong>Saldo por balanza cuenta capital</strong> </td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  		</tr>
			  	</tfoot>
			</table>
			<!-- Tabla 3 - Balanza financiera -->
			<table class="table">
				<thead align="center">
			  		<tr class="titulotabla">
			      	<th scope="col" colspan="5" >Balanza Financiera</th>
			    	</tr>
				    <tr class="titulotabla">
				      <th scope="col">Concepto</th>
				      <th scope="col">Ingresos</th>
				      <th scope="col">Pagos</th>
				      <th scope="col">Saldos</th>
				      <th><button type="button" class="btn btn-info " data-toggle="modal" data-target="#test3"><i class="fas fa-edit" aria-hidden="true"></i></button></th>
				    </tr>
			  	</thead>
			  	<tbody>
				  	<?php
				  	$sql3 = "SELECT * FROM regbalanza WHERE nom_us='$nombre' && tipo = 'BF'";
	            	$consulta3 = mysqli_query($conexion, $sql3);
	            	if ($consulta3->num_rows === 0) {
				  	?>
				  	<tr>
				      <th scope="row"></th>
				      <td></td>
				      <td></td>
				      <td></td>
				      <td></td>
				    </tr>
				    <?php
					} else {
						 while($rowedit = mysqli_fetch_array($consulta3)){
			                $id=$rowedit["id"];
			                $con = $rowedit["concepto"];
			                $ing = $rowedit["ingresos"];
			                $pag = $rowedit["pagos"];
			                $sal = $rowedit["saldos"];
					?>
					 <tr>
				      <th scope="row"> <?php echo $con;?></th>
				      <td align="right"><?php echo number_format($ing,2); ?></td>
				      <td align="right"><?php echo number_format($pag,2); ?></td>
				      <td align="right"><?php echo number_format($sal,2); ?></td>
				      <td><center><a href="balanza/eliminar_reg.php?no=<?php echo $id; ?>" > <button type="button" class="btn " onclick="return Confirmation()" ><i class="fas fa-trash-alt"></i></button> </a></center></td>
				    </tr>
					<?php
					} //Fin del while
					} //Fin del else general
					?>
			  	</tbody>
			  	<tfoot>
			  		<tr class="titulotabla">
			  			<td> <strong>Saldo por balanza financiera</strong> </td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  		</tr>
			  	</tfoot>
			</table>
			<!-- Tabla 4 - Balanza de pagos-->
			<table class="table">
				<thead align="center">
			  		<tr class="titulotabla">
			      	<th scope="col" colspan="5" >Balanza de Pagos</th>
			    	</tr>
				    <tr class="titulotabla">
				      <th scope="col">Concepto</th>
				      <th scope="col">Ingresos</th>
				      <th scope="col">Pagos</th>
				      <th scope="col">Saldos</th>
				      <th><button type="button" class="btn btn-info " data-toggle="modal" data-target="#test4"><i class="fas fa-edit" aria-hidden="true"></i></button></th>
				    </tr>
			  	</thead>
			  	<tbody>
				  	<?php
				  	$sql4 = "SELECT * FROM regbalanza WHERE nom_us='$nombre' && tipo = 'BP'";
	            	$consulta4 = mysqli_query($conexion, $sql4);
	            	if ($consulta4->num_rows === 0) {
				  	?>
				  	<tr>
				      <th scope="row"></th>
				      <td></td>
				      <td></td>
				      <td></td>
				      <td></td>
				    </tr>
				    <?php
					} else {
						 while($rowedit = mysqli_fetch_array($consulta4)){
			                $id=$rowedit["id"];
			                $con = $rowedit["concepto"];
			                $ing = $rowedit["ingresos"];
			                $pag = $rowedit["pagos"];
			                $sal = $rowedit["saldos"];
					?>
					 <tr>
				      <th scope="row"> <?php echo $con;?></th>
				      <td align="right"><?php echo number_format($ing,2); ?></td>
				      <td align="right"><?php echo number_format($pag,2); ?></td>
				      <td align="right"><?php echo number_format($sal,2); ?></td>
				      <td><center><a href="balanza/eliminar_reg.php?no=<?php echo $id; ?>" > <button type="button" class="btn " onclick="return Confirmation()" ><i class="fas fa-trash-alt"></i></button> </a></center></td>
				    </tr>
					<?php
					} //Fin del while
					} //Fin del else general
					?>
			  	</tbody>
			  	<tfoot>
			  		<tr class="titulotabla">
			  			<td> <strong>Saldo por balanza de pagos</strong> </td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  		</tr>
			  	</tfoot>
			</table>
			<!-- Tabla 5 - Errores y omisiones-->
			<table class="table">
				<thead align="center">
			  		<tr class="titulotabla">
			      	<th scope="col" colspan="5" >Balanza de Errores y Omisiones</th>
			    	</tr>
				    <tr class="titulotabla">
				      <th scope="col">Concepto</th>
				      <th scope="col">Ingresos</th>
				      <th scope="col">Pagos</th>
				      <th scope="col">Saldos</th>
				      <th><button type="button" class="btn btn-info " data-toggle="modal" data-target="#test5"><i class="fas fa-edit" aria-hidden="true"></i></button></th>
				    </tr>
			  	</thead>
			  	<tbody>
				  	<?php
				  	$sql5 = "SELECT * FROM regbalanza WHERE nom_us='$nombre' && tipo = 'EO'";
	            	$consulta5 = mysqli_query($conexion, $sql5);
	            	if ($consulta5->num_rows === 0) {
				  	?>
				  	<tr>
				      <th scope="row"></th>
				      <td></td>
				      <td></td>
				      <td></td>
				      <td></td>
				    </tr>
				    <?php
					} else {
						 while($rowedit = mysqli_fetch_array($consulta5)){
			                $id=$rowedit["id"];
			                $con = $rowedit["concepto"];
			                $ing = $rowedit["ingresos"];
			                $pag = $rowedit["pagos"];
			                $sal = $rowedit["saldos"];
					?>
					 <tr>
				      <th scope="row"> <?php echo $con;?></th>
				      <td align="right"><?php echo number_format($ing,2); ?></td>
				      <td align="right"><?php echo number_format($pag,2); ?></td>
				      <td align="right"><?php echo number_format($sal,2); ?></td>
				      <td><center><a href="balanza/eliminar_reg.php?no=<?php echo $id; ?>" > <button type="button" class="btn " onclick="return Confirmation()" ><i class="fas fa-trash-alt"></i></button> </a></center></td>
				    </tr>
					<?php
					} //Fin del while
					} //Fin del else general
					?>
			  	</tbody>
			  	<tfoot>
			  		<tr class="titulotabla">
			  			<td> <strong>Saldo por errores y omisiones</strong> </td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  			<td align="right"><?php echo number_format(0,2); ?></td>
			  		</tr>
			  	</tfoot>
			</table>

			<?php 
     			$sqlcon="SELECT count(*) FROM regbalanza Where nom_us= '$nombre'";
              	//echo $sqlcargo;
            	$res = $conexion->query($sqlcon);
                $dato = $res->fetch_assoc();
                $resul = $dato['count(*)'];
                if($resul>=2){
                	?>
                <br>
            	
            	<div class="table-responsive">
        			<center>
          				<a href="pdf/balanzap.php" target="_blank"> <button  title="Descargar Balanza de pagos.pdf" type="button" class="btn btn-outline-secondary"><img src="../iconos/download-solid.svg" width="18px;"></i></button></a>
          
          				<a href="balanza/eliminar.php?nom=<?php echo $nombre; ?>">
        				<button title="Eliminar cuentas de libro mayor" type="button" class="btn btn-outline-danger"><img src="../iconos/eliminar.svg" width="18px;"></button></a>
           			</center><br><br>
     			</div> 
              		<?php
              	}
            ?>


		</div>


	<!-- fin principal -->


		<!-- modal 1 -->
            <div id="test1" class="modal fade" role="dialog" style="z-index: 1400;">
              <div class="modal-dialog " >
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header" style="background: #1B396A; color: #fff;">
                    <h5 class="modal-title">Formulario de registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <div class="modal-body">
                    <!-- formulario -->
					<form action="balanza/registro.php" method="POST">
						<div  class="form-group row" hidden="true">
					    	<label for="tipo" class="col-sm-2 col-form-label">Tipo: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="tipo" name="tipo" value="BCC">
					    </div>
					  </div>
						<div class="form-group row">
					    	<label for="concepto" class="col-sm-2 col-form-label">Concepto: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="concepto" name="concepto" placeholder="Ingrese concepto" required>
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="ingresos" class="col-sm-2 col-form-label">Ingresos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control montoBCC" id="ingresos" name="ingresos" placeholder="Ingrese ingreso" value="0" onchange="sumarBCC();">
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="pagos" class="col-sm-2 col-form-label">Pagos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control montoBCC" id="pagos" name="pagos" placeholder="Ingrese pago" value="0" onchange="sumarBCC();">
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="saldos" class="col-sm-2 col-form-label">Saldos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control" id="saldos" name="saldos" placeholder="Ingrese saldo" value="0" readonly>
					    </div>
					  </div>
					  <div  class="form-group row" hidden="true">
					    	<label for="nom_us" class="col-sm-2 col-form-label">Usuario: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="nom_us" name="nom_us" value="<?php echo $nombre; ?>">
					    </div>
					  </div>
					  <center><button type="submit" class="btn btn-primary mb-2">Confirmar</button></center>
					</form>
                    <!-- Fin formulario -->
                   



                    </div>  
                        
                    
                    
                  </div>      
                </div>
              </div>
           
        <!-- fin de modal 1 -->

        <!-- modal 2-->
            <div id="test2" class="modal fade" role="dialog" style="z-index: 1400;">
              <div class="modal-dialog " >
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header" style="background: #1B396A; color: #fff;">
                    <h5 class="modal-title">Formulario de registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <div class="modal-body">
                    <!-- formulario -->
					<form action="balanza/registro.php" method="POST">
						<div  class="form-group row" hidden="true">
					    	<label for="tipo" class="col-sm-2 col-form-label">Tipo: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="tipo" name="tipo" value="BCCap">
					    </div>
					  </div>
						<div class="form-group row">
					    	<label for="concepto" class="col-sm-2 col-form-label">Concepto: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="concepto" name="concepto" placeholder="Ingrese concepto" required>
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="ingresos" class="col-sm-2 col-form-label">Ingresos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control " id="ingresosBCCcap" name="ingresos" placeholder="Ingrese ingreso" value="0" onchange="sumarBCCap();">
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="pagos" class="col-sm-2 col-form-label">Pagos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control " id="pagosBCCap" name="pagos" placeholder="Ingrese pago" value="0" onchange="sumarBCCap();">
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="saldos" class="col-sm-2 col-form-label">Saldos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control" id="saldosBCCap" name="saldos" placeholder="Ingrese saldo" value="0" readonly>
					    </div>
					  </div>
					  <div  class="form-group row" hidden="true">
					    	<label for="nom_us" class="col-sm-2 col-form-label">Usuario: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="nom_us" name="nom_us" value="<?php echo $nombre; ?>">
					    </div>
					  </div>
					  <center><button type="submit" class="btn btn-primary mb-2">Confirmar</button></center>
					</form>
                    <!-- Fin formulario -->
                    </div>  
                  </div>      
                </div>
              </div>
           
        <!-- fin de modal 2 -->

        <!-- modal 3-->
            <div id="test3" class="modal fade" role="dialog" style="z-index: 1400;">
              <div class="modal-dialog " >
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header" style="background: #1B396A; color: #fff;">
                    <h5 class="modal-title">Formulario de registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <div class="modal-body">
                    <!-- formulario -->
					<form action="balanza/registro.php" method="POST">
						<div  class="form-group row" hidden="true">
					    	<label for="tipo" class="col-sm-2 col-form-label">Tipo: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="tipo" name="tipo" value="BF">
					    </div>
					  </div>
						<div class="form-group row">
					    	<label for="concepto" class="col-sm-2 col-form-label">Concepto: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="concepto" name="concepto" placeholder="Ingrese concepto" required>
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="ingresos" class="col-sm-2 col-form-label">Ingresos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control " id="ingresosBF" name="ingresos" placeholder="Ingrese ingreso" value="0" onchange="sumarBF();">
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="pagos" class="col-sm-2 col-form-label">Pagos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control " id="pagosBF" name="pagos" placeholder="Ingrese pago" value="0" onchange="sumarBF();">
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="saldos" class="col-sm-2 col-form-label">Saldos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control" id="saldosBF" name="saldos" placeholder="Ingrese saldo" value="0" readonly>
					    </div>
					  </div>
					  <div  class="form-group row" hidden="true">
					    	<label for="nom_us" class="col-sm-2 col-form-label">Usuario: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="nom_us" name="nom_us" value="<?php echo $nombre; ?>">
					    </div>
					  </div>
					  <center><button type="submit" class="btn btn-primary mb-2">Confirmar</button></center>
					</form>
                    <!-- Fin formulario -->
                    </div>  
                  </div>      
                </div>
              </div>
           
        <!-- fin de modal 3 -->

        <!-- modal 4-->
            <div id="test4" class="modal fade" role="dialog" style="z-index: 1400;">
              <div class="modal-dialog " >
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header" style="background: #1B396A; color: #fff;">
                    <h5 class="modal-title">Formulario de registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <div class="modal-body">
                    <!-- formulario -->
					<form action="balanza/registro.php" method="POST">
						<div  class="form-group row" hidden="true">
					    	<label for="tipo" class="col-sm-2 col-form-label">Tipo: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="tipo" name="tipo" value="BP">
					    </div>
					  </div>
						<div class="form-group row">
					    	<label for="concepto" class="col-sm-2 col-form-label">Concepto: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="concepto" name="concepto" placeholder="Ingrese concepto" required>
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="ingresos" class="col-sm-2 col-form-label">Ingresos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control " id="ingresosBP" name="ingresos" placeholder="Ingrese ingreso" value="0" onchange="sumarBP();">
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="pagos" class="col-sm-2 col-form-label">Pagos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control " id="pagosBP" name="pagos" placeholder="Ingrese pago" value="0" onchange="sumarBP();">
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="saldos" class="col-sm-2 col-form-label">Saldos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control" id="saldosBP" name="saldos" placeholder="Ingrese saldo" value="0" readonly>
					    </div>
					  </div>
					  <div  class="form-group row" hidden="true">
					    	<label for="nom_us" class="col-sm-2 col-form-label">Usuario: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="nom_us" name="nom_us" value="<?php echo $nombre; ?>">
					    </div>
					  </div>
					  <center><button type="submit" class="btn btn-primary mb-2">Confirmar</button></center>
					</form>
                    <!-- Fin formulario -->
                    </div>  
                  </div>      
                </div>
              </div>
           
        <!-- fin de modal 4 -->

        <!-- modal 5-->
            <div id="test5" class="modal fade" role="dialog" style="z-index: 1400;">
              <div class="modal-dialog " >
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header" style="background: #1B396A; color: #fff;">
                    <h5 class="modal-title">Formulario de registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <div class="modal-body">
                    <!-- formulario -->
					<form action="balanza/registro.php" method="POST">
						<div  class="form-group row" hidden="true">
					    	<label for="tipo" class="col-sm-2 col-form-label">Tipo: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="tipo" name="tipo" value="EO">
					    </div>
					  </div>
						<div class="form-group row">
					    	<label for="concepto" class="col-sm-2 col-form-label">Concepto: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="concepto" name="concepto" placeholder="Ingrese concepto" required>
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="ingresos" class="col-sm-2 col-form-label">Ingresos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control " id="ingresosEO" name="ingresos" placeholder="Ingrese ingreso" value="0" onchange="sumarEO();">
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="pagos" class="col-sm-2 col-form-label">Pagos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control " id="pagosEO" name="pagos" placeholder="Ingrese pago" value="0" onchange="sumarEO();">
					    </div>
					  </div>
					  <div class="form-group row">
					    	<label for="saldos" class="col-sm-2 col-form-label">Saldos: </label>
					    <div class="col-sm-10">
					      	<input type="number" class="form-control" id="saldosEO" name="saldos" placeholder="Ingrese saldo" value="0" readonly>
					    </div>
					  </div>
					  <div  class="form-group row" hidden="true">
					    	<label for="nom_us" class="col-sm-2 col-form-label">Usuario: </label>
					    <div class="col-sm-10">
					      	<input type="text" class="form-control" id="nom_us" name="nom_us" value="<?php echo $nombre; ?>">
					    </div>
					  </div>
					  <center><button type="submit" class="btn btn-primary mb-2">Confirmar</button></center>
					</form>
                    <!-- Fin formulario -->
                    </div>  
                  </div>      
                </div>
              </div>
           
        <!-- fin de modal 5 -->




	<!--  -->
	<!--  -->
	<!--  -->
	<!--  -->
	<!--  -->
	<!--  -->
	
	
	




  
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
		
		</div>
		</div>
		<!--operaciones saldo  -->
		<script>
			function sumarBCC(){
				var n1 = document.getElementById("ingresos").value;
    			var n2 = document.getElementById("pagos").value;
    			var resultado = (n1)-(n2);
    			document.getElementById("saldos").value = resultado;
			}
			function sumarBCCap(){
				var n1 = document.getElementById("ingresosBCCcap").value;
    			var n2 = document.getElementById("pagosBCCap").value;
    			var resultado = (n1)-(n2);
    			document.getElementById("saldosBCCap").value = resultado;
			}
			function sumarBF(){
				var n1 = document.getElementById("ingresosBF").value;
    			var n2 = document.getElementById("pagosBF").value;
    			var resultado = (n1)-(n2);
    			document.getElementById("saldosBF").value = resultado;
			}
			function sumarBP(){
				var n1 = document.getElementById("ingresosBP").value;
    			var n2 = document.getElementById("pagosBP").value;
    			var resultado = (n1)-(n2);
    			document.getElementById("saldosBP").value = resultado;
			}
			function sumarEO(){
				var n1 = document.getElementById("ingresosEO").value;
    			var n2 = document.getElementById("pagosEO").value;
    			var resultado = (n1)-(n2);
    			document.getElementById("saldosEO").value = resultado;
			}


		</script>

		
		<!-- finoperaciones saldo  -->
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