<html>
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/emergente.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <title>Contabilidad</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>

	<?php require "menuconta.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Área de Contabilidad</h1></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active">     </li>
		</ol>
		 <font size="2"><p style="text-align: justify;"><b> Competencias: </b> Identifica y comprende los elementos del costo utilizados por las empresas de transformación. Resuelve casos prácticos de los diferentes sistemas de costos productivos. Examina, analiza y formula estados financieros básicos empleados en las entidades económicas. Conoce e interpreta la razonabilidad y métodos de análisis de los estados financieros generados por las entidades económicas. Emplea las técnicas y el proceso de dirección para conducir al capital humano al logro de los objetivos. </p></font>
         
		<!--Contenido dentro del div con margen-->
        <!-- Modal -->
            <div id="miModal" class="modal">
                <div class="flex" >
                    <div class="contenido-modal">
                        <div class="modal-header ">
                            Catálogo de cuentas
                            <span class="close" id="close">&times;</span>
                        </div>
                        <div class="modal-body">
                           <iframe src="buscador/index.php" width="100%" height="450px" style="border:0px"></iframe>            
                        </div>
                    </div>
                </div>
            </div>
            <script src="css/main.js"></script>
        <!-- Modal -->
		<div class="row justify-content-center">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-book"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Libro diario</font>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background: #17202A">
                        <a class="small text-white stretched-link" href="libro_diario.php">Ver panel</a>
                        <div class="small text-white">
                        <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                        </div>
					</div>
				</div>
			</div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <i class="far fa-credit-card"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Tarjeta de almacén</font>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background: #17202A"">
                        <a class="small text-white stretched-link" href="tarjeta.php">Ver panel</a>
                        <div class="small text-white">
                        <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-clipboard"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Libro mayor</font>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background: #17202A"">
                        <a class="small text-white stretched-link" href="libro_mayor.php">Ver panel</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                        </div>
					</div>
				</div>
			</div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-balance-scale-right"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Balanza de comprobación</font>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background: #17202A"">
                        <a class="small text-white stretched-link" href="balanza_comprobacion.php">Ver panel</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                        </div>
    				</div>
				</div>
			</div>

            
	    </div>

        <div class="segundo">
                <div class="row justify-content-center">

            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-file-invoice"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="3">Estado de resultados</font><br><hr style="border: none;">
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background: #17202A"">
                        <a class="small text-white stretched-link" href="estado_resultados.php">Ver panel de opciones</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                        </div>
                    </div>
                </div>
             </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-calculator"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Estado de situación financiera</font><br><hr style="border: none;">
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background: #17202A">
                        <a class="small text-white stretched-link" href="balance_general.php">Ver panel de opciones</a>
                        <div class="small text-white">
                        <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-file-invoice-dollar"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Estado de flujos de efectivo</font>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background: #17202A"">
                        <a class="small text-white stretched-link" href="flujo_efectivo.php">Ver panel</a>
                        <div class="small text-white">
                        <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-file-contract"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Estado de variaciones en el capital contable</font>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background: #17202A"">
                        <a class="small text-white stretched-link" href="variacion_capcontable.php">Ver panel</a>
                        <div class="small text-white">
                        <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                        </div>
                    </div>
                </div>
            </div>
        
		</div>
    </div>

    <div class="segundo">
        <div class="row justify-content-center">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body" align="center">
                        <i class="fas fa-money-check-alt"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Estado de costos de producción y venta</font>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background: #17202A">
                        <a class="small text-white stretched-link" href="costos_prodvent.php">Ver panel</a>
                        <div class="small text-white">
                        <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body" align="center">
                        <i class="fas fa-file-signature"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Análisis Financiero</font> <br><hr style="border: none;">
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background: #17202A">
                        <a class="small text-white stretched-link" href="analisis_financiero.php">Ver panel</a>
                        <div class="small text-white">
                        <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body" align="center">
                        <i class="fas fa-file-alt"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Técnicas de evaluación de proyectos</font> 
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between" style="background: #17202A">
                        <a class="small text-white stretched-link" href="tecnicas_proyectos.php">Ver panel</a>
                        <div class="small text-white">
                        <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
	</body>
</html>