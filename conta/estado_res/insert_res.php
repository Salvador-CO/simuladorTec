<?php  
	include("../../conexion.php");
	$c1='0';
	$c2='0';
	$nom_us=trim($_POST['nom_us']);


	//1 VENTAS
		$sql1 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS VT, `nom_us` FROM `mayor` WHERE `codigo_cuen`='401.01' && `nom_us`='$nom_us'";
		    $resul1 = $conexion->query($sql1);

		    $dato1 = $resul1->fetch_assoc();
		    if(is_null($dato1['codigo_cuen'])){
		        $sql1_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('1','401.01','VENTAS TOTALES','$c1','$c2','$nom_us')";
		    	$resul1_1= $conexion->query($sql1_1);      
		    }else{
		        $sql1_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS VT, `nom_us` FROM `mayor` WHERE `codigo_cuen`='401.01' && `nom_us`='$nom_us'";
		        $sql1_2="UPDATE `resulanal` SET `id`='1',`c2`='0' WHERE `codigo`='401.01' && `nom_us`='$nom_us'";
		    	$resul1_1= $conexion->query($sql1_1);        
		    	$resul1_2= $conexion->query($sql1_2);        
		    }
	//
	//2 (-) DEV. S/VTA
		$sql2 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS DV, `nom_us` FROM `mayor` WHERE `codigo_cuen`='402.03' && `nom_us`='$nom_us'";
		    $resul2 = $conexion->query($sql2);

		    $dato2 = $resul2->fetch_assoc();
		    if(is_null($dato2['codigo_cuen'])){
		        $sql2_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('2','402.03','(-) DEV. S/VTA','$c1','$c2','$nom_us')";
		    	$resul2_1= $conexion->query($sql2_1);      
		    }else{
		        $sql2_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS DV, `nom_us` FROM `mayor` WHERE `codigo_cuen`='402.03' && `nom_us`='$nom_us'";
		        $sql2_2="UPDATE `resulanal` SET `id`='2',`c2`='0' WHERE `codigo`='402.03' && `nom_us`='$nom_us'";
		    	$resul2_1= $conexion->query($sql2_1);        
		    	$resul2_2= $conexion->query($sql2_2);        
		    }
	//
	//3 (-) REBAJAS S /VTA
		$sql3 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RV, `nom_us` FROM `mayor` WHERE `codigo_cuen`='402.02' && `nom_us`='$nom_us'";
		    $resul3 = $conexion->query($sql3);

		    $dato3 = $resul3->fetch_assoc();
		    if(is_null($dato3['codigo_cuen'])){
		        $sql3_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('3','402.02','(-) REBAJAS S /VTA','$c1','$c2','$nom_us')";
		    	$resul3_1= $conexion->query($sql3_1);      
		    }else{
		        $sql3_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RV, `nom_us` FROM `mayor` WHERE `codigo_cuen`='402.02' && `nom_us`='$nom_us'";
		        $sql3_2="UPDATE `resulanal` SET `id`='3',`c2`='0' WHERE `codigo`='402.02' && `nom_us`='$nom_us'";
		    	$resul3_1= $conexion->query($sql3_1);        
		    	$resul3_2= $conexion->query($sql3_2);        
		    }
	//
	//4 (-) DESCUENTOS S /VTA
		$sql4 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RV, `nom_us` FROM `mayor` WHERE `codigo_cuen`='402.01' && `nom_us`='$nom_us'";
		    $resul4 = $conexion->query($sql4);

		    $dato4 = $resul4->fetch_assoc();
		    if(is_null($dato4['codigo_cuen'])){
		        $sql4_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('4','402.01','(-) DESCUENTOS S /VTA','$c1','$c2','$nom_us')";
		    	$resul4_1= $conexion->query($sql4_1);      
		    }else{
		        $sql4_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RV, `nom_us` FROM `mayor` WHERE `codigo_cuen`='402.01' && `nom_us`='$nom_us'";
		        $sql4_2="UPDATE `resulanal` SET `id`='4',`c2`='0' WHERE `codigo`='402.01' && `nom_us`='$nom_us'";
		    	$resul4_1= $conexion->query($sql4_1);        
		    	$resul4_2= $conexion->query($sql4_2);        
		    }
	//
	//5(=) VENTAS NETAS
		$sql5 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES 
		('5','t1','(=) VENTAS NETAS','','$c2','$nom_us')";
		    $resul5 = $conexion->query($sql5);
	//    
	//6 (-) COMPRAS
		$sql6 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS C, `nom_us` FROM `mayor` WHERE `codigo_cuen`='502.01' && `nom_us`='$nom_us'";
		    $resul6 = $conexion->query($sql6);

		    $dato6 = $resul6->fetch_assoc();
		    if(is_null($dato6['codigo_cuen'])){
		        $sql6_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('6','502.01','COMPRAS','$c1','$c2','$nom_us')";
		    	$resul6_1= $conexion->query($sql6_1);      
		    }else{
		        $sql6_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS C, `nom_us` FROM `mayor` WHERE `codigo_cuen`='502.01' && `nom_us`='$nom_us'";
		        $sql6_2="UPDATE `resulanal` SET `id`='6',`c2`='0' WHERE `codigo`='502.01' && `nom_us`='$nom_us'";
		    	$resul6_1= $conexion->query($sql6_1);        
		    	$resul6_2= $conexion->query($sql6_2);        
		    }
	//
	//7 (+) GTOS DE COMPRA
		$sql7 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS GC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='502.02' && `nom_us`='$nom_us'";
		    $resul7 = $conexion->query($sql7);

		    $dato7 = $resul7->fetch_assoc();
		    if(is_null($dato7['codigo_cuen'])){
		        $sql7_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('7','502.02','(+) GTOS DE COMPRA','$c1','$c2','$nom_us')";
		    	$resul7_1= $conexion->query($sql7_1);      
		    }else{
		        $sql7_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS GC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='502.02' && `nom_us`='$nom_us'";
		        $sql7_2="UPDATE `resulanal` SET `id`='7',`c2`='0' WHERE `codigo`='502.02' && `nom_us`='$nom_us'";
		    	$resul7_1= $conexion->query($sql7_1);        
		    	$resul7_2= $conexion->query($sql7_2);        
		    }
	//
	//8(=) COMPRAS TOTALES
	$sql8 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES 
		('8','t2','(=) COMPRAS TOTALES','','$c2','$nom_us')";
		    $resul8 = $conexion->query($sql8);
	//
	//9 (-) DEVOLUCIONES S/COMPRA
		$sql9 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS DSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='503.01' && `nom_us`='$nom_us'";
		    $resul9 = $conexion->query($sql9);

		    $dato9 = $resul9->fetch_assoc();
		    if(is_null($dato9['codigo_cuen'])){
		        $sql9_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('9','503.01','(-) DEVOLUCIONES S/COMPRA','$c1','$c2','$nom_us')";
		    	$resul9_1= $conexion->query($sql9_1);      
		    }else{
		        $sql9_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS DSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='503.01' && `nom_us`='$nom_us'";
		        $sql9_2="UPDATE `resulanal` SET `id`='9',`c2`='0' WHERE `codigo`='503.01' && `nom_us`='$nom_us'";
		    	$resul9_1= $conexion->query($sql9_1);        
		    	$resul9_2= $conexion->query($sql9_2);        
		    }
	//
	//10 (-) REBAJAS S/COMPRA
		$sql10 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='503.02' && `nom_us`='$nom_us'";
		    $resul10 = $conexion->query($sql10);

		    $dato10 = $resul10->fetch_assoc();
		    if(is_null($dato10['codigo_cuen'])){
		        $sql10_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('10','503.02','(-) REBAJAS S/COMPRA','$c1','$c2','$nom_us')";
		    	$resul10_1= $conexion->query($sql10_1);      
		    }else{
		        $sql10_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='503.02' && `nom_us`='$nom_us'";
		        $sql10_2="UPDATE `resulanal` SET `id`='10',`c2`='0' WHERE `codigo`='503.02' && `nom_us`='$nom_us'";
		    	$resul10_1= $conexion->query($sql10_1);        
		    	$resul10_2= $conexion->query($sql10_2);        
		    }
	//
	//11 (=) COMPRAS NETAS
	$sql11 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES 
		('11','t3','(=) COMPRAS NETAS','','$c2','$nom_us')";
		    $resul11 = $conexion->query($sql11);
	//
	//12 (+) INV. INICIAL
		$sql12 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS II, `nom_us` FROM `mayor` WHERE `codigo_cuen`='115.08' && `nom_us`='$nom_us'";
		    $resul12 = $conexion->query($sql12);

		    $dato12 = $resul12->fetch_assoc();
		    if(is_null($dato12['codigo_cuen'])){
		        $sql12_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('12','115.08','(+) INV. INICIAL','$c1','$c2','$nom_us')";
		    	$resul12_1= $conexion->query($sql12_1);      
		    }else{
		        $sql12_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS II, `nom_us` FROM `mayor` WHERE `codigo_cuen`='115.08' && `nom_us`='$nom_us'";
		        $sql12_2="UPDATE `resulanal` SET `id`='12',`c2`='0' WHERE `codigo`='115.08' && `nom_us`='$nom_us'";
		    	$resul12_1= $conexion->query($sql12_1);        
		    	$resul12_2= $conexion->query($sql12_2);        
		    }
	//
	//13 (=) DISPONIBLE EN EL ALMACEN
		$sql13 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('13','T4','(=) DISPONIBLE EN EL ALMACEN','','$c2','$nom_us')";
		    $resul13 = $conexion->query($sql13);
	//
	//14 (-) INV. FINAL
		$sql14 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='115.09' && `nom_us`='$nom_us'";
		    $resul14 = $conexion->query($sql14);

		    $dato14 = $resul14->fetch_assoc();
		    if(is_null($dato14['codigo_cuen'])){
		        $sql14_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('14','115.09','(-) INV. FINAL','$c1','$c2','$nom_us')";
		    	$resul14_1= $conexion->query($sql14_1);      
		    }else{
		        $sql14_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='115.09' && `nom_us`='$nom_us'";
		        $sql14_2="UPDATE `resulanal` SET `id`='14',`c2`='0' WHERE `codigo`='115.09' && `nom_us`='$nom_us'";
		    	$resul14_1= $conexion->query($sql14_1);        
		    	$resul14_2= $conexion->query($sql14_2);        
		    }
	//
	//15 (=) COSTO DE VENTAS
		$sql15 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('15','t5','(=) COSTO DE VENTAS','','$c2','$nom_us')";
		    $resul15 = $conexion->query($sql15);
	//
	//16 UTILIDAD BRUTA
		$sql16 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('16','t6','(=) UTILIDAD BRUTA','','$c2','$nom_us')";
		    $resul16 = $conexion->query($sql16);
	//
	//17 GASTOS OPERATIVOS
		$sql17 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('17','t7','GASTOS OPERATIVOS','-','$c2','$nom_us')";
		    $resul17 = $conexion->query($sql17);
	//
	//18 (+) GASTOS DE VENTA 602.01
		$sql18 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='602.01' && `nom_us`='$nom_us'";
		    $resul18 = $conexion->query($sql18);

		    $dato18 = $resul18->fetch_assoc();
		    if(is_null($dato18['codigo_cuen'])){
		        $sql18_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('18','602.01','(+) GASTOS DE VENTA','$c1','$c2','$nom_us')";
		    	$resul18_1= $conexion->query($sql18_1);      
		    }else{
		        $sql18_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='602.01' && `nom_us`='$nom_us'";
		        $sql18_2="UPDATE `resulanal` SET `id`='18',`c2`='0' WHERE `codigo`='602.01' && `nom_us`='$nom_us'";
		    	$resul18_1= $conexion->query($sql18_1);        
		    	$resul18_2= $conexion->query($sql18_2);        
		    }
	//
	//19 (+) GASTOS DE ADMINISTRACION 603.01
		$sql19 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='603.01' && `nom_us`='$nom_us'";
		    $resul19 = $conexion->query($sql19);

		    $dato19 = $resul19->fetch_assoc();
		    if(is_null($dato19['codigo_cuen'])){
		        $sql19_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('19','603.01','(+) GASTOS DE ADMINISTRACION','$c1','$c2','$nom_us')";
		    	$resul19_1= $conexion->query($sql19_1);      
		    }else{
		        $sql19_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='603.01' && `nom_us`='$nom_us'";
		        $sql19_2="UPDATE `resulanal` SET `id`='19',`c2`='0' WHERE `codigo`='603.01' && `nom_us`='$nom_us'";
		    	$resul19_1= $conexion->query($sql19_1);        
		    	$resul19_2= $conexion->query($sql19_2);        
		    }
	//
	//20 (=) TOTAL DE GASTOS OPERATIVOS
		$sql20 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('20','t8','(=) TOTAL DE GASTOS OPERATIVOS','','$c2','$nom_us')";
		    $resul20 = $conexion->query($sql20);
	//
	//21 UTILIDAD O PERDIDA OPERATIVA
		$sql21 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('21','t9','UTILIDAD O PERDIDA OPERATIVA','','$c2','$nom_us')";
		    $resul21 = $conexion->query($sql21);
	//
	//22 RIF (RESULTADO INTEGRAL DE FINANCIAMIENTO)
		$sql22 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('22','t10','RIF (RESULTADO INTEGRAL DE FINANCIAMIENTO)','-','$c2','$nom_us')";
		    $resul22 = $conexion->query($sql22);
	//
	//23 PRODUCTO FINANCIERO
		$sql23 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('23','t11','PRODUCTO FINANCIERO','-','$c2','$nom_us')";
		    $resul23 = $conexion->query($sql23);
	//
	//24 INTERESES GANADOS 702.03
		$sql24 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='702.03' && `nom_us`='$nom_us'";
		    $resul24 = $conexion->query($sql24);

		    $dato24 = $resul24->fetch_assoc();
		    if(is_null($dato24['codigo_cuen'])){
		        $sql24_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('24','702.03','INTERESES GANADOS','$c1','$c2','$nom_us')";
		    	$resul24_1= $conexion->query($sql24_1);      
		    }else{
		        $sql24_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='702.03' && `nom_us`='$nom_us'";
		        $sql24_2="UPDATE `resulanal` SET `id`='24',`c2`='0' WHERE `codigo`='702.03' && `nom_us`='$nom_us'";
		    	$resul24_1= $conexion->query($sql24_1);        
		    	$resul24_2= $conexion->query($sql24_2);        
		    }
	//
	//25 GANANCIA CAMBIARIA 702.02
		$sql25 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='702.02' && `nom_us`='$nom_us'";
		    $resul25 = $conexion->query($sql25);

		    $dato25 = $resul25->fetch_assoc();
		    if(is_null($dato25['codigo_cuen'])){
		        $sql25_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('25','702.02','GANANCIA CAMBIARIA','$c1','$c2','$nom_us')";
		    	$resul25_1= $conexion->query($sql25_1);      
		    }else{
		        $sql25_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='702.02' && `nom_us`='$nom_us'";
		        $sql25_2="UPDATE `resulanal` SET `id`='25',`c2`='0' WHERE `codigo`='702.02' && `nom_us`='$nom_us'";
		    	$resul25_1= $conexion->query($sql25_1);        
		    	$resul25_2= $conexion->query($sql25_2);        
		    }
	//
	//26 GASTOS FINANCIEROS
		$sql26 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('26','t12','GASTOS FINANCIEROS','-','$c2','$nom_us')";
		    $resul26 = $conexion->query($sql26);
	//
	//27 INTERESES PAGADOS	701.03
		$sql27 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='701.03' && `nom_us`='$nom_us'";
		    $resul27 = $conexion->query($sql27);

		    $dato27 = $resul27->fetch_assoc();
		    if(is_null($dato27['codigo_cuen'])){
		        $sql27_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('27','701.03','INTERESES PAGADOS','$c1','$c2','$nom_us')";
		    	$resul27_1= $conexion->query($sql27_1);      
		    }else{
		        $sql27_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='701.03' && `nom_us`='$nom_us'";
		        $sql27_2="UPDATE `resulanal` SET `id`='27',`c2`='0' WHERE `codigo`='701.03' && `nom_us`='$nom_us'";
		    	$resul27_1= $conexion->query($sql27_1);        
		    	$resul27_2= $conexion->query($sql27_2);        
		    }
	//
	//28 PERDIDA CAMBIARIA 	701.02
		$sql28 = "SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='701.02' && `nom_us`='$nom_us'";
		    $resul28 = $conexion->query($sql28);

		    $dato28 = $resul28->fetch_assoc();
		    if(is_null($dato28['codigo_cuen'])){
		        $sql28_1 = "INSERT INTO `resulanal`(`id`,codigo,`des`, `c1`, `c2`, `nom_us`) VALUES ('28','701.02','PERDIDA CAMBIARIA','$c1','$c2','$nom_us')";
		    	$resul28_1= $conexion->query($sql28_1);      
		    }else{
		        $sql28_1 = "INSERT INTO `resulanal`(`codigo`, `des`, `c1`, `nom_us`) SELECT `codigo_cuen`, `cuenta`, SUM(SD)+SUM(SA) AS RSC, `nom_us` FROM `mayor` WHERE `codigo_cuen`='701.02' && `nom_us`='$nom_us'";
		        $sql28_2="UPDATE `resulanal` SET `id`='28',`c2`='0' WHERE `codigo`='701.02' && `nom_us`='$nom_us'";
		    	$resul28_1= $conexion->query($sql28_1);        
		    	$resul28_2= $conexion->query($sql28_2);        
		    }
	//
	//29 TOTAL DE RIF (UTILIDAD)
		$sql29 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('29','t12','TOTAL DE RIF (UTILIDAD)','','$c2','$nom_us')";
		    $resul29 = $conexion->query($sql29);
	//
	//30 (-) OTROS GASTOS
		$sql30 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('30','t13','(-) OTROS GASTOS','$c1','$c2','$nom_us')";
		    $resul30 = $conexion->query($sql30);
	//
	//31 (+) OTROS PRODUCTOS
		$sql31 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('31','t14','(+) OTROS PRODUCTOS','$c1','$c2','$nom_us')";
		    $resul31 = $conexion->query($sql31);
	//
	//32 UTILIDAD ANTES DE IMPUESTOS
		$sql32 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('32','t15','UTILIDAD ANTES DE IMPUESTOS','','$c2','$nom_us')";
		    $resul32 = $conexion->query($sql32);
	//	
	//33 (-) PTU 10%
		$sql33 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('33','t16','(-) PTU 10%','','$c2','$nom_us')";
		    $resul33 = $conexion->query($sql33);
	//
	//34 (-) ISR 30%
		$sql34 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('34','t17','(-) ISR 30%','','$c2','$nom_us')";
		    $resul34 = $conexion->query($sql34);
	//	
	//35 (=) UTILIDAD NETA DEL PERIODO
		$sql35 = "INSERT INTO `resulanal`(`id`,`codigo`, `des`, `c1`, `c2`, `nom_us`) VALUES ('35','t18','(=) UTILIDAD NETA DEL PERIODO','','$c2','$nom_us')";
		    $resul35 = $conexion->query($sql35);
	//
	    
		
	//Ejecutar la consulta
	if (!$sql35) {
		//echo $sql_1;?>
			<script type="text/javascript">
				alert("Error en el registro" +<?php printf("Errormessage: %s\n", $conexion->error);?>);
				window.location.href='../estadoresult_analitico.php';
			</script>

		<?php
		} else {?>
			<script type="text/javascript">
			alert("Tabla creada exitosamente");
			window.location.href='../estadoresult_analitico.php';
			</script>
		

		<?php
		}


?>