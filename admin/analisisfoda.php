<!-- *Copyright © Todos los derechos reservados DASHA 
Para cualquier duda y/o aclaración comunicarse a los correos: 
 - daniela.rojano.r@gmail.com  - antsanchezz12@gmail.com - salvador.camposorihuela@gmail.com-->




<html>
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <title>FODA</title>
        <link rel="icon" type="image/png" sizes="192x192"  href="../iconos/tecnm.png">
        
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<script src="librerias/ckeditor/ckeditor.js"></script>
	</head>

	<?php require "menuadmin.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Análisis FODA</h1></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active"><b>Instrucciones: </b>Elaborar la herramienta de análisis FODA para identificar las fortalezas, debilidades, oportunidades y amenazas de la organización en estudio, con base a la información proporcionada en el Reactivo Integrador Multidisciplina (RIM). Así mismo, al terminar de realizar tu ejercicio deberás descargarlo en formato PDF para posteriormente poder subirlo en el apartado “Carga de archivos”. </li>
		</ol>
		<!--Contenido dentro del div con margen-->
			


  	<h6 align="center"></h6>
  
 <div>

    <textarea name="editor" id="editor">
      <h1 style="text-align:center"><strong><span style="font-family:Arial,Helvetica,sans-serif">FODA</span></strong></h1>

<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:736px">
    <tbody>
        <tr>
            <td colspan="1" rowspan="2" style="background-color:#e4dbda; width:43px">
            <p style="text-align:center">&nbsp;</p>

            <p style="text-align:center">I</p>

            <p style="text-align:center">N</p>

            <p style="text-align:center">T</p>

            <p style="text-align:center">E</p>

            <p style="text-align:center">R</p>

            <p style="text-align:center">N</p>

            <p style="text-align:center">O</p>

            <p style="text-align:center">&nbsp;</p>
            </td>
            <td style="background-color:#a2d9ce; width:321px">
            <p style="text-align:center"><strong>Fortalezas</strong></p>
            </td>
            <td style="background-color:#ff5733; width:353px">
            <p style="text-align:center"><strong>Debilidades</strong></p>
            </td>
        </tr>
        <tr>
            <td style="background-color:white; width:321px">
            <ul>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
            </ul>
            </td>
            <td style="background-color:white; width:353px">
            <ul>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
            </ul>
            </td>
        </tr>
        <tr>
            <td colspan="1" rowspan="2" style="background-color:#e4dbda; width:43px">
            <p style="text-align:center">&nbsp;</p>

            <p style="text-align:center">E</p>

            <p style="text-align:center">X</p>

            <p style="text-align:center">T</p>

            <p style="text-align:center">E</p>

            <p style="text-align:center">R</p>

            <p style="text-align:center">N&nbsp;</p>

            <p style="text-align:center">O</p>

            <p style="text-align:center">&nbsp;</p>
            </td>
            <td style="background-color:#ffc300; width:321px">
            <p style="text-align:center"><strong>Oportunidades</strong></p>
            </td>
            <td style="background-color:#52be80; width:353px">
            <p style="text-align:center"><strong>Amenazas</strong></p>
            </td>
        </tr>
        <tr>
            <td style="width:321px">
            <ul>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
            </ul>
            </td>
            <td style="width:353px">
            <ul>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
            </ul>
            </td>
        </tr>
    </tbody>
</table>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

    </textarea>
</div>

<br>

    <script>
      CKEDITOR.replace("editor");

    </script>
	
	
	<!---->
	   	</main>
		</div>
		</div>
 		<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
	</body>
</html>