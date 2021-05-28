<?php  
	include("../../conexion.php");
		
if (isset($_GET['nom'])){
//Se almacena en una variable el id del registro a eliminar
$id_cliente = $_GET['nom'];
}

//Preparar la consulta `nom_us`='$id_cliente'
$consulta1 = "UPDATE `resulanal` SET `c2` = (SELECT (SELECT `c1` FROM `resulanal` WHERE `nom_us`='$id_cliente' && `id`=1)-(SELECT sum(`c1`) FROM `resulanal` WHERE `nom_us`='$id_cliente' && `id` BETWEEN 2 and 4)) WHERE `id` = 5 && `nom_us`='$id_cliente'";
$resulta1 = $conexion->query($consulta1);

$consulta2 = "UPDATE `resulanal` SET `c1`=(SELECT SUM(c1) FROM `resulanal` WHERE `nom_us`='$id_cliente' && `id` BETWEEN 6 and 7) WHERE `id` = 8 && `nom_us`='$id_cliente'";
$resulta2 = $conexion->query($consulta2);

$consulta3 = "UPDATE `resulanal` SET `c2`=(SELECT (SELECT `c1`FROM `resulanal` WHERE `id`=8 && `nom_us`='$id_cliente')-(SELECT SUM(`c1`) FROM `resulanal` WHERE `id` BETWEEN 9 and 10 && `nom_us`='$id_cliente') AS CN) WHERE `id` = 11 && `nom_us`='$id_cliente'";
$resulta3 = $conexion->query($consulta3);

$consulta4 = "UPDATE `resulanal` SET `c2`=(SELECT SUM(c1)+SUM(C2) FROM `resulanal` WHERE `nom_us`='$id_cliente' && `id` BETWEEN 11 and 12) WHERE `id` = 13 && `nom_us`='$id_cliente'";
$resulta4 = $conexion->query($consulta4);

$consulta5 = "UPDATE `resulanal` SET `c2`=(SELECT (SELECT `c2` FROM `resulanal` WHERE `nom_us`='$id_cliente' && `id`=13)-(SELECT `c1` FROM `resulanal` WHERE `nom_us`='$id_cliente' && `id`=14) AS CVENTAS) WHERE `id` = 15 && `nom_us`='$id_cliente'";
$resulta5 = $conexion->query($consulta5);

$consulta6 = "UPDATE `resulanal` SET `c2`=(SELECT (SELECT `c2` FROM `resulanal` WHERE `nom_us`='$id_cliente' && `id`=5)-(SELECT `c2` FROM `resulanal` WHERE `nom_us`='$id_cliente' && `id`=15) AS UB) WHERE `id` = 16 && `nom_us`='$id_cliente'";
$resulta6 = $conexion->query($consulta6);

$consulta7 = "UPDATE `resulanal` SET `c1`=(SELECT SUM(c1) FROM `resulanal` WHERE `nom_us`='$id_cliente' && `id` BETWEEN 18 and 19) WHERE `id` = 20 && `nom_us`='$id_cliente'";
$resulta7 = $conexion->query($consulta7);

$consulta8 = "UPDATE `resulanal` SET `c2`=(SELECT (SELECT `c2` FROM `resulanal` WHERE `nom_us`='$id_cliente' && `id`=16)-(SELECT `c1` FROM `resulanal` WHERE `nom_us`='$id_cliente' && `id`=20) AS UPO) WHERE `id` = 21 && `nom_us`='$id_cliente'";
$resulta8 = $conexion->query($consulta8);

$consulta9 = "UPDATE `resulanal` SET `c2`=(SELECT (SELECT SUM(`c1`) FROM `resulanal` WHERE `id` BETWEEN 24 AND 25 && `nom_us`='$id_cliente')-(SELECT SUM(`c1`) FROM `resulanal` WHERE `id` BETWEEN 27 AND 28 && `nom_us`='$id_cliente') AS RIF) WHERE `id` = 29 && `nom_us`='$id_cliente'";
$resulta9 = $conexion->query($consulta9);

$consulta10 = "UPDATE `resulanal` SET `c2`=(SELECT (SELECT `c2` FROM `resulanal` WHERE `id`=21 && `nom_us`='$id_cliente')+(SELECT `c2` FROM `resulanal` WHERE `id`=29 && `nom_us`='$id_cliente')-(SELECT `c1` FROM `resulanal` WHERE `id`=30 && `nom_us`='$id_cliente')+(SELECT `c1` FROM `resulanal` WHERE `id`=31 && `nom_us`='$id_cliente') AS uai) WHERE `id` = 32 && `nom_us`='$id_cliente'";
$resulta10 = $conexion->query($consulta10);

$consulta11 = "UPDATE `resulanal` SET `c2`=(SELECT (SELECT `c2` FROM `resulanal` WHERE `id`=32 && `nom_us`='$id_cliente')*0.1 AS ptu) WHERE `id` = 33 && `nom_us`='$id_cliente'";
$resulta11 = $conexion->query($consulta11);

$consulta12 = "UPDATE `resulanal` SET `c2`=(SELECT (SELECT `c2` FROM `resulanal` WHERE `id`=32 && `nom_us`='$id_cliente')*0.3 AS isr) WHERE `id` = 34 && `nom_us`='$id_cliente'";
$resulta12 = $conexion->query($consulta12);

$consulta13 = "UPDATE `resulanal` SET `c2`=(SELECT (SELECT `c2` FROM `resulanal` WHERE `id`=32 && `nom_us`='$id_cliente')-((SELECT `c2` FROM `resulanal` WHERE `id`=33 && `nom_us`='$id_cliente')+(SELECT `c2` FROM `resulanal` WHERE `id`=34 && `nom_us`='$id_cliente')) AS unp) WHERE `id` = 35 && `nom_us`='$id_cliente'";
$resulta13 = $conexion->query($consulta13);


//Ejecutar la consulta
	if (!$consulta10) {
		//echo $sql_1;?>
			<script type="text/javascript">
				alert("Error en el registro" +<?php printf("Errormessage: %s\n", $conexion->error);?>);
				window.location.href='../estadoresult_analitico.php';
			</script>

		<?php
		} else {?>
			<script type="text/javascript">
			//alert("Tabla creada exitosamente");
			window.location.href='../estadoresult_analitico.php';
			</script>
		<?php
		}


?>