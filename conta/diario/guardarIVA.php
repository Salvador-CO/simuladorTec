<?php  
	include("../../conexion.php");
	$num_as=trim($_POST['numAsiento']);
	$cuenta=trim($_POST['cuenta']);
	$cargo=trim($_POST['cargo']);
	$abono=trim($_POST['abono']);
	$nom_us=trim($_POST['nom_us']);

	$fecha='0';
	$poliza='0';
	$parcial='0';

	$consulta="SELECT `codigo` FROM `cuentas` WHERE `cuenta`='$cuenta'";
	$rescon = $conexion->query($consulta);
                  $dato = $rescon->fetch_assoc();
                if(isset($dato['codigo'])){
                  $cod_ceta = $dato['codigo'];
                }else{
                  $cod_ceta="0";
                  }


	$sqldiario = "INSERT INTO diario (numAsiento, fecha, codigo_cuen, poliza, concepto, parcial, cargo, abono, nom_us) VALUES ('$num_as','$fecha','$cod_ceta','$poliza','$cuenta','$parcial','$cargo','$abono','$nom_us')";

	$sql = "INSERT INTO iva (`cod_cuent`, `numAsiento`, `concepto`, `cargo`, `abono`, `nom_us`) VALUES ('$cod_ceta','$num_as','$cuenta','$cargo','$abono','$nom_us')";
	    
	    $resultadodiario = $conexion->query($sqldiario);
	    $resultado = $conexion->query($sql);
		
	//Ejecutar la consulta
	if (!$resultado||!$resultadodiario) {
		//echo $sql_1;?>
			<script type="text/javascript">
				alert("Error en el registro" +<?php printf("Errormessage: %s\n", $conexion->error);?>);
				window.location.href='ajusteIVA.php';
			</script>

		<?php
		} else {?>
			<script type="text/javascript">
			alert("Operacion resgistrado exitosamente");
			window.location.href='ajusteIVA.php';
			</script>
		

		<?php
		}


?>