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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<script src="librerias/ckeditor/ckeditor.js"></script>
	</head>

	<?php require "menuadmin.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Matriz FODA</h1></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active"><b>Instrucciones: </b>Elaborar la matriz FODA tomando en cuenta las fortalezas, debilidades, oportunidades y amenazas de la organización en estudio a partir del Análisis y diseña las estrategias para lograr su competitividad en el mercado. Así mismo, al terminar de realizar tu ejercicio deberás descargarlo en formato PDF para posteriormente poder subirlo en el apartado “Carga de archivos”. </li>
		</ol>
		<!--Contenido dentro del div con margen-->
			


  	<h6 align="center"></h6>
  
 <div>

    <textarea name="editor" id="editor">

<p style="text-align:center"><span style="font-size:20px"><strong>Matriz FODA</strong></span></p>

<p>&nbsp;</p>
<table border="1" cellpadding="1" cellspacing="1" style="width:688px" align="center">
    <tbody>
        <tr>
            <td style="background-color:#ebdef0; text-align:center; width:180px"><span style="font-size:22px">Matriz FODA</span></td>
            <td style="background-color:#ebdef0; width:245px">
            <p style="text-align:center"><strong>Fortalezas (F)</strong></p>

            <ul>
                <li><strong>F1</strong></li>
                <li><strong>F2</strong></li>
                <li><strong>F3</strong></li>
                <li><strong>F4</strong></li>
            </ul>
            </td>
            <td style="background-color:#ebdef0; width:245px">
            <p style="text-align:center"><strong>Debilidades (D)</strong></p>

            <p style="text-align:center">&nbsp;</p>

            <ul>
                <li><strong>D1</strong></li>
                <li><strong>D2</strong></li>
                <li><strong>D3</strong></li>
                <li><strong>D4</strong></li>
            </ul>
            </td>
        </tr>
        <tr>
            <td style="background-color:#ebdef0; width:180px">
            <p style="text-align:center"><strong>Oportunidades (O)</strong></p>

            <ul>
                <li><strong>O1</strong></li>
                <li><strong>O2</strong></li>
                <li><strong>O3</strong></li>
                <li><strong>O4</strong></li>
            </ul>
            </td>
            <td style="text-align:center; width:245px">
            <p><strong>Estrategias FO:</strong></p>

            <p>&nbsp;</p>

            <ul>
                <li style="text-align:left">&nbsp;</li>
                <li style="text-align:left">&nbsp;</li>
                <li style="text-align:left">&nbsp;</li>
                <li style="text-align:left">&nbsp;</li>
            </ul>
            </td>
            <td style="width:245px">
            <p style="text-align:center"><strong>Estrategias DO:</strong></p>

            <ul>
                <li style="text-align:left">&nbsp;</li>
                <li style="text-align:left">&nbsp;</li>
                <li style="text-align:left">&nbsp;</li>
                <li style="text-align:left">&nbsp;</li>
            </ul>
            </td>
        </tr>
        <tr>
            <td style="background-color:#ebdef0; text-align:center; width:180px">
            <p><strong>Amenazas (A)</strong></p>

            <p>&nbsp;</p>

            <ul>
                <li style="text-align:left"><strong>A1</strong></li>
                <li style="text-align:left"><strong>A2</strong></li>
                <li style="text-align:left"><strong>A3</strong></li>
                <li style="text-align:left"><strong>A4</strong></li>
            </ul>
            </td>
            <td style="width:245px">
            <p style="text-align:center"><strong>Estrategias FA:</strong></p>

            <ul>
                <li style="text-align:left">&nbsp;</li>
                <li style="text-align:left">&nbsp;</li>
                <li style="text-align:left">&nbsp;</li>
                <li style="text-align:left">&nbsp;</li>
            </ul>
            </td>
            <td style="width:245px">
            <p style="text-align:center"><strong>Estrategias DA:</strong></p>

            <ul>
                <li style="text-align:left">&nbsp;</li>
                <li style="text-align:left">&nbsp;</li>
                <li style="text-align:left">&nbsp;</li>
                <li style="text-align:left">&nbsp;</li>
            </ul>
            </td>
        </tr>
    </tbody>
</table>

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