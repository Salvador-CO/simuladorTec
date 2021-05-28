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
		$this->Image('2.png',65,2,150);
		$this->Ln(15);

		// Arial bold 15
	    $this->SetFont('Arial','B',20);
	    
      	$this->Cell(261,6,utf8_decode('TARJETA DE ALMACÉN'),0,1,'C');
      	$this->SetFont('Arial','B',12);
      	$this->Cell(261,6,utf8_decode('MÉTODO DE COSTO PROMEDIO'),0,0,'C');
      	$this->Ln(7);
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
		$this->Cell(0.1);
		// Título
		$this->SetFillColor( 23, 32, 42 );
		$this->SetTextColor( 253, 254, 254);

		$this->Cell(84);
		$this->Cell(56.9,10,'Unidades', 1, 0, 'C',1);
		$this->Cell(0.1);
		$this->Cell(19.8,10,'Costo', 1, 0, 'C',1);
		$this->Cell(0.1);
		$this->Cell(89.9,10,'Valores', 1, 0, 'C',1);
		$this->Ln();
		$this->Cell(10,10,'#', 1, 0, 'C',1);
		// Salto de línea
		$this->Cell(0.1);
		
		$this->Cell(24.8,10,'Fecha', 1, 0, 'C',2);
		$this->Cell(0.1);
		$this->Cell(48.9,10,utf8_decode('Concepto'), 1, 0, 'C',2);
		$this->Cell(0.1);
		$this->Cell(17,10,utf8_decode('Entrada'), 1, 0, 'C',1);
		$this->Cell(0.1);
		$this->Cell(19.8,10,'Salida', 1, 0, 'C',1);
		$this->Cell(0.1);
		$this->Cell(20,10,'Existencia', 1, 0, 'C',1);
		$this->Cell(0.1);
		$this->Cell(19.9,10,'Unitario', 1, 0, 'C',1);
		$this->Cell(0.1);
		$this->Cell(29.9,10,'Cargo', 1, 0, 'C',1);
		$this->Cell(0.1);
		$this->Cell(29.9,10,'Abono', 1, 0, 'C',1);
		$this->Cell(0.1);
		$this->Cell(29.9,10,'Saldo', 1, 0, 'C',1);
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


	
		$sql = "SELECT * FROM tarjetacp  Where num_us= '$nombre'";
		$resultado = $mysqli->query($sql);
			
		
	// Creación del objeto de la clase heredada
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('Landscape', 'LETTER');

	$pdf->SetFont('Times','',13);
		while ($row=$resultado->fetch_assoc()) {
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(10, 10, $row['id_cp'], 1, 0, 'C',true);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(25, 10, $row['fecha_cp'], 1, 0, 'C',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(49, 10, $row['concepto_cp'], 1, 0, 'C',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(17, 10, $row['entrada_cp'], 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(20, 10, $row['salida_cp'], 1, 0, 'L',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(20, 10, $row['existencia_cp'], 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(20, 10, '$'. $row['unitario_cp'], 1, 0, 'R',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(30, 10, '$'.$row['cargo_cp'], 1, 0, 'R',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(30, 10, '$'.$row['abono_cp'], 1, 0, 'R',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(30, 10, '$'.$row['saldo_cp'], 1, 0, 'R',1);
				$pdf->Ln();
			}	
	 

      $pdf->Ln();$pdf->Ln();
	$pdf->Cell(260,10,utf8_decode('AUTORIZADO POR'), 0, 1, 'C');
	$pdf->Cell(260,10,utf8_decode($GLOBALS['firma'] ), 0, 1, 'C');
	$pdf->SetX(90);
	$pdf->Cell(100,10,'','T',0,'C');
	$pdf->Ln();	
	$pdf->Output('i', 'TarjetaCP.pdf');
?>