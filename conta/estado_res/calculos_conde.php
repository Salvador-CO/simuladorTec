<?php  
	include("../../conexion.php");
		
if (isset($_GET['nom'])){
//Se almacena en una variable el id del registro a eliminar
$id_cliente = $_GET['nom'];
}

//Preparar la consulta `nom_us`='$id_cliente'
$consulta1 = "UPDATE `rescon` SET `c2`=(SELECT (SELECT `c1` FROM `rescon` WHERE `codigo`='401.01' && `nom_us`='$id_cliente')-(SELECT `c1` FROM `rescon` WHERE `codigo`='501.01' && `nom_us`='$id_cliente') as UB) WHERE `codigo`='UB' && `nom_us`='$id_cliente'";
$resulta1 = $conexion->query($consulta1);

$consulta2 = "UPDATE `rescon` SET `c2`=(SELECT (SELECT `c1` FROM `rescon` WHERE `codigo`='602.01' && `nom_us`='$id_cliente')+(SELECT `c1` FROM `rescon` WHERE `codigo`='603.01' && `nom_us`='$id_cliente') AS TGO) WHERE `codigo`='TGO' && `nom_us`='$id_cliente'";
$resulta2 = $conexion->query($consulta2);

$consulta3 = "UPDATE `rescon` SET `c2`=(SELECT (SELECT `c2` FROM `rescon` WHERE `codigo`='UB' && `nom_us`='$id_cliente')-(SELECT `c2` FROM `rescon` WHERE `codigo`='TGO' && `nom_us`='$id_cliente') AS UPO) WHERE `codigo`='UPO' && `nom_us`='$id_cliente'";
$resulta3 = $conexion->query($consulta3);

$consulta4 = "UPDATE `rescon` SET `c2`=(SELECT (SELECT `c1` FROM `rescon` WHERE `codigo`='701.01' && `nom_us`='$id_cliente')-(SELECT `c1` FROM `rescon` WHERE `codigo`='702.01' && `nom_us`='$id_cliente') AS TRIF) WHERE `codigo`='TRIF' && `nom_us`='$id_cliente'";
$resulta4 = $conexion->query($consulta4);

$consulta5 = "UPDATE `rescon` SET `c2`=(SELECT (SELECT `c2` FROM `rescon` WHERE `codigo`='UPO' && `nom_us`='$id_cliente')-(SELECT `c2` FROM `rescon` WHERE `codigo`='TRIF' && `nom_us`='$id_cliente')-(SELECT `c1` FROM `rescon` WHERE `codigo`='OG' && `nom_us`='$id_cliente')+(SELECT `c1` FROM `rescon` WHERE `codigo`='OP' && `nom_us`='$id_cliente') AS UPAI) WHERE `codigo`='UPAI' && `nom_us`='$id_cliente'";
$resulta5 = $conexion->query($consulta5);

$consulta6 = "UPDATE `rescon` SET `c2`=(SELECT (SELECT `c2` FROM `rescon` WHERE `codigo`='UPAI' && `nom_us`='$id_cliente')*.10 AS PTU10) WHERE `codigo`='PTU10' && `nom_us`='$id_cliente'";
$resulta6 = $conexion->query($consulta6);

$consulta7 = "UPDATE `rescon` SET `c2`=(SELECT (SELECT `c2` FROM `rescon` WHERE `codigo`='UPAI' && `nom_us`='$id_cliente')*.30 AS ISR30) WHERE `codigo`='ISR30' && `nom_us`='$id_cliente'";
$resulta7 = $conexion->query($consulta7);

$consulta8 = "UPDATE `rescon` SET `c2`=(SELECT (SELECT `c2` FROM `rescon` WHERE `codigo`='UPAI' && `nom_us`='$id_cliente')-(SELECT (SELECT `c2` FROM `rescon` WHERE `codigo`='PTU10' && `nom_us`='$id_cliente')+(SELECT `c2` FROM `rescon` WHERE `codigo`='ISR30' && `nom_us`='$id_cliente') AS IMP) AS UPDI) WHERE `codigo`='UPDI' && `nom_us`='$id_cliente'";
$resulta8 = $conexion->query($consulta8);

$consulta9 = "UPDATE `rescon` SET `c2`=(SELECT (SELECT `c2` FROM `rescon` WHERE `codigo`='UPDI' && `nom_us`='$id_cliente')+(SELECT `c1` FROM `rescon` WHERE `codigo`='UPPD' && `nom_us`='$id_cliente')+(SELECT `c1` FROM `rescon` WHERE `codigo`='UPPE' && `nom_us`='$id_cliente') AS UNE) WHERE `codigo`='UNE' && `nom_us`='$id_cliente'";
$resulta9 = $conexion->query($consulta9);

//Ejecutar la consulta
	if (!$consulta9) {
		//echo $sql_1;?>
			<script type="text/javascript">
				alert("Error en el registro" +<?php printf("Errormessage: %s\n", $conexion->error);?>);
				window.location.href='../estadoresult_condensado.php';
			</script>

		<?php
		} else {?>
			<script type="text/javascript">
			//alert("Tabla creada exitosamente");
			window.location.href='../estadoresult_condensado.php';
			</script>
		<?php
		}


?>