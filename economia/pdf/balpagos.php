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
	require ('../../conta/pdf/cn.php');
	 $sqlt = "SELECT * FROM encabezadoeco WHERE nom_us='$nombre'";
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
	    
      	$this->Cell(280,6,utf8_decode('Balanza de pago'),0,0,'C');
      	$this->Ln(8);
      	$this->SetFont('Arial','B',15);
      	$this->Cell(280,6,$GLOBALS['nome'],0,0,'C');
      	$this->Ln(7);
      	$this->SetFont('Arial','B',12);
      	$this->Cell(280,6,$GLOBALS['fecha'],0,0,'C');

		$this->Ln(10);
		//$this->Image('logo1.jpg',188,2,20);
		

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
?>
<?php
		
		
			
		
	// Creación del objeto de la clase heredada
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('Landscape', 'LETTER');

	$pdf->SetFont('Times','',13);

	// Balanza de Cuenta Corriente
		$sql= "SELECT * FROM `regbalanza` WHERE `tipo`='BCC' && `nom_us`='$nombre'";
		$resultado = $mysqli->query($sql);
				$pdf->SetFillColor(111, 235, 198  );
				$pdf->Cell(261, 10, 'Balanza de cuenta corriente', 1, 0, 'C',true);
				$pdf->Ln();
				$pdf->SetFillColor(169, 223, 191   );
				$pdf->Cell(111, 10, 'concepto', 1, 0, 'C',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10,'ingresos', 1, 0, 'C',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(50, 10,'pagos', 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10,'saldos', 1, 0, 'C',1);
				
				$pdf->Ln();

		while ($row=$resultado->fetch_assoc()) {
				
				$pdf->SetFillColor(111, 235, 198  );
				$pdf->Cell(111, 10, utf8_decode($row['concepto']), 1, 0, 'C',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10, $row['ingresos'], 1, 0, 'C',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(50, 10, $row['pagos'], 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10, $row['saldos'], 1, 0, 'C',1);
				
				$pdf->Ln(15);
			}
	
	//Balanza de Cuenta Capital

$sql= "SELECT * FROM `regbalanza` WHERE `tipo`='BCCap' && `nom_us`='$nombre' ";
$resultado = $mysqli->query($sql);
	$pdf->SetFillColor(111, 235, 198  );
				$pdf->Cell(261, 10, 'Balanza de cuenta capital', 1, 0, 'C',true);
				$pdf->Ln();
				$pdf->SetFillColor(169, 223, 191  );
				$pdf->Cell(111, 10, 'concepto', 1, 0, 'C',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10,'ingresos', 1, 0, 'C',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(50, 10,'pagos', 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10,'saldos', 1, 0, 'C',1);
				
				$pdf->Ln();
				
		while ($row=$resultado->fetch_assoc()) {
				
				$pdf->SetFillColor(111, 235, 198  );
				$pdf->Cell(111, 10, utf8_decode($row['concepto']), 1, 0, 'C',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10, $row['ingresos'], 1, 0, 'C',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(50, 10, $row['pagos'], 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10, $row['saldos'], 1, 0, 'C',1);
				
				$pdf->Ln(15);
			}


//Balanza financiera
$sql= "SELECT * FROM `regbalanza` WHERE `tipo`='BF' && `nom_us`= '$nombre' ";
	$resultado = $mysqli->query($sql);

	$pdf->SetFillColor(111, 235, 198  );
				$pdf->Cell(261, 10, 'Balanza Financiera', 1, 0, 'C',true);
				$pdf->Ln();

				$pdf->SetFillColor(169, 223, 191   );
				$pdf->Cell(111, 10, 'concepto', 1, 0, 'C',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10,'ingresos', 1, 0, 'C',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(50, 10,'pagos', 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10,'saldos', 1, 0, 'C',1);
				
				$pdf->Ln();
				
		while ($row=$resultado->fetch_assoc()) {
				
				$pdf->SetFillColor(111, 235, 198  );
				$pdf->Cell(111, 10, utf8_decode($row['concepto']), 1, 0, 'C',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10, $row['ingresos'], 1, 0, 'C',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(50, 10, $row['pagos'], 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10, $row['saldos'], 1, 0, 'C',1);
				
				$pdf->Ln(15);
			}



// Balanza de pagos
$sql= " SELECT * FROM `regbalanza` WHERE `tipo`='BP' && `nom_us`='$nombre' ";
$resultado = $mysqli->query($sql);

	$pdf->SetFillColor(111, 235, 198  );
				$pdf->Cell(261, 10, 'Balanza de Pagos', 1, 0, 'C',true);
				$pdf->Ln();
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(111, 10, 'concepto', 1, 0, 'C',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10,'ingresos', 1, 0, 'C',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(50, 10,'pagos', 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10,'saldos', 1, 0, 'C',1);
				
				$pdf->Ln();
				
		while ($row=$resultado->fetch_assoc()) {
				
				$pdf->SetFillColor(111, 235, 198  );
				$pdf->Cell(111, 10, utf8_decode($row['concepto']), 1, 0, 'C',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10, $row['ingresos'], 1, 0, 'C',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(50, 10, $row['pagos'], 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10, $row['saldos'], 1, 0, 'C',1);
				
				$pdf->Ln(15);
			}





// Balanza de Errores y Omisiones
$sql= "SELECT * FROM `regbalanza` WHERE `tipo`='EO' && `nom_us`= '$nombre' ";
	$resultado = $mysqli->query($sql);

	$pdf->SetFillColor(111, 235, 198  );
				$pdf->Cell(261, 10, 'Balanza de Errores y Omisiones', 1, 0, 'C',true);
				$pdf->Ln();
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(111, 10, 'concepto', 1, 0, 'C',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10,'ingresos', 1, 0, 'C',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(50, 10,'pagos', 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10,'saldos', 1, 0, 'C',1);
				
				$pdf->Ln();
				
		while ($row=$resultado->fetch_assoc()) {
				
				$pdf->SetFillColor(111, 235, 198  );
				$pdf->Cell(111, 10, utf8_decode($row['concepto']), 1, 0, 'C',true);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10, $row['ingresos'], 1, 0, 'C',1);
				$pdf->SetFillColor(171, 235, 198  );
				$pdf->Cell(50, 10, $row['pagos'], 1, 0, 'C',1);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->Cell(50, 10, $row['saldos'], 1, 0, 'C',1);
				
				$pdf->Ln(15);
			}

	 

	$pdf->Ln();$pdf->Ln();
	$pdf->Cell(260,10,utf8_decode('AUTORIZADO POR'), 0, 1, 'C');
	$pdf->Cell(260,10,utf8_decode($GLOBALS['firma'] ), 0, 1, 'C');
	$pdf->SetX(90);
	$pdf->Cell(100,10,'','T',0,'C');
	$pdf->Ln();	
	$pdf->Output('i', 'balanza de pago.pdf');
?>