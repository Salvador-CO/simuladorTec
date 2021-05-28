<?php 
include("../../conexion.php");
	
if (isset($_GET['no']))
{
//Se almacena en una variable el id del registro a eliminar
$id_cliente = $_GET['no'];

//Preparar la consulta
$consulta = "DELETE FROM cuentas WHERE id_cuenta=$id_cliente";

//Ejecutar la consulta
if ($conexion->query($consulta)) {
		$last_id = $conexion->insert_id;
		//echo $sql_1;?>
		<script type="text/javascript">
			alert("Registro eliminado correctamente");
			window.location.href='insertarcuenta.php';
		</script>
		<?php
		} else {
			printf("Errormessage: %s\n", $conexion->error);
		}
}
  
?>