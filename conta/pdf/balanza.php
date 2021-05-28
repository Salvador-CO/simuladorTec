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
	 $sqlt = "SELECT * FROM encabezado WHERE nom_us='$nombre'";
			$resultadot = $mysqli->query($sqlt);
			$titulo = $resultadot->fetch_assoc();
			if(isset($titulo['nomEm']) && isset($titulo['fechaEm']) && isset($titulo['tipoDoc']) && isset($titulo['firma'])){
                $nome = trim($titulo['nomEm']);
                $fecha = trim($titulo['fechaEm']);
                $tipo = trim($titulo['tipoDoc']);
                $firma = trim($titulo['firma']);
              }else{
                $t="no registro el dato";
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
		$this->Image('2.png',65,2,150);
		$this->Ln(15);

		// Arial bold 15
	    $this->SetFont('Arial','B',20);
	    
      	$this->Cell(261,6,utf8_decode('Balanza de Comprobación'),0,0,'C');
      	$this->SetFont('Arial','B',12);
      	$this->Ln(8);
      	$this->SetFont('Arial','B',18);
      	$this->Cell(261,5,$GLOBALS['nome'],0,0,'C');
      	$this->Ln(7);
      	$this->SetFont('Arial','B',12);
      	$this->Cell(261,5,$GLOBALS['fecha'],0,0,'C');

		$this->Ln(10);
		//$this->Image('logo1.jpg',188,2,20);
		// Arial bold 15
		$this->SetFont('Arial','B',11);
		// Movernos a la derecha
		
		// Título
		$this->SetX(25);
		$this->SetFillColor( 255, 255, 255 );
		$this->Cell(15,10,'', 0, 0, 'C',1);
		$this->SetFillColor( 23, 32, 42 );
		$this->SetTextColor( 253, 254, 254);
		$this->Cell(115,10,'Nombre de la cuenta', 1, 0, 'C',1);
		$this->Cell(50,10,'Movimiento del mes', 1, 0, 'C',1);
		$this->Cell(50,10,'Saldo del mes', 1, 1, 'C',1);
		$this->SetX(25);
		$this->SetFillColor( 23, 32, 42 );
		$this->SetTextColor( 253, 254, 254);
		$this->Cell(15,10,'#', 1, 0, 'C',1);
		// Salto de línea
		$this->Cell(115,10,'A., P., C. o R.', 1, 0, 'C',2);
		
		$this->Cell(25,10,utf8_decode('Debe'), 1, 0, 'C',2);
		
		$this->Cell(25,10,utf8_decode('Haber'), 1, 0, 'C',1);
		
		$this->Cell(25,10,'Deudor', 1, 0, 'C',1);
		
		$this->Cell(25,10,'Acredor', 1, 0, 'C',1);
	
		$this->Ln();

	}

	// Pie de página
	function Footer()
	{
			$this->Image('2021.png',230,193,20);
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
		$this->Cell(180,30,'','T',0,'C');
		$this->SetY(-10);
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');

			
	}
	}

		$sql = "SELECT * FROM mayor  Where nom_us= '$nombre' ORDER BY `mayor`.`codigo_cuen` ASC";
		$resultado = $mysqli->query($sql);
			
		
	// Creación del objeto de la clase heredada
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('Landscape', 'LETTER');
	

	$pdf->SetFont('Times','',13);
		while ($row=$resultado->fetch_assoc()) {
			$pdf->SetX(25);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(15, 10, $row['codigo_cuen'], 1, 0, 'C',true);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(115, 10, $row['cuenta'], 1, 0, 'L',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(25, 10, $row['MD'], 1, 0, 'R',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(25, 10, $row['MA'], 1, 0, 'R',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(25, 10, $row['SD'], 1, 0, 'R',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(25, 10, $row['SA'], 1, 0, 'R',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Ln();
			}	
	 // SELECT SUM(`cargo`) FROM `diario` WHERE `nom_us`='admin'
              $sqlcargo = "SELECT SUM(cargo) FROM diario  Where nom_us= '$nombre'";
              $sqlabono = "SELECT SUM(abono) FROM diario  Where nom_us= '$nombre'";              //cargo
              	$sumMD = "SELECT SUM(MD) FROM `mayor` where nom_us='$nombre'";
				$sumMA = "SELECT SUM(MA) FROM `mayor` where nom_us='$nombre'";
				$sumSD = "SELECT SUM(SD) FROM `mayor` where nom_us='$nombre'";
				$sumSA = "SELECT SUM(SA) FROM `mayor` where nom_us='$nombre'";


              $resMD = $mysqli->query($sumMD);
                $datoMD = $resMD->fetch_assoc();
              if(isset($datoMD['SUM(MD)'])){
                $MD = $datoMD['SUM(MD)'];
              }else{
                $MD="¡0!";
                }

              $resMA = $mysqli->query($sumMA);
                $datoMA = $resMA->fetch_assoc();
              if(isset($datoMA['SUM(MA)'])){
                $MA = $datoMA['SUM(MA)'];
              }else{
                $MA="¡0!";
                }

                 $resSD = $mysqli->query($sumSD);
                $datoSD = $resSD->fetch_assoc();
              if(isset($datoSD['SUM(SD)'])){
                $SD = $datoSD['SUM(SD)'];
              }else{
                $SD="¡0!";
                }

                 $resSA = $mysqli->query($sumSA);
                $datoSA = $resSA->fetch_assoc();
              if(isset($datoSA['SUM(SA)'])){
                $SA = $datoSA['SUM(SA)'];
              }else{
                $SA="¡0!";
                }
              

   	$pdf->SetX(25);    
	$pdf->Cell(166,3,'','0',1,'C');
   	$pdf->SetX(25);    
	$pdf->Cell(130,10,'Total ','T',0,'C');
	$pdf->SetFillColor(169, 223, 191 );
	$pdf->Cell(25, 10, '$'. $MD, 1, 0, 'R',1);
	$pdf->SetFillColor(  171, 235, 198  );	
	$pdf->Cell(25, 10, '$'.$MA, 1, 0, 'R',1);
	$pdf->SetFillColor(169, 223, 191 );
	$pdf->Cell(25, 10, '$'.$SD, 1, 0, 'R',1);
	$pdf->SetFillColor(  171, 235, 198  );
	$pdf->Cell(25, 10, '$'.$SA, 1, 0, 'R',1);
	$pdf->Ln();
	$pdf->Ln();$pdf->Ln();$pdf->Ln();
	$pdf->Cell(260,10,utf8_decode('AUTORIZADO POR'), 0, 1, 'C');
	$pdf->Cell(260,10,utf8_decode($GLOBALS['firma'] ), 0, 1, 'C');
	$pdf->SetX(90);
	$pdf->Cell(100,10,'','T',0,'C');
	$pdf->Ln();	
	$pdf->Output('i', 'Rayado diario.pdf');
?>