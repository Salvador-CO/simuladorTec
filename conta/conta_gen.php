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
        <link rel="icon" type="image/png" sizes="192x192"  href="../iconos/tecnm.png">
        
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        
        <style type="text/css">     
            .parents{ width: 100%; height: auto; margin: auto;
                display: flex;  justify-content: space-around;
                flex-wrap: wrap; transition: all 0.2 linear;
                margin: 0; padding:0; box-sizing: border-box;
                align-items: center;
                align-content: center;
            }
            .child{
                border-radius: 8px;
                align-items: center;
                align-content: center;
                height: 120px;
                background: #6c757d;
                box-shadow: 0 0 20px #bac3c3;
                flex:1 1 250px;
                /*      top right bottom left  */
                margin: 10px 10px 25px 10px;
                
            }
            
            
            @media (max-width: 800px){
                .grand_parent{height:auto; }
            }

            .titu{
                padding: 4% 0;
                align-content: center;
                align-items: center;
                text-align: center;
                margin: 3%;
                height: 60;
                min-height: 58px;
                max-height: 65px;
                color: #fff;
             

            }
            .footer{
                padding: 5% 0;
                border-radius: 0px 0px 8px 8px;
                background: #17202A;
                bottom: 0;
                width: 100%;
                min-height: 58px;
                max-height: 55px;
                color: white;
                font-size: 100%;
                text-align: center;
              
            }

           .footer a {
              outline: none;
              text-decoration: none;
              padding: 2px 1px 0;
            }

            .footer a:link {
              color: #fff;
            }

            .footer a:visited {
              color: #fff;
            }

            .footer a:focus {
              background: #000;
            }

            .footer a:hover {
               border-bottom: double; border-color: white;
            }

           .footer  a:active {
              background: #000;
              color: #000;
            }
        </style>
	</head>

	<?php require "menuconta.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">??rea de Contabilidad</h1></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active">  </li>
		</ol>
		 <font size="2"><p style="text-align: justify;"><b> Competencias: </b> Identifica y comprende los elementos del costo utilizados por las empresas de transformaci??n. Resuelve casos pr??cticos de los diferentes sistemas de costos productivos. Examina, analiza y formula estados financieros b??sicos empleados en las entidades econ??micas. Conoce e interpreta la razonabilidad y m??todos de an??lisis de los estados financieros generados por las entidades econ??micas. Emplea las t??cnicas y el proceso de direcci??n para conducir al capital humano al logro de los objetivos. </p></font>
         
		<!--Contenido dentro del div con margen-->
        <!-- Modal -->
            <div id="miModal" class="modal">
                <div class="flex" >
                    <div class="contenido-modal">
                        <div class="modal-header ">
                            Cat??logo de cuentas
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
        </div>
        <div class="grand_parent">
            <div class="parents">

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-book"style="color:#FFFFFF; width:20; height:20;" ></i>  
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Libro Diario</font>
                    </div>
                    <div class="footer">
                        <a href="libro_diario.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="far fa-credit-card"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Tarjetas de almac??n</font>
                    </div>
                    <div class="footer">
                        <a  href="tarjeta.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                       <i class="fas fa-clipboard"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Libro mayor</font>
                    </div>
                    <div class="footer">
                        <a href="libro_mayor.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-balance-scale-right"style="color:#FFFFFF; width:20; height:20;" ></i>
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Balanza de Comprobaci??n</font>
                    </div>
                    <div class="footer">
                        <a href="balanza_comprobacion.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-file-invoice"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Estado de resultados</font>
                    </div>
                    <div class="footer">
                        <a  href="estado_resultados.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-calculator"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Estado de Situaci??n Financiera</font>
                    </div>
                    <div class="footer">
                        <a  href="balance_general.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-file-invoice-dollar"style="color:#FFFFFF; width:20; height:20;" ></i>
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Estado de Flujos de Efectivo</font>
                    </div>
                    <div class="footer">
                        <a href="flujo_efectivo.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-file-contract"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Estado de Variaciones en el Capital Contable</font>
                    </div>
                    <div class="footer">
                        <a  href="variacion_capcontable.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-money-check-alt"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Estado de Costos de Producci??n y Ventas</font>
                    </div>
                    <div class="footer">
                        <a  href="costos_prodvent.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-file-signature"style="color:#FFFFFF; width:20; height:20;" ></i>
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Analisis Financiero</font>
                    </div>
                    <div class="footer">
                        <a  href="analisis_financiero.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>
                
                <div class="child">
                    <div class="titu">
                        <i class="fas fa-file-alt"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">T??cnicas de evaluaci??n de proyectos</font>
                    </div>
                    <div class="footer">
                        <a  href="tecnicas_proyectos.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
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