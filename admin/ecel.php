<!-- *Copyright © Todos los derechos reservados DASHA 
Para cualquier duda y/o aclaración comunicarse a los correos: 
 - daniela.rojano.r@gmail.com  - antsanchezz12@gmail.com - salvador.camposorihuela@gmail.com-->







<?php   
  session_start();
  if (isset($_SESSION['correo'])) {
  } else {
      header("Location: ../index.php");
    }
    require_once "../php/conexion.php";
    $conexion=conexion();
    $correo=$_SESSION['correo'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Economia</title>
    <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/economia.css">
    <script src="../librerias/jquery-3.2.1.min.js"></script>
    <script src="../librerias/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/acordeon.css">
    <link rel="stylesheet" type="text/css" href="css/operaciones.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    </head>

  <body>
    <?php include ("menu.php");?>
    
    <div class="super">
        <div class="iz">
          Operaciones
          <a href="https://docs.google.com/spreadsheets/u/0/" target="_blank"><button >
            Exel
          </button></a>
        </div>
        <div class="der">
          <?php include ("calculadora/modal.php");?>
        </div>

    </div>
    <div class="cuerpo">
        <center><font size="5" face="Arial">Demanda anual de un producto</font><br>
          <font size="5" face="Brush Script MT">Metodo de regresion lienal simple</font>
          </center>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, iure fugiat sapiente praesentium assumenda architecto accusamus ea, dicta obcaecati totam, voluptatem vel incidunt harum ab, dolor. Quaerat rerum molestiae, tempore?</p>
      
      <iframe width="100%" height="600" frameborder="0" scrolling="no" src="https://www.offidocs.com/loleaflet/dist/loleaflet.html?service=owncloudservice05&file_path=file:///var/www/html/weboffice/mydata/8876868883/NewDocuments/8171858576.xlsx&username=8876868883&ext=yes"></iframe>
    </div>
<script src="js/acordeon.js"></script>
  </body>
</html>





