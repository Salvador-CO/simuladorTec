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
        <title>Administracion</title>
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

	<?php require "menuadmin.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Área de Administración</h1></center>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">      </li>
        	</ol> 
        	<font size="2"><p style="text-align: justify;"><b> Competencias a desarrollar: </b> Desarrollar estrategias que le permitan a la empresa obtener una ventaja competitiva. Aplicar las técnicas y herramientas de organización para lograr un desempeño eficiente en la empresa. Aplicar las técnicas de planeación para tomar decisiones asertivas disminuyendo riesgos y optimizando recursos. Diseña o rediseña la estructura organizacional en función de su crecimiento y desarrollo empresarial. Identifica, diseña y reestructura planes estratégicos, funcionales y operacionales de la empresa, utilizando los elementos de la planeación como función administrativa. </p></font>
        	<!--Contenedor general-->
        	 
            <!---->
        </div>
			<!--Contenido Fuera del div para q crees lo q quiera o en el anteriri ajja -->
        <!-- menus -->
        <div class="grand_parent">
            <div class="parents">

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-file-word"style="color:#FFFFFF; width:20; height:20;" ></i>  
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Área de uso general (Word)</font>
                    </div>
                    <div class="footer">
                        <a href="espacioredaccion.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-file-excel"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Área de uso general (Excel)</font>
                    </div>
                    <div class="footer">
                        <a  href="hojacalculo.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                       <i class="fas fa-clipboard"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Diagrama de flujo</font>
                    </div>
                    <div class="footer">
                        <a href="flujo.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                       <i class="fas fa-clipboard"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Organigrama</font>
                    </div>
                    <div class="footer">
                        <a href="organigrama.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-balance-scale-right"style="color:#FFFFFF; width:20; height:20;" ></i>
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">FODA</font>
                    </div>
                    <div class="footer">
                        <a href="foda_gen.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-file-invoice"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Matriz Boston Consulting Group (BCG)</font>
                    </div>
                    <div class="footer">
                        <a  href="bcg_gen.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-calculator"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Balanced Score Card (BSC)</font>
                    </div>
                    <div class="footer">
                        <a  href="bsc_gen.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-file-invoice-dollar"style="color:#FFFFFF; width:20; height:20;" ></i>
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Diagrama de Gantt</font>
                    </div>
                    <div class="footer">
                        <a href="gant.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-file-contract"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Árbol de decisiones</font>
                    </div>
                    <div class="footer">
                        <a  href="arbol.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-money-check-alt"style="color:#FFFFFF; width:20; height:20;" ></i> 
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Ciclo de vida del producto</font>
                    </div>
                    <div class="footer">
                        <a  href="ciclovida.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>

                <div class="child">
                    <div class="titu">
                        <i class="fas fa-file-signature"style="color:#FFFFFF; width:20; height:20;" ></i>
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Ruta crítica</font>
                    </div>
                    <div class="footer">
                        <a  href="rutacritica.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
                    </div>
                </div>
                
                <div class="child">
                    <div class="titu">
                        <i class="fas fa-fish"style="color:#FFFFFF; width:20; height:20;" ></i>  
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Espina de pescado</font>
                    </div>
                    <div class="footer">
                        <a  href="espina.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
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