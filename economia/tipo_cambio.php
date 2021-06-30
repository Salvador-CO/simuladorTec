<html>
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <title>Tipo de cambio</title>
        <link rel="icon" type="image/png" sizes="192x192"  href="../iconos/tecnm.png">
        
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<style type="text/css">
			.padre{
			    text-align:center;
			    margin-top: 30px;
			    margin-left: 2%;
			    margin-right: 2%;
			 
			}
			.left{
			    float: left;
			   
			    width: 33%;
			}
			.right{
			    float: right;
			   
			    width: 33%;
			}
			.center{
			   
			   display:inline-block;
			   width: 33%;
			}

		</style>
	</head>

	<?php require "menueconomia.php" ?>
		<!--Titulo-->
		<div class="container-fluid" align="center">
	    	<center><h1 class="mt-4">Tipo de cambio</h1></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active"></li>
		</ol>
		<!--Contenido dentro del div con margen-->
			<script type="text/javascript"   src="https://es.exchange-rates.org/GetCustomContent.aspx?sid=CC000QI6V&amp;type=CurrencyConverter&amp;stk=-02RDFU91RV" charset="utf-8">
			</script>
			<div>Fuente de consulta: <a href="https://es.exchange-rates.org/" target="_blank" rel="nofollow">exchange</a></div><noscript><iframe ID="frmExchRatesCC000QI6V" style="margin:0px;border:none;padding:0px;" frameborder="0" width="641" height="61" src="https://es.exchange-rates.org/GetCustomContent.aspx?sid=CC000QI6V&amp;type=CurrencyConverter&amp;submit=submit&amp;stk=-0POWT3Q1RW"></iframe></noscript>

		</div>


			<!--Contenido Fuera del div para q crees lo q quiera o en el anteriri ajja -->
			  
			<div class="padre">
			    <div class="left">
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#MXN">Tasas de cambio para MXN </button>
			    </div>
			    
			    <div class="right">
			        
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#EUR">Tasas de cambio para EUR </button>
			    </div>
			    <div class="center">
			       
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#USD">Tasas de cambio para USD</button> 
			    </div>
			</div>

	<!---->
	   	</main>
		</div>
		</div>
	<!-- modal -->
		<div id="MXN" class="modal fade" role="dialog" style="z-index: 1400;">
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
                <div style="background: #1B396A; color: #fff; height: 75px;padding-left: 40px;">
                    <p><h3 class="modal-title col-11 text-center">Peso Mexicano <strong>MXN</strong></h3></p>
                </div> 
		      <div class="modal-body" align="center">
		      	<script type="text/javascript"   src="https://es.exchange-rates.org/GetCustomContent.aspx?sid=RT000QI6I&amp;type=RatesTable&amp;stk=-07UG5VJ1Q6" charset="utf-8">
					</script>
					<div>Fuente de consulta: <a href="https://es.exchange-rates.org/" rel="nofollow">.</a></div>
		      </div>      
		    </div>
		  </div>
		</div>

		<div id="EUR" class="modal fade" role="dialog" style="z-index: 1400;">
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		       <div style="background: #1B396A; color: #fff; height: 75px;padding-left: 40px;">
                    <p><h3 class="modal-title col-11 text-center">Euro <strong>EUR</strong></h3></p>
                </div> 
		      <div class="modal-body" align="center">
		     	<script type="text/javascript"   src="https://es.exchange-rates.org/GetCustomContent.aspx?sid=RT000QI6L&amp;type=RatesTable&amp;stk=0F8FYH31QF" charset="utf-8">
					</script>
					<div>Fuente de consulta: <a href="https://es.exchange-rates.org/" rel="nofollow">.</a></div>
		      </div>      
		    </div>
		  </div>
		</div>

		<div id="USD" class="modal fade" role="dialog" style="z-index: 1400;">
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		       <div style="background: #1B396A; color: #fff; height: 75px;padding-left: 40px;">
                    <p><h3 class="modal-title col-11 text-center">Dólar Estadounidense <strong>USD</strong></h3></p>
                </div> 
		      <div class="modal-body" align="center">
					<script type="text/javascript"   src="https://es.exchange-rates.org/GetCustomContent.aspx?sid=RT000QI6K&amp;type=RatesTable&amp;stk=-0QFP3GN1Q9" charset="utf-8">
					</script>
					<div>Fuente de consulta: <a href="https://es.exchange-rates.org/" rel="nofollow">.</a></div>
		      </div>      
		    </div>
		  </div>
		</div>


 	<!-- modal --> 
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