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
	    
      	$this->Cell(200,6,utf8_decode('Estado de Resulrado Analitico'),0,0,'C');
      	$this->Ln(8);
      	$this->SetFont('Arial','B',15);
      	$this->Cell(200,5,$GLOBALS['nome'],0,0,'C');
      	$this->Ln(7);
      	$this->SetFont('Arial','B',12);
      	$this->Cell(200,5,$GLOBALS['fecha'],0,0,'C');

		$this->Ln(8);
		//$this->Image('logo1.jpg',188,2,20);
		$this->SetFillColor( 23, 32, 42 );
		$this->SetTextColor( 253, 254, 254);
		$this->Cell(144.8,10,'Cuenta', 1, 0, 'L',2);
		$this->Cell(0.1);
		$this->Cell(24.9,10,' ', 1, 0, 'L',2);
		$this->Cell(0.1);
		$this->Cell(24.9,10,' ', 1, 0, 'R',1);
		$this->Ln();


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

$sql = "SELECT * FROM resulanal  Where nom_us= '$nombre'";
		$resultado = $mysqli->query($sql);

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('Portrait', 'Letter');
				
	   // tabla
	 	$pdf->SetFont('Times','',13);
		while ($row=$resultado->fetch_assoc()) {
			$pdf->SetX(10);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(145, 10, utf8_decode($row['des']), 1, 0, 'L',true);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(25, 10, $row['c1'], 1, 0, 'L',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(25, 10, $row['c2'], 1, 0, 'R',1);
				$pdf->Ln();	
			}

	   //fin de tabla

	$pdf->Ln();$pdf->Ln();
	$pdf->Cell(200,7,utf8_decode('AUTORIZADO POR'), 0, 1, 'C');
	$pdf->Cell(200,5,utf8_decode($GLOBALS['firma'] ), 0, 1, 'C');
	$pdf->SetX(60);
	$pdf->Cell(100,10,'','T',0,'C');
	$pdf->Ln();	
	$pdf->Output('i', 'Estado de Resultado Analitico.pdf');
?>