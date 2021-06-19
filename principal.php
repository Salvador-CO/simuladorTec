<html >
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Simulador CEA </title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <style type="text/css">
            .centro{
                align-items: center;
                align-content: center;
                text-align: center;

            }
        </style>
	</head>
    <?php require "menu.php" ?>
    <div class="container-fluid" >
            <div class="centro">
                <h1> Simulador CEA de <b>TecNM</b></h1>
            
                <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active" style="margin-left: 32%;">
                    XXVII Evento Nacional Estudiantil de Ciencias (ENEC)</li>
                </ol>
            </div>

    <?php if($tipo_usuario == 2) { ?>       

        <!-- usuario -->        
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card text-white mb-4" style="background: #651d32">
                        <div class="card-body">
                            <i class="fas fa-university"style="color:#FFFFFF; width:20; height:20;" ></i> 
                            <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Contabilidad</font>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="conta/conta_gen.php">Ver panel de opciones</a>
                            <div class="small text-white">
                            <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                            </div>
    					</div>
    				</div>
    			</div>
                 
                <div class="col-xl-3 col-md-6"> 
                    <div class="card text-white mb-4" style="background: #651d32">
                        <div class="card-body">
                            <i class="fa fa-building"style="color:#FFFFFF; width:20; height:20;" ></i> 
                            <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Administración</font>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="admin/admin_gen.php">Ver panel de opciones</a>
                            <div class="small text-white">
                                <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                            </div>
    					</div>
    				</div>
    			</div>

                <div class="col-xl-3 col-md-6">
                    <div class="card text-white mb-4" style="background: #651d32">
                        <div class="card-body">
                            <i class="fas fa-chart-line"style="color:#FFFFFF; width:20; height:20;" ></i> 
                            <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Económia</font>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="economia/econ_gen.php">Ver panel de opciones</a>
                            <div class="small text-white">
                                <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                            </div>
        				</div>
    				</div>
    			</div>

                <div class="col-xl-3 col-md-6">
                    <div class="card text-white mb-4" style="background: #651d32">
                        <div class="card-body">
                            <i class="fas fa-tools"style="color:#FFFFFF; width:20; height:20;" ></i> 
                            <font face="Bookman Old Style, Book Antiqua, Garamond" size="4">Manual de usuario</font>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Ver manual</a>
                            <div class="small text-white">
                                <i class="fas fa-angle-right" style="color:#fff; width:20; height:20;"></i>
                            </div>
    					</div>
    				</div>
    			 </div>
    	    </div><!--fin de ROW-->

            <!--Espacio vacio lineas-->
            <br>
            <div class="row">
               <div class="col-xl-6">
                    <div class="card mb-4">
                        <embed src="anexos/anexo1.pdf" type="application/pdf" width="100%" height="600px" />
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card mb-4">
                        <embed src="anexos/anexo2.pdf" type="application/pdf" width="100%" height="600px" />
            		</div>
            	</div>
            </div>
             <!--Espacio para anexos-->
            <div class="card mb-4">
                <div>
                    <!--<embed src="anexos/anexo1.pdf" type="application/pdf" width="100%" height="600px" />
                    <embed src="anexos/anexo1.pdf#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />-->
                </div>
    		</div>
        <!-- fin de usuario -->  

    <?php }elseif ($tipo_usuario == 1){
    ?> 
        <h1>admin</h1>
    <!--PARTE DE ADMINISTRADOR  -->
        
    <!--PARTE DE ADMINISTRADOR  -->
    <?php    
    } ?>

			<!--etiquetas de cierre-->		
    </div>
	</main>

    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Todos los derechos reservados <b> DASHA | ITT2</b></div>
                <div>
        
				</div>
			</div>
		</div>
	</footer>
	</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>
</html>
