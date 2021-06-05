<?php
	include("../../conexion.php");

	if(isset($_POST['insertar']))
	{
		$items2 = ($_POST['fecha']);
		$items3 = ($_POST['valor1']);
		$items4 = ($_POST['valor2']);
		$items5 = ($_POST['nom_us']);
		
		while(true) {

	    $item2 = current($items2);
	    $item3 = current($items3);
	    $item4 = current($items4);
	    $item5 = current($items5);
		    
	    $fecha=(( $item2 !== false) ? $item2 : ", &nbsp;");
	    $valor2=(( $item4 !== false) ? $item4 : ", &nbsp;");
	    $valor1=(( $item3 !== false) ? $item3 : ", &nbsp;");
	    $valor5=(( $item5 !== false) ? $item5 : ", &nbsp;");
	    $valor3 = $valor1*$valor1;
	    $valor4 = $valor1 * $valor2;
		
	    $valores='("'.$fecha.'","'.$valor1.'","'.$valor2.'","'.$valor3.'","'.$valor4.'","'.$valor5.'"),';
	    $valoresQ= substr($valores, 0, -1);
			    
	    $sql = "INSERT INTO regresion ( fecha, valor1, valor2, valor3, valor4, nom_us ) VALUES $valoresQ";
					
		$sqlRes=$conexion->query($sql) or mysql_error();
				    
	    $item2 = next( $items2 );
	    $item3 = next( $items3 );
	    $item4 = next( $items4 );
	    $item5 = next( $items5 );

	    if($item2 === false && $item3 === false && $item4 === false && $item5 === false) break;
   
		}
		 header("Location: ../regresionlineal.php");
		}

?>
