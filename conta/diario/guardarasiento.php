<?php  
	include("../../conexion.php");
	$descripcion=trim($_POST['descripcion']);
	$numAsiento=trim($_POST['numAsiento']);
	$nom_us=trim($_POST['nom_us']);

		$sql = "INSERT INTO asientos ( descripcion, numAsiento, nom_us) VALUES ('$descripcion','$numAsiento','$nom_us')";
	    $resultado = $conexion->query($sql);

	   
		
	if (!$resultado) {
		//echo $sql_1;?>
			<script type="text/javascript">
				alert("Error en el registro" +<?php printf("Errormessage: %s\n", $conexion->error);?>);
				window.location.href='../libro_diario.php';
			</script>

		<?php
		} else {?>
			<script type="text/javascript">
			window.location.href='../libro_diario.php';
			</script>
		<?php
		}


?>