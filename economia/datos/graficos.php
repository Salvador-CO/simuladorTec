<?php
header('Content-type: application/json');
include_once 'conexion.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$result = array();

$consulta = "SELECT valor1, valor2 FROM regresion ORDER BY valor1 ASC";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
    array_push($result, array($fila["valor1"], $fila["valor2"] ));
}

print json_encode($result, JSON_NUMERIC_CHECK);
$conexion=null;