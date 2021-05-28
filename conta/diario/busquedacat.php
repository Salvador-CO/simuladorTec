<?php

include("../../conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $RUT = htmlspecialchars(trim($_POST["cod_cuenta"]));
     // Codigo para buscar en tu base de datos acá
    $sqlsi = "SELECT cuenta FROM cuentas WHERE codigo = '$RUT'";
    $resultado = $conexion->query($sqlsi);
	$dato = $resultado->fetch_assoc();
    

   	if(isset($dato['cuenta'])){
    	$nombre = $dato['cuenta'];
    	
    	echo trim($nombre);
	}else{
		$nombre="¡No se encontro la cuenta, revisa el código!";
    	echo $nombre;
    	
    }
} 
?>