<?php  

	include("../../conexion.php");
	$codigo=trim($_POST['codigo']);
	$concepto=trim($_POST['cuenta']);
	$cargo=trim($_POST['cargo']);
	$abono=trim($_POST['abono']);
	$SD=trim($_POST['SD']);
	$SA=trim($_POST['SA']);
	$nom_us=trim($_POST['nom_us']);
	

	 $sql = "INSERT INTO mayor (codigo_cuen, cuenta, MD, MA, SD, SA, nom_us) VALUES ('$codigo','$concepto','$cargo','$abono','$SD','$SA','$nom_us')";
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
			window.location.href='../libro_mayor.php';
			</script>
		

		<?php
		} //*/


?>