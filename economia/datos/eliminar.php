<?php 
	include("../../conexion.php");
	session_start();
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

//Preparar la consulta
$consulta = "DELETE FROM regresion WHERE nom_us='$nombre'";
echo $consulta;
//Ejecutar la consulta
if ($conexion->query($consulta)) {
		//$last_id = $conexion->insert_id;
		//echo $sql_1;?>
		<script type="text/javascript">
			window.location.href='../regresionlineal.php';
		</script> 
		<?php
		} else {
			printf("Errormessage: %s\n", $conexion->error);
		}
  
?>