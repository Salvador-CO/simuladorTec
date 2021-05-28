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
	    
      	$this->Cell(200,6,utf8_decode('Esquemas de Mayor'),0,0,'C');
      	$this->Ln(10);
      	$this->SetFont('Arial','B',15);
      	$this->Cell(200,5,$GLOBALS['nome'],0,0,'C');
      	$this->Ln(7);
      	$this->SetFont('Arial','B',12);
      	$this->Cell(200,5,$GLOBALS['fecha'],0,0,'C');

		$this->Ln(10);
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

	// Creación del objeto de la clase heredada
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('Portrait', 'Letter');

	$sqltitulo = "SELECT DISTINCT concepto FROM `diario` WHERE`nom_us`='$nombre'";
		$resultadotitulo = $mysqli->query($sqltitulo);
        while ($rowt=$resultadotitulo->fetch_assoc()) {
        		$pdf->SetFont('Arial','B',10);
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->SetX(70);
				$pdf->Cell(90, 4, $rowt['concepto'], 1, 1, 'C',true);
				$pdf->SetX(70);
				$pdf->Cell(10, 5, '#', 1, 0, 'C',true);
				$pdf->Cell(40, 5, 'Debe', 1, 0, 'C',true);
				$pdf->Cell(40, 5, 'Habe', 1, 0, 'C',true);
				$pdf->Ln();
				$concepto= implode(";", $rowt);
	$sqlbody ="SELECT id, numAsiento, cargo, abono FROM diario WHERE nom_us='$nombre' && concepto='$concepto'";
		$resultadobody = $mysqli->query($sqlbody);
		while ($rowb=$resultadobody->fetch_assoc()) {
				$pdf->SetFillColor(169, 223, 191 );
				$pdf->SetX(70);
				$pdf->Cell(10, 5, $rowb['numAsiento'], 1, 0, 'C',true);
				$pdf->Cell(40, 5, $rowb['cargo'], 1, 0, 'C',true);
				$pdf->Cell(40, 5, $rowb['abono'], 1, 0, 'C',true);
				$pdf->Ln();
			}
			$sqlcargo="SELECT SUM(cargo) FROM diario Where nom_us= '$nombre' && concepto= '$concepto'";
            $sqlabono="SELECT SUM(abono) FROM diario Where nom_us= '$nombre' && concepto= '$concepto'";
            $rescargo = $mysqli->query($sqlcargo);
                  $datocargo = $rescargo->fetch_assoc();
                if(isset($datocargo['SUM(cargo)'])){
                  $cargo = $datocargo['SUM(cargo)'];
                }else{
                  $cargo="¡0!";
                  }
              $resabono = $mysqli->query($sqlabono);
                  $datoabono = $resabono->fetch_assoc();
                if(isset($datoabono['SUM(abono)'])){
                  $abono = $datoabono['SUM(abono)'];
                }else{
                  $abono="0";
                  //$sqlmayor="INSERT INTO (cuenta,MD, MA, nom_us) vales ($concepto, $cargo, $abono, $nombre)";
                  }
                $pdf->SetX(70);
				$pdf->Cell(10, 5, '', 1, 0, 'C',true);
				$pdf->Cell(40, 5, 'MD: '.$cargo, 1, 0, 'C',true);
				$pdf->Cell(40, 5, 'MA: '.$abono, 1, 0, 'C',true);  
				$pdf->Ln();

			if ($cargo == $abono) {
				$pdf->SetX(70);
                $pdf->SetFillColor(163, 0, 0);
                $pdf->SetTextColor(255, 255, 255 );
				$pdf->Cell(90, 5, 'Cuenta canselada', 0, 0, 'C',true);
				$pdf->SetTextColor(0, 0, 0 );
				$pdf->Ln();

			}else{
			//
				$sa=$cargo-$abono;  
                	if ($sa>0){
                		$pdf->SetX(70);
                		$pdf->SetFillColor(255, 255, 255 );
                		$pdf->Cell(10, 5, '', 0, 0, 'C',true);
                		$pdf->SetFillColor(169, 223, 191 );
						$pdf->Cell(40, 5, 'SD: '.$sa, 1, 0, 'C',true);
						
						$pdf->Ln();
                	}else{
                		
                	}
                	$sd=$abono-$cargo;   
                	if ($sd>0){
                		$pdf->SetX(70);
                		$pdf->SetFillColor(255, 255, 255 );
                		$pdf->Cell(10, 5, '', 0, 0, 'C',true);
						$pdf->Cell(40, 5, '', 0, 0, 'C',true);
						$pdf->SetFillColor(169, 223, 191 );
						$pdf->Cell(40, 5, 'SA: '.$sd, 1, 0, 'C',true); 
						
						$pdf->Ln();
                	}else{

                	}
            //
			}
				$pdf->Ln();
			

			}	   

	$pdf->Ln();$pdf->Ln();
	$pdf->Cell(200,7,utf8_decode('AUTORIZADO POR'), 0, 1, 'C');
	$pdf->Cell(200,5,utf8_decode($GLOBALS['firma'] ), 0, 1, 'C');
	$pdf->SetX(60);
	$pdf->Cell(100,10,'','T',0,'C');
	$pdf->Ln();	
	$pdf->Output('i', 'Rayado diario.pdf');
?>