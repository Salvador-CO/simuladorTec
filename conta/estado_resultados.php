<?php include("../conexion.php");?>
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
        <title>Estado de Resultados</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>

	<?php require "menuconta.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h4 class="mt-4">Formatos de</h4><h2> "Estado de Resultados"</h2></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active">      </li>
		</ol> 
		<font size="2"><p style="text-align: justify;"></p></font>
		<!--Contenedor general-->
		 <div class="row justify-content-center" >
            <div class="col-3">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-bookmark"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Condensado</font>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background:#17202A">
                    <?php
                     $sumMD = "SELECT count(*) FROM `resulanal` where nom_us='$nombre'";
                        $resMD = mysqli_query($conexion, $sumMD);
                            $datoMD = $resMD->fetch_assoc();
                          if($datoMD['count(*)']==0){
                            ?>
                            <a class="small text-white stretched-link" href="estadoresult_condensado.php">Ver panel</a>
                            <?php
                          }else{
                            ?>
                            <a class="small text-white stretched-link" onclick = "alerta();">Ver panel</a>
                            <?php
                            }
                    ?>
                        <div class="small text-white">
                            <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->
            <div class="col-3">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-bookmark" style="color:#FFFFFF; width:20; height:20;"></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Analítico</font>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background:#17202A ">
                    <?php
                     $sumMD = "SELECT count(*) FROM `rescon` where nom_us='$nombre'";
                        $resMD = mysqli_query($conexion, $sumMD);
                            $datoMD = $resMD->fetch_assoc();
                          if($datoMD['count(*)']==0){
                            ?>
                           <a class="small text-white stretched-link" href="estadoresult_analitico.php">Ver panel</a>
                            <?php
                          }else{
                            ?>
                            <a class="small text-white stretched-link" onclick = "alerta();" >Ver panel</a>
                            <?php
                            }
                    ?>
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
        <script type="text/javascript">
            function alerta() {
              alert("Ya cuentas con un estado de resultado, solo es posible aplicar un formato");
            }

        </script>
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