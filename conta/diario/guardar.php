
<?php  

	include("../../conexion.php");
	

	$num_As=trim($_POST['num_asiento']);
	$fecha=trim($_POST['fecha']);
	$codigo=trim($_POST['cod_cuenta']);
	$poliza=trim($_POST['poliza']);
	$concepto=trim($_POST['cuenta']);
	$parcial=trim($_POST['parcial']);
	$cargo=trim($_POST['cargo']);
	$abono=trim($_POST['abono']);

	$nom_us=trim($_POST['nom_us']);
		$sql = "INSERT INTO diario (numAsiento, fecha, codigo_cuen, poliza, concepto, parcial, cargo, abono, nom_us) VALUES ('$num_As','$fecha','$codigo','$poliza','$concepto','$parcial','$cargo','$abono','$nom_us')";
	    $resultado = $conexion->query($sql);
		
	//Ejecutar la consulta
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