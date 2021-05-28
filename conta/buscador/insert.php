
<?php 
	include("../../conexion.php");
	$nivel =$_POST["nivel"];
	$codigo =$_POST["codigo"];
	$cuenta =$_POST["cuenta"];
	$nom_us=$_POST["nom_us"];

	if (isset($nivel) && isset($codigo) && isset($cuenta) && isset($nom_us)) {
			$nivel =trim($_POST["nivel"]);
			$codigo =trim($_POST["codigo"]);
			$cuenta =trim($_POST["cuenta"]);
			$nom_us=trim($_POST["nom_us"]);
		}

	
	$saber="SELECT * FROM cuentas WHERE codigo='$codigo'";
	$res_saber = mysqli_query($conexion, $saber);
	if($res_saber->num_rows === 1){
		?>
			<script type="text/javascript">
				alert("Este código ya existe prueba con otro o consulta el cátalogo");
				window.location.href='insertarcuenta.php';
			</script>

		<?php

	}else{
		$sqlC="INSERT INTO cuentas (nivel, codigo, cuenta, nom_us) VALUES ('$nivel','$codigo','$cuenta','$nom_us')";
	$resultado = $conexion->query($sqlC);
	//Ejecutar la consulta
	if (!$resultado) {
		//echo $sql_1;?>
			<script type="text/javascript">
				alert("Error en el registro" +<?php printf("Errormessage: %s\n", $con->error);?>);
				window.location.href='insertarcuenta.php';
			</script>

		<?php
		} else {?>
			<script type="text/javascript">
			alert("Cuenta registrada exitosamente");
			window.location.href='insertarcuenta.php';
			</script>
		<?php
		}

	}

	
	
	
?>