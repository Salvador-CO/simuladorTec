
<?php  
	include("../../conexion.php");
	$empresa=trim($_POST['empresa']);
	$fec=trim($_POST['fec']);
	$doc='---';
	$aut=trim($_POST['aut']);
	$nom_us=trim($_POST['nom_us']);

		$sql = "INSERT INTO encabezadoeco (nomEm, fechaEm, tipoDoc, firma, nom_us) VALUES ('$empresa','$fec','$doc','$aut','$nom_us')";
	    $resultado = $conexion->query($sql);
		
	//Ejecutar la consulta
	if (!$resultado) {
		//echo $sql_1;?>
			<script type="text/javascript">
				alert("Error en el registro" +<?php printf("Errormessage: %s\n", $conexion->error);?>);
				window.location.href='../balanzap.php';
			</script>

		<?php
		} else {?>
			<script type="text/javascript">
			window.location.href='../balanzap.php';
			</script>
		

		<?php
		}


?>