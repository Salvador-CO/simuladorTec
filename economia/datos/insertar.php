<?php
	include("../../conexion.php");

	if(isset($_POST['insertar']))
	{
		$items2 = ($_POST['fecha']);
		$items3 = ($_POST['valor1']);
		$items4 = ($_POST['valor2']);
		
		while(true) {

	    $item2 = current($items2);
	    $item3 = current($items3);
	    $item4 = current($items4);
	    
		    
	    $fecha=(( $item2 !== false) ? $item2 : ", &nbsp;");
	    $valor2=(( $item4 !== false) ? $item4 : ", &nbsp;");
	    $valor1=(( $item3 !== false) ? $item3 : ", &nbsp;");
			    
	    $valores='("'.$fecha.'","'.$valor1.'","'.$valor2.'"),';
	    $valoresQ= substr($valores, 0, -1);
			    
	    $sql = "INSERT INTO regresion ( fecha, valor1, valor2)	VALUES $valoresQ";
					
		$sqlRes=$conexion->query($sql) or mysql_error();
				    
	    $item2 = next( $items2 );
	    $item3 = next( $items3 );
	    $item4 = next( $items4 );

	    if($item2 === false && $item3 === false && $item4 === false) break;
   
		}
		 header("Location: ../regresionlineal.php");
		}

?>
