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
        <title>Balanced Score Card</title>
        <link rel="icon" type="image/png" sizes="192x192"  href="../iconos/tecnm.png">
        
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<script src="librerias/ckeditor/ckeditor.js"></script>
	</head>

	<?php require "menuadmin.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Balanced Score Card</h1></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active"><b>Descripción: </b>Elaborar el Balance Score Card con base a los datos que se encuentran en el Reactivo Integrador Multidisciplina. (RIM), en la siguiente plantilla. Así mismo, al terminar de realizar tu ejercicio deberás descargarlo en formato PDF para posteriormente poder subirlo en el apartado “Carga de archivos”.</li>
		</ol>
		<!--Contenido dentro del div con margen-->
			<h6 align="center"></h6>
  
 
    <textarea name="editor" id="editor">
      
<h1 style="text-align:center"><span style="font-size:20px"><span style="font-family:Arial,Helvetica,sans-serif" ><strong>Tabla de Balanced Score Card (BSC)</strong></span></span></h1>

<table border="1" cellpadding="1" cellspacing="1" style="width:619px" align="center">
    <tbody>
        <tr>
            <td colspan="3" style="text-align:center; width:609px"><strong>Finazas</strong></td>
        </tr>
        <tr>
            <td style="text-align:center; width:188px"><em>Factor</em></td>
            <td style="text-align:center; width:199px"><em>Indicador</em></td>
            <td style="text-align:center; width:214px"><em>Acciones</em></td>
        </tr>
        <tr>
            <td style="width:188px">
            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>
            </td>
            <td style="width:199px">&nbsp;</td>
            <td style="width:214px">&nbsp;</td>
        </tr>
    </tbody>
</table>
<p>
<table border="1" cellpadding="1" cellspacing="1" style="width:619px" align="center">
    <tbody>
        <tr>
            <td colspan="3" style="text-align:center; width:609px"><strong>Procesos internos</strong></td>
        </tr>
        <tr>
            <td style="text-align:center; width:188px"><em>Factor</em></td>
            <td style="text-align:center; width:199px"><em>Indicador</em></td>
            <td style="text-align:center; width:214px"><em>Acciones</em></td>
        </tr>
        <tr>
            <td style="width:188px">
            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>
            </td>
            <td style="width:199px">&nbsp;</td>
            <td style="width:214px">&nbsp;</td>
        </tr>
    </tbody>
</table>
<p>
<table border="1" cellpadding="1" cellspacing="1" style="width:619px" align="center">
    <tbody>
        <tr>
            <td colspan="3" style="text-align:center; width:609px"><strong>Cliente</strong></td>
        </tr>
        <tr>
            <td style="text-align:center; width:188px"><em>Factor</em></td>
            <td style="text-align:center; width:199px"><em>Indicador</em></td>
            <td style="text-align:center; width:214px"><em>Acciones</em></td>
        </tr>
        <tr>
            <td style="width:188px">
            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>
            </td>
            <td style="width:199px">&nbsp;</td>
            <td style="width:214px">&nbsp;</td>
        </tr>
    </tbody>
</table>
<p>
<table border="1" cellpadding="1" cellspacing="1" style="width:619px" align="center">
    <tbody>
        <tr>
            <td colspan="3" style="text-align:center; width:609px"><strong>Apredizaje/Crecimiento</strong></td>
        </tr>
        <tr>
            <td style="text-align:center; width:188px"><em>Factor</em></td>
            <td style="text-align:center; width:199px"><em>Indicador</em></td>
            <td style="text-align:center; width:214px"><em>Acciones</em></td>
        </tr>
        <tr>
            <td style="width:188px">
            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>
            </td>
            <td style="width:199px">&nbsp;</td>
            <td style="width:214px">&nbsp;</td>
        </tr>
    </tbody>
</table>

<p>&nbsp;</p>

<p>&nbsp;</p>

    </textarea>

    <script>
      CKEDITOR.replace("editor");

    </script>
    <br>

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