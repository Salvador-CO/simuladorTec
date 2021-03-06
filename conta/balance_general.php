<html>
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="css/emergente.css">
        <title>Estado de Situación Financiera</title>
        <link rel="icon" type="image/png" sizes="192x192"  href="../iconos/tecnm.png">
        
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>
    <style type="text/css">
        .btn-circle {
          width: 30px;
          height: 30px;
          padding: 6px 0px;
          border-radius: 15px;
          text-align: center;
          font-size: 12px;
          line-height: 1.42857;
        }
    </style>

	<?php require "menuconta.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h4 class="mt-4">Formatos de</h4><h2> "Estado de Situación Financiera"  <button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#btnPrueba"><i class="fas fa-question"></i> </button></h2></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active">      </li>
		</ol> 

         <!-- modal de instruccines -->
        <div id="btnPrueba" class="modal fade" style="z-index: 1400;" data-target="#btnPrueba" title="¡Da clic para obtener mas información!">
            <div class="modal-dialog modal-lg" role="dialog" >
                <!-- Modal content-->
                <div class="modal-content">
                    <div style="background: #1B396A; color: #fff; height: 75px;padding-left: 40px;">
                            <p><h3 class="modal-title col-11 text-center">Ayuda</h3></p>
                    </div>
                  <div class="modal-body">
                   <!--   contenido -->
                    <embed src="../manual/estado_si.pdf#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />
                  </div>      
                </div>
            </div>
        </div>

		<font size="2"><p style="text-align: justify;"></p></font>
		<!--Contenedor general-->
		 <div class="row justify-content-center" >
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-bookmark" style="color:#FFFFFF; width:15; height:15;"></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="3">Forma de reporte</font>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background:#17202A">
                        <a class="small text-white stretched-link" href="balance_formreporte.php">Ver panel</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-bookmark"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Forma de cuenta</font>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background:#17202A">
                        <a class="small text-white stretched-link" href="balance_formcuenta.php">Ver panel</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                        </div>
                    </div>
                </div>
            </div>
            </div>
           
            </div>
        </div> <br>

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