<?php include("../conexion.php"); 

?>
<html>
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <title>Punto de saturacion</title>
        <style type="text/css">
        .contenido{
            margin-left: 3%;
            margin-right: 3%;
            text-align: center;
            align-items: center;
            align-content: center;

        }
    </style>
    </head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <?php require "menueconomia.php" ?>
                <!--Titulo-->
                <div class="container-fluid">
                <center><h1 class="mt-4">Punto de saturacion<button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#btnPrueba"><i class="fas fa-question"></i> </button></h1></center>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><b>Instrucciones:</b></li>
                </ol>
        <!-- modal de instruccines -->
        <div id="btnPrueba" class="modal fade" style="z-index: 1400;" data-target="#btnPrueba">
            <div class="modal-dialog modal-lg" role="dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div style="background: #1B396A; color: #fff; height: 75px;padding-left: 40px;">
                            <p><h3 class="modal-title col-11 text-center">Ayuda</h3></p>
                    </div>
                  <div class="modal-body">
                   <!--   contenido -->
                    <iframe src="#" width="100%" height="450px" style="border:0px"></iframe>
                  </div>      
                </div>
            </div>
        </div>
    </div>
    <div class="contenido">
        <iframe width="100%" height="550px" frameborder="0" scrolling="no" src="https://onedrive.live.com/embed?resid=EC0CFE9AF404B4F8%21116&authkey=%21AEvj9vZQvnRXt5I&em=2&AllowTyping=True&ActiveCell='punto_de_saturacion'!B6&wdHideGridlines=True&wdHideHeaders=True&wdDownloadButton=True&wdInConfigurator=True"></iframe>
	</div>	
    <br>

 	<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

        <script src="pluggins/Highcharts_7.0.3/code/modules/drilldown.js"></script>
	</body>
</html>