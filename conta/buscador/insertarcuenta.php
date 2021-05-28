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
			
			<form action="insert.php" method="POST">
				<div class="form-row">
				<div class="form-group col-6">
		                <label for="nivel">Nivel:</label>
		                <input type="text" name="nivel" id="nivel" class="form-control" required placeholder="Ingresa nivel">
		        </div> 
		        <div class="form-group col-6">
		                <label for="codigo">Código:</label>
		                <input type="text" name="codigo" id="codigo" class="form-control" required placeholder="Ingresa código de la cuenta">
		        </div> 
		        <div class="form-group col-6">
		                <label for="cuenta">Nombre de la cuenta:</label>
		                <input type="text" name="cuenta" id="cuenta" class="form-control" required placeholder="Ingresa el nombre de la cuenta">
		        </div> 
		        <div class="form-group col-6">
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
		$sql = "SELECT * FROM cuentas WHERE nom_us='$nombre'";
		$consulta = mysqli_query($conexion, $sql);
		if($consulta->num_rows === 0) {
		  echo "<br><div style=\"border:1px solid #88C4FF;background-color:#88C4FF;\">
                    <center>--Hasta el momento no se ha insertado una nueva cuenta--</center>
                     </div>";
		} else {
		?>

		<div class="row">
		<div id="status"></div>      
		<table class="table table-striped">
		    <thead  align="center" class="thead-dark">
		      <tr>
		        <th scope="col">Nivel</th>
		        <th scope="col">Código</th>
		        <th scope="col">Cuenta</th>
		        <th scope="col">Acción</th>
		      </tr>
		    </thead>
		    <tbody>
		<?php
		
		while($rowedit = mysqli_fetch_array($consulta)){
		$id_cuen = $rowedit["id_cuenta"];
		$nivel = $rowedit["nivel"];
		$codigo = $rowedit["codigo"];
		$cuenta = $rowedit["cuenta"];
		
		?>
		<tr align="center">
		  <td id="nivel:<?php echo $id_cuen; ?>" contenteditable="false"><?php echo $nivel; ?></td>
		  <td id="codigo:<?php echo $id_cuen; ?>" contenteditable="false"><?php echo $codigo; ?></td>
		  <td id="cuenta:<?php echo $id_cuen; ?>" contenteditable="true"><?php echo $cuenta; ?></td>
		  <td align="center" > <a href="eliminar_cuenta.php?no=<?php echo $id_cuen; ?>"> <button type="button" class="btn btn-danger">Eliminar</button> </a></td>
		</tr>
		<?php
		}
		?>    
		    </tbody>
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
		            $.post('actualizar.php' , rownumber + "=" + value, function(data){
		                if(data != '')
		          {
		            message_status.show(200);
		            message_status.html(data);
		            //hide the message
		            setTimeout(function(){message_status.html("Registro actualizado exitosamente");},2000);
		          } else {

		            //message_status().html = data;
		          }
		            });
		        });
		    });
		</script>
	
</body>
</html>