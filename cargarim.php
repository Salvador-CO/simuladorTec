<html>
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <title>Archivos</title>
        <link rel="icon" type="image/png" sizes="192x192"  href="iconos/tecnm.png">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

	</head>

	<?php require "menu.php" ?>
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Carga de Archivo para RIM</h1></center>
    	    <ol class="breadcrumb mb-4">
    	        <li class="breadcrumb-item active" style="text-align: justify;"><b>Instrucciones: </b> En este apartado podrás subir los archivos correspondientes a cada actividad del Reactivo Integrador Multidisciplina (RIM), recuerda que deben estar en formato PDF. </li>
    		</ol>
      <div class="content"> </div>
      <!-- Formulario -->
        <div class="panel-body" align="center">
          <div class="col-lg-6">
            <form method="POST" action="CargarFicheros.php" enctype="multipart/form-data">
            <div class="form-group">
                <label class="btn " style="background: #1B396A; color: #fff;" for="my-file-selector">
                  <input required type="file" name="file" id="exampleInputFile" >
                </label>
            </div>
            <button class="btn " style="background: #1B396A; color: #fff;"  type="submit">Cargar Archivo</button>
            </form>
          </div>
          <div class="col-lg-6"> </div>
        </div>
      <hr style="margin-top:5px;margin-bottom: 5px;">
      <!--tabla-->
        <table class="table table-striped" >
              <thead style="background: #002F6C ; color: #fff;" >
                <tr align="center">
                  <th width="7%">#</th>
                  <th width="70%">Nombre del Archivo</th>
                  <th colspan="3" >Descargar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $archivos = scandir("subidas");
                $num=0;
                for ($i=2; $i<count($archivos); $i++)
                {$num++;
                ?>    
                <tr align="center">
                  <th scope="row"><?php echo $num;?></th>
                  <td><?php echo $archivos[$i]; ?></td>
                  <td><a title="Descargar Archivo" href="subidas/<?php echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px;"> <i class="fas fa-download"> </a></td>

                  <td><a title="Ver Archivo" href="subidas/<?php echo $archivos[$i]; ?>" target="_blank" style="color: blue; font-size:18px;"><i class="fas fa-eye"></i></a></td>

                  <td><a title="Eliminar Archivo" href="Eliminar.php?name=subidas/<?php echo $archivos[$i]; ?>" style="color: red; font-size:18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <i class="fas fa-trash-alt"></i> </a></td>
                </tr>
             <?php }?> 

              </tbody>
        </table> 
       
		</div>
	<!---->
	   	</main>
		</div>
		</div>
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
 		<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="js/funciones.js"></script>
        <script src="js/eliminardoc.js"></script>
        <script>
            function openModelPDF(url,id) {
                $('#modalPdf').modal('show');
                $('#iframePDF').attr('src','<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/simuladortec/'; ?>'+url);
                $('#titu').text(id);
            }
            function Confirmation() {
            if (confirm('¿Esta seguro de eliminar el registro?')==true) {
                return true;
            }else{
                return false;
            }
            }                                          
        </script>

	</body>
</html>