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
        <title>Espina de pescado</title>
        <link rel="icon" type="image/png" sizes="192x192"  href="../iconos/tecnm.png">
        
        <link rel="stylesheet" type="text/css" href="paint/plantillas/index_style.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <style type="text/css">
            .cont {
                border: 1px solid;
                height: 500px;
            }
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
	</head>
	</head>

	<?php require "menuadmin.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 >Espina de Pescado <button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#btnPrueba" title="¡Da clic para obtener mas información!"><i class="fas fa-question"></i> </button></h1></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item " style="text-align: justify;">
                <b> Instrucciones:</b> Identificar la(s) causa(s) potenciales (o reales) del problema que se visualiza en el Reactivo Integrador Multidisciplina (RIM) para determinar su análisis y tomar decisiones para su solución.. Así mismo, al terminar de realizar tu ejercicio deberás descargarlo en formato PDF para posteriormente poder subirlo en el apartado “Carga de archivos”.</li> 
		</ol>
        <!-- modal de las Instrucciones -->
        <div id="btnPrueba" class="modal fade" style="z-index: 1400;" data-target="#btnPrueba">
            <div class="modal-dialog modal-lg" role="dialog" >
            <!-- Modal content-->
            <div class="modal-content">
                <div style="background: #1B396A; color: #fff; height: 75px;padding-left: 40px;">
                        <p><h3 class="modal-title col-11 text-center">Ayuda</h3></p>
                </div>
              <div class="modal-body">
                <embed src="../manual/Espina.pdf#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />
              </div>      
            </div>
          </div>
        </div>
         <!--  -->
         <button class="accordion2">Plantillas </button>
        <div class="acor">
                <div class="izq">
                    <img src="paint/plantillas/images/4.jpg">
                </div>
                
                <div class="der">
                    <img src="paint/plantillas/images/8.jpg">
                </div>

                <div class="centro">
                    <img src="paint/plantillas/images/6.jpg">
                </div>
                
        </div>
		<!--Contenido dentro del div con margen-->
			<h6 align="center"></h6>
        <div class="cont">
            <iframe  id="paint" title="Inline Frame Example"
                width= 100%   height= 100% src="paint/index.html">
            </iframe>
        </div>
    
       
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
        <script>
            var acc = document.getElementsByClassName("accordion2");
            var i;

            for (i = 0; i < acc.length; i++) {
              acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                  panel.style.display = "none";
                } else {
                  panel.style.display = "block";
                }
              });
            }
        </script>
	</body>
</html>