<?php  
	include("../../conexion.php");
	$c1='0';
	$c2='0';
	$nom_us=trim($_POST['nom_us']);

	// VENTAS
	$sql1 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS VN, `nom_us` FROM `mayor` WHERE `codigo_cuen` BETWEEN '401.01' AND '401.99' && `nom_us`='$nom_us'";
	    $resul1 = $conexion->query($sql1);

	    $dato1 = $resul1->fetch_assoc();
	    if(is_null($dato1['codigo_cuen'])){
	        $sql1_1 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('401.01','VENTAS NETAS','$c1',NULL,'$nom_us')";
	    	$resul1_1= $conexion->query($sql1_1);      
	    }else{
	        $sql1_1 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS VN, `nom_us` FROM `mayor` WHERE `codigo_cuen` BETWEEN '401.01' AND '401.99' && `nom_us`='$nom_us'";
	    	$resul1_1= $conexion->query($sql1_1);        
	    }
	//

	// COSTO DE VENTAS
	$sql1 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS CV, `nom_us` FROM `mayor` WHERE `codigo_cuen` BETWEEN '501.01' AND '501.99' && `nom_us`='$nom_us'";
	    $resul1 = $conexion->query($sql1);

	    $dato1 = $resul1->fetch_assoc();
	    if(is_null($dato1['codigo_cuen'])){
	        $sql1_1 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('501.01','COSTO VENTAS','$c1',NULL,'$nom_us')";
	    	$resul1_1= $conexion->query($sql1_1);      
	    }else{
	        $sql1_1 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS CV, `nom_us` FROM `mayor` WHERE `codigo_cuen` BETWEEN '501.01' AND '501.2' && `nom_us`='$nom_us'";
	    	$resul1_1= $conexion->query($sql1_1);        
	    }
	//



	$sql3 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('UB','UTILIDAD BRUTA',NULL,'$c2','$nom_us')";
	    $resul3 = $conexion->query($sql3);

	$sql4 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('T1','GASTOS DE OPERACION','','','$nom_us')";
	    $resul4 = $conexion->query($sql4);

	// GASTOS DE VENTAS
	$sql5 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS GV, `nom_us` FROM `mayor` WHERE `codigo_cuen` BETWEEN '602.01' AND '602.99' && `nom_us`='$nom_us'";
	    $resul5 = $conexion->query($sql5);

	    $dato5 = $resul5->fetch_assoc();
	    if(is_null($dato5['codigo_cuen'])){
	        $sql5_1 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('602.01','GASTOS DE VENTA','$c1',NULL,'$nom_us')";
	    	$resul5_1= $conexion->query($sql5_1);      
	    }else{
	        $sql5_1 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS GV, `nom_us` FROM `mayor` WHERE `codigo_cuen` BETWEEN '602.01' AND '602.99' && `nom_us`='$nom_us'";
	    	$resul5_1= $conexion->query($sql5_1);        
	    }
	//
	// GASTOS DE ADMINISTRACION
	$sql6 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS GV, `nom_us` FROM `mayor` WHERE `codigo_cuen` BETWEEN '603.01' AND '603.99' && `nom_us`='$nom_us'";
	    $resul6 = $conexion->query($sql6);

	    $dato6 = $resul6->fetch_assoc();
	    if(is_null($dato6['codigo_cuen'])){
	        $sql6_1 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('603.01','GASTOS DE ADMINISTRACION','$c1',NULL,'$nom_us')";
	    	$resul6_1= $conexion->query($sql6_1);      
	    }else{
	        $sql6_1 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS GV, `nom_us` FROM `mayor` WHERE `codigo_cuen` BETWEEN '603.01' AND '603.99' && `nom_us`='$nom_us'";
	    	$resul6_1= $conexion->query($sql6_1);        
	    }
	// TOTAL GASTOS DE OPERACION
	$sql7 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('TGO','TOTAL DE GASTOS DE OPERACION',NULL,'$c2','$nom_us')";
	    $resul7 = $conexion->query($sql7);
	//Utilidad o perdida de operacion
	$sql8 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('UPO','UTILIDAD O PERDIDA DE OPERACION',NULL,'$c2','$nom_us')";
	    $resul8 = $conexion->query($sql8);	
	//TITULO
	$sql9 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('T2','RIF (Resultado Integral de Financiamiento)','','','$nom_us')";
	    $resul9 = $conexion->query($sql9);

	//gastos financieros
	$sql10 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS GV, `nom_us` FROM `mayor` WHERE `codigo_cuen` BETWEEN '701.01' AND '701.99' && `nom_us`='$nom_us'";
	    $resul10 = $conexion->query($sql10);

	    $dato10 = $resul10->fetch_assoc();
	    if(is_null($dato10['codigo_cuen'])){
	        $sql10_1 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('701.01','GASTOS FINANCIEROS','$c1',NULL,'$nom_us')";
	    	$resul10_1= $conexion->query($sql10_1);      
	    }else{
	        $sql10_1 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS GV, `nom_us` FROM `mayor` WHERE `codigo_cuen` BETWEEN '701.01' AND '701.99' && `nom_us`='$nom_us'";
	    	$resul10_1= $conexion->query($sql10_1);        
	    }
	//Productos financieros
	$sql11 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS GV, `nom_us` FROM `mayor` WHERE `codigo_cuen` BETWEEN '702.01' AND '702.99' && `nom_us`='$nom_us'";
	    $resul11 = $conexion->query($sql11);

	    $dato11 = $resul11->fetch_assoc();
	    if(is_null($dato11['codigo_cuen'])){
	        $sql11_1 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('702.01','PRODUCTOS FINANCIEROS','$c1',NULL,'$nom_us')";
	    	$resul11_1= $conexion->query($sql11_1);      
	    }else{
	        $sql11_1 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `nom_us`)SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS GV, `nom_us` FROM `mayor` WHERE `codigo_cuen` BETWEEN '702.01' AND '702.99' && `nom_us`='$nom_us'";
	    	$resul11_1= $conexion->query($sql11_1);        
	    }
	// TOTAL RIF
	$sql12 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('TRIF','TOTAL DE RIF',NULL,'$c2','$nom_us')";
	    $resul12 = $conexion->query($sql12);
	//OTROS GASTOS
	$sql13 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('OG','OTROS GASTOS','$c1',NULL,'$nom_us')";
	    	$resul13= $conexion->query($sql13); 
	//OTROS PRODUCTOS
	$sql14 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('OP','OTROS PRODUCTOS','$c1',NULL,'$nom_us')";
	    	$resul14= $conexion->query($sql14); 
	//UTILIDAD ANTES DE IMPUESTOS
	$sql15 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('UPAI','UTILIDAD O PERDIDA ANTES DE IMPUESTOS',NULL,'$c2','$nom_us')";
	    $resul15 = $conexion->query($sql15);
	//PTU 10%
	$sql16 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('PTU10','PTU 10%',NULL,'$c2','$nom_us')";
	    $resul16 = $conexion->query($sql16);	
	//ISR 30%
	$sql17 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('ISR30','ISR 30%',NULL,'$c2','$nom_us')";
	    $resul17 = $conexion->query($sql17);
	//UTILIDAD DESPUES DE IMPUESTOS
	$sql18 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('UPDI','UTILIDAD O PERDIDA DESPUES DE IMPUESTOS',NULL,'$c2','$nom_us')";
	    $resul18 = $conexion->query($sql18);
	//UTILIDAD O PERDIDA POR PARTIDAS DISCONTINUAS
	$sql19 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('UPPD','UTILIDAD O PERDIDA POR PARTIDAS DISCONTINUAS','$c1',NULL,'$nom_us')";
	    $resul19 = $conexion->query($sql19);
	//UTILIDAD O PERDIDA POR PARTIDAS EXTRAORDINARIAS 
	$sql20 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('UPPE','UTILIDAD O PERDIDA POR PARTIDAS EXTRAORDINARIAS','$c1',NULL,'$nom_us')";
	    $resul20 = $conexion->query($sql20);   
	//UTILIDAD NETA DEL EJERCICIO
	$sql21 = "INSERT INTO `rescon`(`codigo`, `cuenta`, `c1`, `c2`, `nom_us`) VALUES ('UNE','UTILIDAD NETA DEL EJERCICIO',NULL,'$c2','$nom_us')";
	    $resul21 = $conexion->query($sql21);
	//Ejecutar la consulta
	if (!$sql21) {
		//echo $sql_1;?>
			<script type="text/javascript">
				alert("Error en el registro" +<?php printf("Errormessage: %s\n", $conexion->error);?>);
				window.location.href='../estadoresult_condensado.php';
			</script>

		<?php
		} else {?>
			<script type="text/javascript">
			alert("Tabla creada exitosamente");
			window.location.href='../estadoresult_condensado.php';
			</script>
		

		<?php
		}


?>