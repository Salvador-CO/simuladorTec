<html>
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <title>Economía</title>
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

	<?php require "menueconomia.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Área de Economía</h1></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active">      </li>
		</ol>

		<font size="2"><p style="text-align: justify;"><b> Competencias: </b> Determinar y aplicar la oferta y la demanda y su elasticidad a través de las diferentes funciones matemáticas. Aplica el modelo de oferta y demanda agregada para determinar los efectos de la política económica en el equilibrio macroeconómico. Comprende, analiza, y calcula los componentes básicos de las Cuentas Nacionales.  </p></font>
        
		<!--Contenido dentro del div con margen-->
       </div>
    <div class="grand_parent">
            <div class="parents">

             
               
                
                


                <div class="child">
                    <div class="titu">
                        <i class="fas fa-chart-line"style="color:#FFFFFF; width:20; height:20;" ></i>
                        <font face="Bookman Old Style, Book Antiqua, Garamond" size="4vw">Punto de equilibrio</font>
                    </div>
                    <div class="footer">
                        <a href="punt_equilibrio.php">Ver panel &nbsp;<i class="fas fa-angle-right" ></i></a>
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