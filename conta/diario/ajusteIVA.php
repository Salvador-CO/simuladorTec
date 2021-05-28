<?php
	session_start();
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	include("../../conexion.php");
?>

<html >
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>


<style>
	 #status,#titulo  { padding:10px; background:#88C4FF; color:#000; font-weight:bold; font-size:12px; margin-bottom:10px; display:none; width:100%; }
#titulo { padding:10px; background:#88C4FF; color:#000; font-weight:bold; font-size:12px; margin-bottom:10px; display:none; width:90%; }
.tabla{
	margin-right: 3%;
	margin-left: 3%;
}
.formulario{
	margin-right: 3%;
	margin-left: 3%;
}
</style>
</head>
<body>
	<div class="formulario">
				<form action="guardarIVA.php" method="POST">
				<div class="form-row">
				<div class="form-group col-12"> 
					<label for="nivel">Ingresar cuenta:</label>

					<select name="cuenta" id="cuenta"  title = "Colors" class="selectpicker col-12" data-show-subtext="true" data-live-search="true" style="width: 100px">
						<option> Selecione una cuenta... </option>
			            <?php
			            
			            $consulta = "SELECT * FROM cuentas WHERE `nom_us`='gen' || `nom_us`='$nombre'";
			            $resultado = mysqli_query($conexion , $consulta);
			            $contador=0;

			            while($misdatos = mysqli_fetch_assoc($resultado)){ 
			            	$contador++;?>
			              <option data-subtext="<?php echo $misdatos["codigo"]; ?>">
			              	<?php echo $misdatos["cuenta"]; ?>
			              </option>
			            <?php }?>          
			        </select>
		          
		        </div> 
		       
		        <div class="form-group col-6" hidden="true">
		                <label for="codigo"># Asientp:</label>
		                <input type="text" name="numAsiento" id="numAsiento" class="form-control" required placeholder="Ingresa codigo de la cuenta" value="AIVA">
		        </div> 
		        <div class="form-group col-6">
		                <label for="codigo">Ingresa cargo:</label>
		                <input type="text" name="cargo" id="cargo" class="form-control" required placeholder="Ingresa codigo de la cuenta" value="0">
		        </div> 
		        <div class="form-group col-6">
		                <label for="cuenta">Ingresa abono:</label>
		                <input type="text" name="abono" id="abono" class="form-control" required placeholder="Ingresa el nombre de la cuenta" value="0">
		        </div> 
		        <div class="form-group col-6" style="display:none">
		                <label for="cuenta">Usuario:</label>
		                <input type="text" name="nom_us" id="nom_us" class="form-control" r readonly value="<?php echo $nombre;?>" >
		        </div> 

		        <div class="form-group col-md-12"><center>
		            <input type="submit" value="Agregar" class="btn btn-dark" id="enviar" name="" >
		        </div>
			</div>
			</form>
	</div>
		<!--  -->
	<div class="tabla">

		<?php
		$sql = "SELECT * FROM iva WHERE nom_us='$nombre'";
		$consulta = mysqli_query($conexion, $sql);
		if($consulta->num_rows === 0) {
		  echo "<br><div style=\"border:1px solid #88C4FF;background-color:#88C4FF;\">
                    <center>No hay resultados</center>
                     </div>";
		} else {
		?>

		<div class="row">
		<div id="status"></div>      
		<table class="table table-striped">
		    <thead  class="thead-dark">
		      <tr align="center"> 
		        <th align="center" scope="col">Cuenta</th>
		        <th scope="col">Cargo</th>
		        <th scope="col">Abono</th>
		      </tr>
		    </thead>
		    <tbody>
		<?php
		
		while($rowedit = mysqli_fetch_array($consulta)){
		$id= $rowedit["id"];
		$cuenta = $rowedit["concepto"];
		$cargo = $rowedit["cargo"];
		$abono = $rowedit["abono"];
		
		?>
		
		<tr align="center">
		<?php  
		if ($cargo === "0") {
			?>
			<td align="center" id="concepto:<?php echo $id; ?>" contenteditable="false"><?php echo $cuenta; ?></td>
			<?php
		}else{
		?>
			<td align="left" id="concepto:<?php echo $id; ?>" contenteditable="false"><?php echo $cuenta; ?></td>
		<?php 
		}
		?>
		  <td id="cargo:<?php echo $id; ?>" contenteditable="false"><?php echo number_format($cargo,2); ?></td>
		  <td id="abono:<?php echo $id; ?>" contenteditable="false"><?php echo number_format($abono,2); ?></td>
		  
		</tr>
		<?php
		}
		?>    
		    </tbody>
		    <tfoot>
		    	<tr align="center">
		    		<td colspan="3">
		    	<a href="eliminar_IVA.php"> <button type="button" class="btn btn-danger">Eliminar Ajuste</button> </a>	
		    	</td>
		    	</tr>
		    </tfoot>
		 </table>
		 
		</div>
		<?php }?>
	</div>

		<script>
		    $(function(){
		      //Mensaje
		        var message_status = $("#status");
		        $("td[contenteditable=true]").blur(function(){
		            var rownumber = $(this).attr("id");
		            var value = $(this).text();
		            $.post('actualizarIVA.php' , rownumber + "=" + value, function(data){
		                if(data != '')
		          {
		            message_status.show(200);
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> 
</body>
</html>