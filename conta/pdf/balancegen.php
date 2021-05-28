<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: ../index.php");
	}
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
?>
<?php
	require('fpdf/fpdf.php');
	require 'cn.php';
	require '../../conexion.php';
	 $sqlt = "SELECT * FROM encabezado WHERE nom_us='$nombre'";
			$resultadot = $mysqli->query($sqlt);
			$titulo = $resultadot->fetch_assoc();
			if(isset($titulo['nomEm']) && isset($titulo['fechaEm']) && isset($titulo['tipoDoc']) && isset($titulo['firma'])){
                $nome = trim($titulo['nomEm']);
                $fecha = trim($titulo['fechaEm']);
                $tipo = trim($titulo['tipoDoc']);
                $firma = trim($titulo['firma']);
              }else{
                $tipo="no registro el dato";
                $nome = "no registro el dato";
				$fecha = "no registro el dato";
				$firma = "no registro el dato";
                }	


	class PDF extends FPDF
	{

	// Cabecera de página
	function Header()
	{
	// Logo
		$this->Image('2.png',35,2,150);
		$this->Ln(15);

		// Arial bold 15
	    $this->SetFont('Arial','B',20);
      	$this->Cell(200,6,utf8_decode('Estado de Situación Financiera'),0,0,'C');
      	$this->Ln(8);
      	$this->SetFont('Arial','B',12);
      	$this->Cell(200,6,utf8_decode('-En forma de cuenta-'),0,0,'C');
      	$this->Ln(8);
      	$this->SetFont('Arial','B',15);
      	$this->Cell(200,5,$GLOBALS['nome'],0,0,'C');
      	$this->Ln(7);
      	$this->SetFont('Arial','B',12);
      	$this->Cell(200,5,$GLOBALS['fecha'],0,0,'C');

		$this->Ln(8);
		//$this->Image('logo1.jpg',188,2,20);



	}


	// Pie de página
	function Footer()
	{
		$this->Image('2021.png',185,255,20);
		// Posición: a 1,5 cm del final
		$this->SetY(-20);
		// Arial italic 8
		$this->SetFont('Arial','B',6);
		// Número de página
		$this->Cell(0,10,'Simulador CEA de TecNM',0,0,'C');
		$this->SetY(-18);
		$this->Cell(0,10,'XXVII Evento Nacional de Ciencias (ENEC)',0,0,'C');
		$this->SetY(-16);
		$this->Cell(0,10,'Copyright @ DASHA | ITT2',0,0,'C');
		$this->SetY(-8);
		
		$this->SetX(45);
		$this->SetDrawColor(0, 0, 0);
		$this->SetFont('Arial','B',8);
		$this->Cell(140,30,'','T',0,'C');
		$this->SetY(-10);
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');

			
	}
	}



	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('Portrait', 'Letter');


	$pdf->SetX(25); 
	$pdf->SetFillColor( 59, 108, 155 );
	$pdf->SetFont('Arial','U',13);     
	$pdf->cell(175,10,'ACTIVO ', 1,0,'C',  true);
	$pdf->Ln();
	
	
	// Activo a  corto plazo
	$pdf->SetX(25);
	$pdf->SetFillColor( 59, 108, 155 );
	$pdf->SetFont('Arial','U',13);
	$pdf->Cell(175,10,' Activo a corto plazo ',1,0,'L', true);
	$pdf->Ln();

	
	$sql = "SELECT * FROM `mayor` WHERE `codigo_cuen` BETWEEN 100 AND 140 && nom_us='$nombre' ";
	$sql2 = "SELECT * FROM `resulanal` WHERE `codigo`= 115.09 && nom_us='$nombre'";
		$rescargo = $conexion->query($sql2);
		$datocargo = $rescargo->fetch_assoc();
	if(isset($datocargo['c1']) ){
        $DES = $datocargo['des'];
        $infin = $datocargo['c1'];
        }else{
          $infin="0";
    }
		$consulta = mysqli_query($conexion, $sql);
		if($consulta->num_rows === 0) {
		$sumaACP=0;
		$pdf->SetX(25);
		$pdf->SetFillColor(171, 235, 198  );
		$pdf->Cell(140, 10, '', 1, 0, 'L',true);
		$pdf->SetFillColor(169, 223, 191 );
		$pdf->Cell(35, 10, '$ 0', 1, 0, 'R',1);
		$pdf->SetFillColor(169, 223, 191 );
		$pdf->Ln();
	}else{
		$sumaACP=0;
		while($rowedit = mysqli_fetch_array($consulta)){
			$id= $rowedit["id"];
			$codigo= $rowedit["codigo_cuen"];
			$cuenta = $rowedit["cuenta"];
			$SD = $rowedit["SD"];
			$SA = $rowedit["SA"];
		if ($SD==0) {
			$SD=$rowedit["SA"];
			$SDV="SUM(`SA`)";
		}elseif($SA==0){
			$SD = $rowedit["SD"];
			$SDV="SUM(`SD`)";
		}
		if ($cuenta=="Inventario inicial") {
		if ($infin==0) {
				$pdf->SetX(25);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(140, 10, $cuenta, 1, 0, 'L',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(35, 10, '$ '. number_format($SD,2), 1, 0, 'R',1);
				$pdf->SetFillColor(169, 223, 191 );
				$sumaACP = ($sumaACP) + ($SD);
				$pdf->Ln();
 		}else{
 				$pdf->SetX(25);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(140, 10, 'Inventario', 1, 0, 'L',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(35, 10, '$ '. number_format($infin,2), 1, 0, 'R',1);
				$pdf->SetFillColor(169, 223, 191 );
				$sumaACP = ($sumaACP) + ($infin);
				$pdf->Ln();
 		}
 		}else{
 				$pdf->SetX(25);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(140, 10, $cuenta, 1, 0, 'L',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(35, 10, '$ '. number_format($SD,2), 1, 0, 'R',1);
				$pdf->SetFillColor(169, 223, 191 );
				$sumaACP = ($sumaACP) + ($SD);
				$pdf->Ln();
 		}
	}//fin del while				
	}//fin del else principal	
	// Suma de activo a corto plazo
	$pdf->SetX(25); 
	$pdf->SetFillColor( 64, 118, 169 );      
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(140,10,' Total de activo a corto plazo ',1, 0, 'L', true);
	$pdf->SetFillColor(64, 118, 169 );
	$pdf->Cell(35, 10, '$ '.number_format($sumaACP,2), 1, 0, 'R',1);
	$pdf->Ln();

	// Activo a  largo plazo
	$pdf->SetX(25);
	$pdf->SetFillColor( 59, 108, 155 );
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(175,10,' Activo a largo plazo ',1,0,'L', true);
	$pdf->Ln();

	$sql = "SELECT * FROM `mayor` WHERE `codigo_cuen` BETWEEN 150 AND 195 && nom_us='$nombre'";
			$consulta = mysqli_query($conexion, $sql);
		if($consulta->num_rows === 0) {
			$sumaAlP=0;
			$pdf->SetX(25);
			$pdf->SetFillColor(171, 235, 198  );
			$pdf->Cell(140, 10, '', 1, 0, 'L',true);
			$pdf->SetFillColor(169, 223, 191 );
			$pdf->Cell(35, 10, '$ 0', 1, 0, 'R',1);
			$pdf->SetFillColor(169, 223, 191 );
			$pdf->Ln();
		}else{
			$sumaAlP=0;
		while($rowedit = mysqli_fetch_array($consulta)){
			$id= $rowedit["id"];
			$codigo= $rowedit["codigo_cuen"];
			$cuenta = $rowedit["cuenta"];
			$SD = $rowedit["SD"];
			$SA = $rowedit["SA"];
		if ($SD==0) {
			$SD=$rowedit["SA"];
			$SDV2="SUM(`SA`)";
		}elseif($SA==0){
			$SD = $rowedit["SD"];
			$SDV2="SUM(`SD`)";
		}
			$sumaAlP = ($sumaAlP) + ($SD);
			$pdf->SetX(25);
			$pdf->SetFillColor(171, 235, 198  );
			$pdf->Cell(140, 10, $cuenta, 1, 0, 'L',true);
			$pdf->SetFillColor(169, 223, 191 );
			$pdf->Cell(35, 10, '$ '. number_format($SD,2), 1, 0, 'R',1);
			$pdf->SetFillColor(169, 223, 191 );
			$pdf->Ln();
		}//fin del while
		}//fin del else principal


	// Suma de activo a corto plazo
	$pdf->SetX(25); 
	$pdf->SetFillColor( 64, 118, 169 );      
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(140,10,' Total de activo a largo plazo ',1, 0, 'L', true);
	$pdf->SetFillColor(64, 118, 169 );
	$pdf->Cell(35, 10, '$ '.number_format($sumaAlP,2) , 1, 0, 'R',1);
	$pdf->Ln();
	// total de activo
	$totalac=($sumaACP)+($sumaAlP);
	$pdf->SetX(25); 
	$pdf->SetFillColor( 64, 118, 169 );      
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(140,10,' TOTAL DE ACTIVO ',1, 0, 'L', true);
	$pdf->SetFillColor(64, 118, 169 );
	$pdf->Cell(35, 10, '$ '.number_format($totalac,2) , 1, 0, 'R',1);
	$pdf->Ln();


	//Pasivo
	$pdf->Ln();
	$pdf->SetX(25); 
	$pdf->SetFillColor( 59, 108, 155 );
	$pdf->SetFont('Arial','U',13);     
	$pdf->Cell(175,10,'PASIVO ', 1,0,'C',  true);
	$pdf->Ln();

	// Pasivo a  corto plazo
	

	$pdf->SetX(25);
	$pdf->SetFillColor( 59, 108, 155 );
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(175,10,' Pasivo a corto plazo ',1,0,'L', true);
	$pdf->Ln();

		$sql = "SELECT * FROM `mayor` WHERE `codigo_cuen` BETWEEN 200 AND 240 && nom_us='$nombre'";
			$consulta = mysqli_query($conexion, $sql);
		if($consulta->num_rows === 0) {
			$sumaPCP=0;
			$pdf->SetX(25);
			$pdf->SetFillColor(171, 235, 198  );
			$pdf->Cell(140, 10, '', 1, 0, 'L',true);
			$pdf->SetFillColor(169, 223, 191 );
			$pdf->Cell(35, 10, '$ 0', 1, 0, 'R',1);
			$pdf->SetFillColor(169, 223, 191 );
			$pdf->Ln();
		}else{
			$sumaPCP=0;
		while($rowedit = mysqli_fetch_array($consulta)){
			$id= $rowedit["id"];
			$codigo= $rowedit["codigo_cuen"];
			$cuenta = $rowedit["cuenta"];
			$SD = $rowedit["SD"];
			$SA = $rowedit["SA"];
		if ($SD==0) {
			$SA=$rowedit["SA"];
		}elseif($SA==0){
			$SA = $rowedit["SD"];
		}
			$sumaPCP=($sumaPCP)+($SA);
			$pdf->SetX(25);
			$pdf->SetFillColor(171, 235, 198  );
			$pdf->Cell(140, 10, $cuenta, 1, 0, 'L',true);
			$pdf->SetFillColor(169, 223, 191 );
			$pdf->Cell(35, 10, '$ '. number_format($SA,2), 1, 0, 'R',1);
			$pdf->SetFillColor(169, 223, 191 );
			$pdf->Ln();

		}//fin del while
		}//fin del else principal

	// Suma de pasivo a corto plazo
	$pdf->SetX(25); 
	$pdf->SetFillColor( 64, 118, 169 );      
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(140,10,' Total de pasivo a corto plazo ',1, 0, 'L', true);
	$pdf->SetFillColor(64, 118, 169 );
	$pdf->Cell(35, 10, '$ '.number_format($sumaPCP,2) , 1, 0, 'R',1);
	$pdf->Ln();


	// Pasivo a  largo plazo
	$pdf->SetX(25);
	$pdf->SetFillColor( 59, 108, 155 );
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(175,10,' Pasivo a largo plazo ',1,0,'L', true);
	$pdf->Ln();

	$sqlpla = "SELECT * FROM `mayor` WHERE `codigo_cuen` BETWEEN 250 AND 290 && nom_us='$nombre'";
		$consulta = mysqli_query($conexion, $sqlpla);
		if($consulta->num_rows === 0) {
			$sumaPLP=0;
			$pdf->SetX(25);
			$pdf->SetFillColor(171, 235, 198  );
			$pdf->Cell(140, 10, '', 1, 0, 'L',true);
			$pdf->SetFillColor(169, 223, 191 );
			$pdf->Cell(35, 10, '$ 0', 1, 0, 'R',1);
			$pdf->SetFillColor(169, 223, 191 );
			$pdf->Ln();
		}else{
			$sumaPLP=0;
		while($rowedit = mysqli_fetch_array($consulta)){
			$id= $rowedit["id"];
			$codigo= $rowedit["codigo_cuen"];
			$cuenta = $rowedit["cuenta"];
			$SD = $rowedit["SD"];
			$SA = $rowedit["SA"];
		if ($SD==0) {
			$SA=$rowedit["SA"];
		}elseif($SA==0){
			$SA = $rowedit["SD"];
		}
			$sumaPLP=($sumaPLP)+($SA);
			$pdf->SetX(25);
			$pdf->SetFillColor(171, 235, 198  );
			$pdf->Cell(200, 10, $cuenta, 1, 0, 'L',true);
			$pdf->SetFillColor(169, 223, 191 );
			$pdf->Cell(35, 10, '$ '. number_format($SA,2), 1, 0, 'R',1);
			$pdf->SetFillColor(169, 223, 191 );
			$pdf->Ln();
		}//fin del while
		}//fin del else principal


	$pdf->SetX(25); 
	$pdf->SetFillColor( 64, 118, 169 );      
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(140,10,' Total de pasivo a largo plazo ',1, 0, 'L', true);
	$pdf->SetFillColor(64, 118, 169 );
	$pdf->Cell(35, 10, '$ '.number_format($sumaPLP,2) , 1, 0, 'R',1);
	$pdf->Ln();

	$totalpasivo = ($sumaPCP) + ($sumaPLP);
	$pdf->SetX(25); 
	$pdf->SetFillColor( 64, 118, 169 );      
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(140,10,' TOTAL DE PASIVO',1, 0, 'L', true);
	$pdf->SetFillColor(64, 118, 169 );
	$pdf->Cell(35, 10, '$ '.number_format($totalpasivo,2), 1, 0, 'R',1);
	$pdf->Ln();




	//Capital contable
	$pdf->Ln();
	$pdf->SetX(25); 
	$pdf->SetFillColor( 59, 108, 155 );
	$pdf->SetFont('Arial','U',13);     
	$pdf->Cell(175,10,'CAPITAL CONTABLE ', 1,0,'C',  true);
	$pdf->Ln();

	// capital contribuido
	$pdf->SetX(25);
	$pdf->SetFillColor( 59, 108, 155 );
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(175,10,' Capital contribuido ',1,0,'L', true);
	$pdf->Ln();

	$sql = "SELECT * FROM `mayor` WHERE `codigo_cuen` BETWEEN 300 AND 307 && nom_us='$nombre'";
		$consulta = mysqli_query($conexion, $sql);
	if($consulta->num_rows === 0) {
		$sumaCC=0;
		$pdf->SetX(25);
		$pdf->SetFillColor(171, 235, 198  );
		$pdf->Cell(140, 10, '', 1, 0, 'L',true);
		$pdf->SetFillColor(169, 223, 191 );
		$pdf->Cell(35, 10, '$ 0', 1, 0, 'R',1);
		$pdf->SetFillColor(169, 223, 191 );
		$pdf->Ln();
	}else{
		$sumaCC=0;
	while($rowedit = mysqli_fetch_array($consulta)){
		$id= $rowedit["id"];
		$codigo= $rowedit["codigo_cuen"];
		$cuenta = $rowedit["cuenta"];
		$SD = $rowedit["SD"];
		$SA = $rowedit["SA"];
	if ($SD==0) {
			$SA=$rowedit["SA"];
	}elseif($SA==0){
			$SA = $rowedit["SD"];
	}
		$sumaCC=($sumaCC)+($SA);
		$pdf->SetX(25);
		$pdf->SetFillColor(171, 235, 198  );
		$pdf->Cell(140, 10, $cuenta, 1, 0, 'L',true);
		$pdf->SetFillColor(169, 223, 191 );
		$pdf->Cell(35, 10, '$ '. number_format($SA,2), 1, 0, 'R',1);
		$pdf->SetFillColor(169, 223, 191 );
		$pdf->Ln();
	}//fin del while
	}//fin del else principal
	
	// Suma de pasivo a corto plazo
	$pdf->SetX(25); 
	$pdf->SetFillColor( 64, 118, 169 );      
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(140,10,' Total de capital contribuido ',1, 0, 'L', true);
	$pdf->SetFillColor(64, 118, 169 );
	$pdf->Cell(35, 10, '$ '.number_format($sumaCC,2), 1, 0, 'R',1);
	$pdf->Ln();

	// Capital ganado
	$pdf->SetX(25);
	$pdf->SetFillColor( 59, 108, 155 );
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(175,10,' Capital ganado ',1,0,'L', true);
	$pdf->Ln();

	$sqlc2 = "SELECT `c2` FROM `resulanal` WHERE `id` ='32' AND nom_us='$nombre' ";
		$sqlc3 = "SELECT `c2` FROM `rescon` WHERE `codigo`='UPAI' AND nom_us='$nombre' ";
		$consulta1 = mysqli_query($conexion, $sqlc2);
		$consulta2 = mysqli_query($conexion, $sqlc3);
	if($consulta1->num_rows === 0 && $consulta2->num_rows === 0 ) {
		$resER=0;
		$pdf->SetX(25);
		$pdf->SetFillColor(171, 235, 198  );
		$pdf->Cell(140, 10, '', 1, 0, 'L',true);
		$pdf->SetFillColor(169, 223, 191 );
		$pdf->Cell(35, 10, '$ 0', 1, 0, 'R',1);
		$pdf->SetFillColor(169, 223, 191 );
		$pdf->Ln();
	}else{
		$d1=$consulta1->fetch_assoc();
		$d2=$consulta2->fetch_assoc();
	    if (isset($d1['c2'])) {
	    	$resER=$d1['c2'];
	    }elseif (isset($d2['c2'])) {
	    	$resER=$d2['c2'];
	    }
	    if ($resER>0) {
		$cuentaer="Utilidad Operativa";
		}else{
		$cuentaer="Perdida Operativa";
		}
		$pdf->SetX(25);
		$pdf->SetFillColor(171, 235, 198  );
		$pdf->Cell(140, 10, $cuentaer, 1, 0, 'L',true);
		$pdf->SetFillColor(169, 223, 191 );
		$pdf->Cell(35, 10, '$ '. number_format($resER,2), 1, 0, 'R',1);
		$pdf->SetFillColor(169, 223, 191 );
		$pdf->Ln();


	}//fin del else principal

	// Suma de Capital ganado

	$pdf->SetX(25); 
	$pdf->SetFillColor( 64, 118, 169 );      
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(140,10,' Total de capital ganado',1, 0, 'L', true);
	$pdf->SetFillColor(64, 118, 169 );
	$pdf->Cell(35, 10, '$ '.number_format($resER,2), 1, 0, 'R',1);
	$pdf->Ln();

	$tcc= ($sumaCC)+($resER);
	$pdf->SetX(25); 
	$pdf->SetFillColor( 64, 118, 169 );      
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(140,10,' Total capital contable',1, 0, 'L', true);
	$pdf->SetFillColor(64, 118, 169 );
	$pdf->Cell(35, 10, '$ '.number_format($tcc,2) , 1, 0, 'R',1);
	$pdf->Ln();

	$PmasC= ($totalpasivo)+($tcc);
	$pdf->SetX(25); 
	$pdf->SetFillColor( 64, 118, 169 );      
	$pdf->SetFont('Arial','U',13);;
	$pdf->Cell(140,10,' TOTAL PASIVO + CAPITAL',1, 0, 'L', true);
	$pdf->SetFillColor(64, 118, 169 );
	$pdf->Cell(35, 10, '$ '.number_format($PmasC,2), 1, 0, 'R',1);
	$pdf->Ln();

	$pdf->Ln();$pdf->Ln();
	$pdf->Cell(200,7,utf8_decode('AUTORIZADO POR'), 0, 1, 'C');
	$pdf->Cell(200,5,utf8_decode($GLOBALS['firma'] ), 0, 1, 'C');
	$pdf->SetX(60);
	$pdf->Cell(100,10,'','T',0,'C');
	$pdf->Ln();	
	$pdf->Output('i', 'Estado de Resultado Analitico.pdf');
?>