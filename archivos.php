<html>
    
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <title>Document</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>

	<?php require "menu.php" ?>
    
    <?php
    include('conexion.php');
       
    $tmp = array();
    $res = array();
        if($tipo_usuario == 1) {
            $sel = $conexion->query("SELECT * FROM file ");
            }else{
                $sel = $conexion->query("SELECT * FROM file WHERE id_us = '$nombre' ");
            }
    

    while ($row = $sel->fetch_assoc()) {
        $tmp = $row;
        array_push($res, $tmp);
    }
    ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Carga de Archivo Finales</h1></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active" style="text-align: justify;"><b>Instrucciones: </b> En este apartado podrás subir los archivos correspondientes a cada actividad del Reactivo Integrador Multidisciplina (RIM), recuerda que deben estar en formato PDF. </li>
		</ol>
		<!--Contenido dentro del div con margen-->
			<div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-8">
                    <!--menu si es usuario administrador-->             
                        <?php if($tipo_usuario == 2) { ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Nuevo Archivo</button>
                        <?php } ?>
                        <!--fin del menu si es usuario administrador-->

                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Área</th>
                                <th scope="col">Ejercicio</th>
                                <th scope="col">Equipo</th>
                                <th scope="col">Acciones</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($res as $val) { ?>
                                <tr>
                                    <td><?php echo $val['title'] ?></td>
                                    <td><?php echo $val['description'] ?></td>
                                    <td><?php echo $val['id_us'] ?></td>
                                    <td>
                                        <button onclick="openModelPDF('<?php echo $val['url'] ?>')" class="btn btn-primary" type="button">Ver Archivo</button>
                                        <!--<a class="btn btn-primary" target="_black" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/simulador/' . $val['url']; ?>" >Ver Archivo pagina</a>-->
                                        
                                        <a class="btn btn-primary eliminardoc"  href="eliminararchivo.php?id=<?php echo $val['id'];?>" >Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo archivo</h5>

                        
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" id="form1">     
                            <label for="area">Área: </label>
                            <select type="text" class="form-control" id="area" name="area">
                                <option selected>SELECCIONA UN ÁREA</option>
                                <option value="Administracion">Administración</option>
                                <option value="Economia">Economía</option>
                                <option values="Contailidad">Contabilidad</option>
                            </select>
                            <br>
                            <div class="form-group">
                                <label for="description">Número y nombre de ejercicio:</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="form-group">
                                <label for="description">Archivo:</label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                            <div class="form-group">
                                <label for="description">Usuario:</label>
                                <input type="text" class="form-control" id="us" name="us" 
                                readonly="disabled" value="<?php echo $nombre;?>">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="location.reload();">
                        <input type="button" value="Regresar" onClick="location.reload();" style=" background: transparent; color: #ffffff; cursor: pointer; border: 0px;"/></button>
                        <button type="button" class="btn btn-primary" onclick="onSubmitForm()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ver archivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
		<!---->

		</div>


	<!---->
	   	</main>
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
        <script src="js/funciones.js"></script>
        <script src="js/eliminardoc.js"></script>
        <script>
                            function onSubmitForm() {
                                var frm = document.getElementById('form1');
                                var data = new FormData(frm);
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function () {
                                    if (this.readyState == 4) {
                                        var msg = xhttp.responseText;
                                        if (msg == 'success') {
                                            alert(msg);

                                            $('#exampleModal').modal('hide')
                                        } else {
                                            alert(msg);
                                        }

                                    }
                                };
                                xhttp.open("POST", "upload.php", true);
                                xhttp.send(data);
                                $('#form1').trigger('reset');
                            }
                            function openModelPDF(url) {
                                $('#modalPdf').modal('show');
                                $('#iframePDF').attr('src','<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/simulador/'; ?>'+url);
                            }                            
                            
        </script>
	</body>
</html>