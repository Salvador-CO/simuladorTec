<?php 
	include("../../conexion.php");

	


//Preparar la consulta
$consulta = "DELETE FROM iva";
$consultaD="DELETE FROM `diario` WHERE numAsiento='AIVA'";
//Ejecutar la consulta
if ($conexion->query($consulta) && $conexion->query($consultaD)) {
		$last_id = $conexion->insert_id;
		//echo $sql_1;?>
		<script type="text/javascript">
			alert("Ajuste Eliminado Correctamente");
			window.location.href='ajusteIVA.php';
		</script>
		<?php
		} else {
			printf("Errormessage: %s\n", $conexion->error);
		}
  
?>


