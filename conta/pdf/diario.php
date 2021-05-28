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
		$this->Image('2.png',75,2,150);
		$this->Ln(15);

		 $this->SetFont('Arial','B',20);
	    
      	$this->Cell(280,6,utf8_decode('LIBRO DIARIO'),0,0,'C');
      	$this->Ln(8);
      	$this->SetFont('Arial','B',15);
      	$this->Cell(280,6,$GLOBALS['nome'],0,0,'C');
      	$this->Ln(7);
      	$this->SetFont('Arial','B',12);
      	$this->Cell(280,6,$GLOBALS['fecha'],0,0,'C');

		$this->Ln(10);
		//$this->Image('logo1.jpg',188,2,20);
		// Arial bold 15
		$this->SetFont('Arial','B',11);
		// Movernos a la derecha
		$this->Cell(0.1);
		// Título
		$this->SetFillColor( 23, 32, 42 );
		$this->SetTextColor( 253, 254, 254);
		$this->Cell(10,10,'#', 1, 0, 'C',1);
		// Salto de línea
		$this->Cell(0.1);
		
		$this->Cell(24.8,10,'Fecha', 1, 0, 'C',2);
		$this->Cell(0.1);
		$this->Cell(18.9,10,utf8_decode('Código'), 1, 0, 'C',2);
		$this->Cell(0.1);
		$this->Cell(17,10,utf8_decode('Póliza'), 1, 0, 'C',1);
		$this->Cell(0.1);
		$this->Cell(113.8,10,'Concepto', 1, 0, 'C',1);
		$this->Cell(0.1);
		$this->Cell(30,10,'Parcial', 1, 0, 'C',1);
		$this->Cell(0.1);
		$this->Cell(22.8,10,'Cargo', 1, 0, 'C',1);
		$this->Cell(0.1);
		$this->Cell(22.8,10,'Abono', 1, 0, 'C',1);
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

		$sql = "SELECT * FROM diario  Where nom_us= '$nombre' && numAsiento NOT IN ('AIVA')";
		$resultado = $mysqli->query($sql);
			
		
	// Creación del objeto de la clase heredada
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('Landscape', 'LETTER');

	$pdf->SetFont('Times','',13);
		while ($row=$resultado->fetch_assoc()) {
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(10, 10, $row['numAsiento'], 1, 0, 'C',true);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(25, 10, $row['fecha'], 1, 0, 'C',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(19, 10, $row['codigo_cuen'], 1, 0, 'C',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(17, 10, $row['poliza'], 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(114, 10, $row['concepto'], 1, 0, 'L',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(30, 10, $row['parcial'], 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(23, 10, '$'. $row['cargo'], 1, 0, 'R',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(23, 10, '$'.$row['abono'], 1, 0, 'R',1);
				$pdf->Ln();
			}	
	 // SELECT SUM(`cargo`) FROM `diario` WHERE `nom_us`='admin'
              $sqlcargo = "SELECT SUM(cargo) FROM diario  Where nom_us= '$nombre' && numAsiento NOT IN ('AIVA')";
              $sqlabono = "SELECT SUM(abono) FROM diario  Where nom_us= '$nombre' && numAsiento NOT IN ('AIVA')";              //cargo
              $rescargo = $mysqli->query($sqlcargo);
                $datocargo = $rescargo->fetch_assoc();
              if(isset($datocargo['SUM(cargo)'])){
                $cargo = $datocargo['SUM(cargo)'];
              }else{
                $cargo="¡0!";
                }
              //abono
              $resabono = $mysqli->query($sqlabono);
                $datoabono = $resabono->fetch_assoc();
              if(isset($datoabono['SUM(abono)'])){
                $abono = $datoabono['SUM(abono)'];
              }else{
                $abono="0";
                }

       
	$pdf->Cell(166,3,'','0',1,'C');
	$pdf->Cell(215,10,'Total de cargo y abono','T',0,'C');
	$pdf->SetFillColor(169, 223, 191 );
	$pdf->Cell(23, 10, '$'. $cargo, 1, 0, 'R',1);
	$pdf->SetFillColor(  171, 235, 198  );	
	$pdf->Cell(23, 10, '$'.$abono, 1, 0, 'R',1);
	$pdf->Ln();

	$sqliva = "SELECT * FROM iva  Where nom_us= '$nombre'";
		$resultadoiva = $mysqli->query($sqliva);
	$pdf->SetFillColor(255, 255, 255  );
	$pdf->Cell(71,5,'', 0, 0, 'C',2);
	
	if(isset($resultadoiva)){
		$pdf->Cell(190,10,utf8_decode('----Ajuste de IVA----'), 0, 0, 'C',2);
		$pdf->Ln();	
	 while ($row=$resultadoiva->fetch_assoc()) {
				$pdf->SetFillColor(255, 255, 255  );
				$pdf->Cell(71, 10, '', 0, 0, 'C',true);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(144, 10, $row['concepto'], 1, 0, 'C',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(23, 10, $row['cargo'], 1, 0, 'C',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(23, 10, $row['abono'], 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Ln();
			}	
	}else{
		$pdf->Cell(71,5,'', 0, 0, 'C',2);
		$pdf->Ln();	
		$pdf->Cell(190,10,utf8_decode('No se realizó ningún ajuste de IVA'), 0, 0, 'C',2);
	 
	}
	$pdf->Ln();$pdf->Ln();
	$pdf->Cell(260,10,utf8_decode('AUTORIZADO POR'), 0, 1, 'C');
	$pdf->Cell(260,10,utf8_decode($GLOBALS['firma'] ), 0, 1, 'C');
	$pdf->SetX(90);
	$pdf->Cell(100,10,'','T',0,'C');
	$pdf->Ln();	
	$pdf->Output('i', 'Rayado diario.pdf');
?>