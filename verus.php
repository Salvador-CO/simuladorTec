<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="icon" type="image/png" sizes="192x192"  href="iconos/tecnm.png">
	<style type="text/css">
		.embed-container {
		    position: relative;
		    padding-bottom: 56.25%;
		    height: 0;
		    overflow: hidden;
		}
		.embed-container iframe {
		    position: absolute;
		    top:0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		}
		.parents{ width: 98vw; height: auto; margin: auto;
			display: flex;  justify-content: space-around;
			flex-wrap: wrap; transition: all 0.2 linear;
			margin: 0; padding:0; box-sizing: border-box;
			
			align-items: center;
			align-content: center;

		}
		.child{
			align-items: center;
			align-content: center;
			height: auto;
			background: #808080;
			box-shadow: 0 0 20px #bac3c3;
			flex:1 1 450px;
			/*      top right bottom left  */
			margin: 1px 10px 20px 10px;
		}
		
		
		@media (max-width: 800px){
			.grand_parent{height:auto; }
		}

	</style>
</head>
<body>
		
		<div class="grand_parent">
			<div class="parents">
				<?php 
          			$archivos = scandir("subidas");
			          $num=0;
			        for ($i=2; $i<count($archivos); $i++){
			          	$num++;
			 		?>  
			 	<div class="child">
                    <div class="embed-container">
		    		<iframe src="subidas/<?php echo $archivos[$i]; ?>" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
				<?php 
				}	
				?>
			</div>
			<?php 
                if ($num===0) {
                    ?> 
                    <center><h1>No hay archivos que mostrar</h4></h1></center>
                    <?php  
                   }   
                ?>
		</div>
		
</body>
</html>