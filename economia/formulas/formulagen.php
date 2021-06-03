
<html >
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<style>
	 #status,#titulo  { padding:10px; background:#88C4FF; color:#000; font-weight:bold; font-size:12px; margin-bottom:10px; display:none; width:100%; }
#titulo { padding:10px; background:#88C4FF; color:#000; font-weight:bold; font-size:12px; margin-bottom:10px; display:none; width:90%; }
.formulario{
	margin-right: 3%;
	margin-left: 3%;
}
</style>
</head>
<body>
	
	<div class="alert alert-info alert-dismissible fade show" style="font-size: 14px;" role="alert">
            <ul class="list-unstyled" style="margin-bottom: 0;">
              <li><strong>Nota:</strong> Ingresa los valores de la ecuación <i><strong>a</strong> x<sup>2</sup> + <strong>b</strong>  x + <strong>c</strong> = 0 </i>.</li>
            </ul>
            <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>-->
    </div>


	<div class="formulario">
			
			<form action="procesa.php" method="POST">
				<div class="form-row"> 
		        <div class="form-group col-4">
		                <label for="a">Valor de a: </label>
		               <input type="text" name="a" id="a" class="form-control" required placeholder=" ">
		        </div> 
		        <div class="form-group col-4">
		                <label for="b">Valor de b: </label>
		              <input type="text" name="b" id="b" class="form-control" required placeholder=" ">
		        </div> 
		        <div class="form-group col-4">
		                <label for="c">Valor de c: </label>
		                <input type="text" name="c" id="c" class="form-control" required placeholder=" ">
		        </div> 

		        <div class="form-group col-md-12"><center>
		            <input type="submit" class="btn btn-primary" value="Calcular" name="B1"> &nbsp; <input type="reset" value="Limpiar" class="btn btn-primary" name="B2">
		        </div>
			</div>
			</form>


	</div>
		

</body>
</html>