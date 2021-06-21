<?php include("../conexion.php");?>
<html>
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="css/es_re.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="css/emergente.css">
        <title>Estado de Resultados Condensado</title>
        <link rel="icon" type="image/png" sizes="192x192"  href="../iconos/tecnm.png">
        
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<style type="text/css">
			.contenedor{
				margin-right: 20%;
				margin-left:  20%;
				
			}
			
			#status { padding:10px; background:#88C4FF; color:#000; font-weight:bold; font-size:12px; margin-bottom:10px; display:none; width:90%; }
		</style>
	</head>

	<?php require "menuconta.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Estado de Resultados</h1><h5>-Condensado-</h5></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active"><b>Instrucciones:</b> En el siguiente apartado podrás realizar tu estado de resultados con base en los datos dados en la balanza de comprobación. Así mismo, al terminar de realizar tu ejercicio deberás descargarlo en formato PDF para posteriormente poder subirlo en el apartado “Carga de archivos”. </li>
		</ol>
		<!--Contenido dentro del div con margen-->
		</div>
	<!--Contenido Fuera del div para q crees lo q quiera o en el anteriri ajja -->
	<div class="contenedor">
		<!-- Tabla -->
		<div class="container">
			<?php
			$sql = "SELECT * FROM `rescon` where nom_us='$nombre'";
			$consulta = mysqli_query($conexion, $sql);
			if($consulta->num_rows === 0) {
			  ?>
	      		 <form action="estado_res/insert_resconde.php" method= "POST" >
		          <center><h1>Generar tabla</h1>
		            <button type="submit" class="btn btn-outline-light"> <img src="tarjetas/tabla.svg" width="100" height="100"> </button><br>
		            <input type="text" name="nom_us" value="<?php echo $nombre;?>" hidden>
		          </center>
        		</form>
					
	      	<?php
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
			<table class="table table-striped">
			    <thead class="thead-dark">
			      <tr align="center">
			        <th  scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">Cuentas</th>
			        <th scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; "> </th>
			        <th scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; "> </th>
			      </tr>
			    </thead>
			    <tbody>
			<?php
			$rownumber=0;
			while($rowedit = mysqli_fetch_array($consulta)){
			$rownumber++;
			$id= $rowedit["id"];
			$cod = $rowedit["codigo"];
			$cuen = $rowedit["cuenta"];
			$c1 = $rowedit["c1"];
			$c2 = $rowedit["c2"];

			?>

			

			<tr>
			  <?php 
			  if (is_null($c1)) {
			  ?>
			  <td align="right" id="cuenta:<?php echo $id; ?>" contenteditable="false"><?php echo $cuen; ?></td>
			  <?php 
			  }elseif ($cod=='T1' ||$cod=='T2') {
			  	?>
			  	<td align="center" id="cuenta:<?php echo $id; ?>" contenteditable="false"><strong><u><?php echo $cuen; ?></u></strong></td>
			  	<?php
			  	# code...
			  }else{
			  	?>
			  	<td id="cuenta:<?php echo $id; ?>" contenteditable="false"><?php echo $cuen; ?></td>
			  <?php
			  }
			  ?>
		
			  <?php 
			  if ($c1==NULL) {
			  	?>
			  	<td id="c1:<?php echo $id; ?>" contenteditable="false"><?php echo $c1; ?></td>
			  	<?php
			  }else{
				?>
				<td id="c1:<?php echo $id; ?>" contenteditable="true"><?php echo $c1; ?></td>
			  	<?php
			  }

			   ?>

			  <td id="c2:<?php echo $id; ?>" contenteditable="false"><?php echo $c2; ?></td>
			</tr>


			<?php
			}
			?>    
			    </tbody>
			    <tfoot align="right">
                <tr  style="height:1px; border-bottom: 2px solid #27AE60"><td colspan="4" height="1px" ></td></tr>
                <td align="center"   style=" border-bottom: 2px solid #27AE60;" id="tabono" colspan="9">
                  <a href="pdf/resultconde.php" target="_blank">  <button title="Descargar ER condensado.pdf" type="button" class="btn btn-dark"><i class="fa fa-download"> </i> </button> </a>

                  <a href="estado_res/eliminar_resconde.php?nom=<?php echo $nombre; ?>"><button title="Eliminar ER Condensado" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button> </a>
                  <a href="estado_res/calculos_conde.php?nom=<?php echo $nombre; ?>">  <button title="Calcular ER Condensado" type="button" class="btn btn-info"><i class="fa fa-calculator"> </i> </button> </a>
                </td>
            	</tfoot>
			 </table>
			</div>
			<?php }?>
		</div>
		<!-- fin de tabl -->
	</div>	
	<!----><br>
	   	</main>
		</div>
		</div>


		<script>
			$(function(){
			  //Mensaje
			    var message_status = $("#status");
			    $("td[contenteditable=true]").blur(function(){
			        var rownumber = $(this).attr("id");
			        var value = $(this).text();
			        $.post('estado_res/actualizarcon.php' , rownumber + "=" + value, function(data){
			            if(data != '')
			      {
			        message_status.show();
			        message_status.html(data);
			        //hide the message
			        setTimeout(function(){message_status.html("REGISTRO ACTUALIZADO CORRECTAMENTE");},2000);
			        location.reload();
			      } else {
			        //message_status().html = data;
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
	</body>
		
</html>