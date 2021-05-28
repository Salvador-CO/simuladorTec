<?php
	session_start();
	$nombre = $_SESSION['nombre'];
 
	include("../../conexion.php");
	sleep(1);
if (isset($_POST)) {
    $username =$_POST['username'];
 	 $sql2 = "SELECT numAsiento FROM asientos Where nom_us= '$nombre' && numAsiento='$username'";
    $result = $conexion->query($sql2);
 
    if ($result->num_rows > 0) {
        
        echo ' <div align="center">';
        //echo '<div class="alert alert-success"><strong>Enhorabuena!</strong> Usuario disponible.</div>';
        echo ' ';
       	echo '<div class="alert alert-danger"><strong>Oh no!</strong> Ya registraste este asiento</div>';
        echo '</div> ';
    } else {
        echo ' <div align="center">';
        //echo '<div class="alert alert-success"><strong>Enhorabuena!</strong> Usuario disponible.</div>';
        echo ' ';
        echo '<button type="submit" value="Registrar" class="btn btn-primary">Aceptar</button>';
        echo '</div> ';
    }
}

?>