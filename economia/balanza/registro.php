
<?php  

	include("../../conexion.php");
	

	$tipo=trim($_POST['tipo']);
	$concepto=trim($_POST['concepto']);
	$ingresos=trim($_POST['ingresos']);
	$pagos=trim($_POST['pagos']);
	$saldos=trim($_POST['saldos']);

	$nom_us=trim($_POST['nom_us']);
		$sql = "INSERT INTO `regbalanza`(`tipo`, `concepto`, `ingresos`, `pagos`, `saldos`, `nom_us`) VALUES ('$tipo','$concepto','$ingresos','$pagos','$saldos','$nom_us')";
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