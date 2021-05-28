<?php  
include('conexion.php');
$id=$_GET['id'];
 $eliminar = $conexion->query("DELETE FROM file where id='$id'");

 if ($eliminar) {
        header("Location:archivos.php");
    } else {
        echo "<script> alert('No se pudo eliminar'); window.history.go(-1);</script>";
    }

?>