<?php 
	include("../../conexion.php");

	
if (isset($_GET['nom']))
{
//Se almacena en una variable el id del registro a eliminar
$id_cliente = $_GET['nom'];

//Preparar la consulta
$consulta = "DELETE FROM regbalanza WHERE nom_us='$id_cliente'" ;

//Ejecutar la consulta
if ($conexion->query($consulta)) {
		$last_id = $conexion->insert_id;
		//echo $sql_1;?>
		<script type="text/javascript">
			window.location.href='../balanzap.php';
		</script>
		<?php
		} else {
			printf("Errormessage: %s\n", $conexion->error);
		}
}
  
?>


