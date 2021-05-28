<?php
	
    include("../../conexion.php");

    $salida = "";
    
    //$query = "SELECT * FROM cuentas WHERE cuenta NOT LIKE '' LIMIT 100";
    $query = "SELECT * FROM `cuentas` WHERE `nivel`=0 || `nivel`=1 || `nivel`=2 ORDER BY `codigo` ASC";

    if (isset($_POST['consulta'])) {
    	$q = $mysqli->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM cuentas WHERE codigo LIKE '%$q%' OR cuenta LIKE '%$q%' ";
    }

    $resultado = $mysqli->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>Nivel</td>
    					<td>Código</td>
    					<td>Cuenta</td>
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['nivel']."</td>
    					<td>".$fila['codigo']."</td>
    					<td>".$fila['cuenta']."</td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO SE ENCONTRARON RESULTADOS <br><br><br><br><br><br><br> Nota: Si no encontraste la cuenta deseada puedes crear una nueva";
    }


    echo $salida;

    $mysqli->close();



?>