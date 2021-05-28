	<?php
		session_start();
		$nombre = $_SESSION['nombre'];
		$tipo_usuario = $_SESSION['tipo_usuario'];
	?>
<?php
include("../../conexion.php");

	$i=$_POST['num'];


	switch ($i) {
    case 0:
       	$cp= "INSERT INTO tarjetacp (id_cp, fecha_cp, cargo_cp, abono_cp, num_us) SELECT id, fecha, cargo, abono, nom_us FROM diario WHERE nom_us='$nombre' && concepto='Inventario / Almacen' || concepto='ALMACEN' ON DUPLICATE KEY UPDATE `id_cp` = `id`, `fecha_cp` = `fecha`,`cargo_cp`=`cargo`, `abono_cp`=`abono`";
	   	$cp= mysqli_query($conexion, $cp);
	   	//$sqlinsert= "";
	   	//$resultinsert= mysqli_query($con, $sqlinsert);
	   	//$sqlinsert= "";
	   	//$resultinsert= mysqli_query($con, $sqlinsert);
	   	if (!$cp) {
		//echo $sql_1;?>
			<script type="text/javascript">
				alert("Error en el registro" +<?php printf("Errormessage: %s\n", $conexion->error);?>);
				window.location.href='../tarjeta.php';
			</script>

		<?php
		} else {?>
			<script type="text/javascript">
			window.location.href='../tarjeta.php';
			</script>
		
		<?php
		}
        break;
    case 1:
        $sqlinsert= "INSERT INTO tarjetacp (id_cp, fecha_cp, cargo_cp, abono_cp, num_us) SELECT id, fecha, cargo, abono, nom_us FROM diario WHERE nom_us='$nombre' && concepto='Inventario / Almacen' ON DUPLICATE KEY UPDATE `id_cp` = `id`, `fecha_cp` = `fecha`,`cargo_cp`=`cargo`, `abono_cp`=`abono`";
	   	 $resultinsert= mysqli_query($conexion, $sqlinsert);

	   	 if (!$resultinsert) {
		//echo $sql_1;?>
			<script type="text/javascript">
				alert("Error en el registro" +<?php printf("Errormessage: %s\n", $conexion->error);?>);
				window.location.href='../tarjeta.php';
			</script>

		<?php
		} else {?>
			<script type="text/javascript">
			window.location.href='../tarjeta.php';
			</script>
		
		<?php
		}
        break;
    case 2:
        $sqlinsert= "INSERT INTO tarjetapeps (`id_peps`, `fecha_peps`, `nom_us`) SELECT id, fecha, nom_us FROM diario WHERE nom_us='$nombre' && concepto='Inventario / Almacen' || concepto='ALMACEN' ON DUPLICATE KEY UPDATE `id_peps` = `id`, `fecha_peps` = `fecha`;";
	   	 $resultinsert= mysqli_query($conexion, $sqlinsert);

	   	 if (!$resultinsert) {
		//echo $sql_1;?>
			<script type="text/javascript">
				alert("Error en el registro" +<?php printf("Errormessage: %s\n", $conexion->error);?>);
				window.location.href='../tarjeta.php';
			</script>

		<?php
		} else {?>
			<script type="text/javascript">
			window.location.href='../tarjeta.php';
			</script>
		
		<?php
		}
        break;
    case 3:
         $sqlinsert= "INSERT INTO tarjetaueps (`id_ueps`, `fecha_ueps`, `nom_us`) SELECT id, fecha, nom_us FROM diario WHERE nom_us='$nombre' && concepto='Inventario / Almacen' || concepto='ALMACEN' ON DUPLICATE KEY UPDATE `id_ueps` = `id`, `fecha_ueps` = `fecha`;";
	   	 $resultinsert= mysqli_query($conexion, $sqlinsert);

	   	 if (!$resultinsert) {
		//echo $sql_1;?>
			<script type="text/javascript">
				alert("Error en el registro" +<?php printf("Errormessage: %s\n", $conexion->error);?>);
				window.location.href='../tarjeta.php';
			</script>

		<?php
		} else {?>
			<script type="text/javascript">
			window.location.href='../tarjeta.php';
			</script>
		
		<?php
		}
        break;
}
		

 	     
?>