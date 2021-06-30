<?php
include_once 'file/config.php';
if (isset($_POST['subir'])) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "archivos/" . $nombre;


    if ($nombre != "") {
        if (copy($ruta, $destino)) {
            $area= $_POST['area'];
            $acti= $_POST['acti'];
            if (empty($_POST['descri'])) {
                $descri= "sin descripcion ";
            }else{
                $descri= $_POST['descri'];
            }
            $formato= $_POST['formato'];
            $us= $_POST['us'];
            $db=new Conect_MySql();

            $sql = "INSERT INTO file(area,actividad,description,nom_archivo,tamanio,tipo,formato,id_us) VALUES('$area','Actividad: $acti','$descri','$nombre','$tamanio','$tipo','$formato','$us')";

            $query = $db->execute($sql);
            if($query){
                ?>
            <script type="text/javascript">
                window.location.href='archivos.php';
            </script>
            <?php
            }
        } else {
             ?>
            <script type="text/javascript">
                window.location.href='archivos.php';
            </script>
            <?php
        }
    }
}
?>
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
        <style type="text/css">
            .tablafile{
              margin-left: 3%;
              margin-right: 3%;
            }
            .formbus{
             margin-left: 3%;
              margin-right: 3%;   
            }
        </style>
	</head>

	<?php require "menu.php" ?>
    
    <?php
    include('conexion.php');
    ?>
		<!--Titulo-->
        <?php if($tipo_usuario == 2) { ?>
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Carga de Archivo Finales</h1></center>
    	    <ol class="breadcrumb mb-4">
    	        <li class="breadcrumb-item active" style="text-align: justify;"><b>Instrucciones: </b> En este apartado podrás subir los archivos correspondientes a cada actividad del Reactivo Integrador Multidisciplina (RIM), recuerda que deben estar en formato PDF. </li>
    		</ol>
            <!--  boton resgistrar -->
		  <div class="container">
                <div class="row justify-content-md-center"> 
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Nuevo Archivo</button>
                </div>
          </div>
            <br>

            <!-- Modal formulario-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo archivo</h5>
                    </div>
                    <div class="modal-body">
                    <!-- from original  -->
                        <form method="post" action="" enctype="multipart/form-data" class="was-validated" >
                            <div class="form-row">
                                <div class="col-6 mb-3">
                                <label for="area">Área:<strong>*</strong> </label>
                                <select type="text" class="custom-select" id="area" name="area" required>
                                  <option value="">SELECCIONA UN ÁREA</option>
                                  <option value="Administracion">Administración</option>
                                  <option value="Economia">Economía</option>
                                  <option values="Contailidad">Contabilidad</option>
                                </select>
                                <div class="invalid-tooltip">Seleccione un área para continuar
                                </div>
                                </div>

                                <div class="col-6 mb-3">
                                  <label for="acti">Numero de la actividad<strong>*</strong></label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Actividad:</span>
                                  </div>
                                  <input type="number" class="form-control" id="acti" name="acti" placeholder="1.1.1" step="any" required >
                                  <div class="invalid-tooltip">Ingresa el número de actividad.
                                  </div>
                                </div>
                                </div>
                            </div>

                            <div class="from-grup mb-3">
                                <span>Tipo de archivo : <strong>*</strong> </span>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="formato" id="inlineRadio1" value="pdf">
                                <label class="form-check-label" for="inlineRadio1">PDF</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="formato" id="inlineRadio2" value="excel" required>
                                <label class="form-check-label" for="inlineRadio2">Excel</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="formato" id="inlineRadio3" value="word"  >
                                <label class="form-check-label" for="inlineRadio3">Word</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="formato" id="inlineRadio3" value="img"  >
                                <label class="form-check-label" for="inlineRadio3">Img</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="formato" id="inlineRadio3" value="txt"  >
                                <label class="form-check-label" for="inlineRadio3">TXT</label>
                                </div>
                            </div>

                        
                            <div class="form-row">
                                <div class="col-12 mb-3">
                                <input type="file" class="form-control" id="archivo" name="archivo" required>
                                <div class="invalid-tooltip">Selecciona un documento para continuar
                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descripcion</label>
                                <textarea class="form-control" rows="2" id="descri" name="descri"></textarea>
                            </div>

                            <div class="form-group" hidden="true">
                                <label for="description">Usuario:</label>
                                <input type="text" class="form-control" id="us" name="us" 
                                readonly="disabled" value="<?php echo $nombre;?>">
                            </div>
                            <hr>
                            <center>
                            <input type="submit" class="btn btn-primary" value="subir" name="subir">
                            </center>                           
                        </form>

                    <!-- fin del from original  -->
                    </div>
                </div>
            </div>
            </div>
        <!-- fin Modal formulario-->
		</div>
        <?php }else{?>
        <div class="container-fluid">
            <center><h1 class="mt-4">Archivos Finales</h1></center>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active" style="text-align: justify;">
                </li>
            </ol>
        </div>   
        <?php } ?>

    <?php if ($tipo_usuario==1){
    ?> <!-- parde del administrador -->
    <div class="formbus">
        <form method="POST" action="" >
            <div class="form-row">                
                <div class="col-md-4 mb-3"> 
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="us">
                        <option value="NULL"></option>
                         <?php
                    $consulta1 = "SELECT DISTINCT id_us FROM file ";
                    $resultado1 = mysqli_query($conexion , $consulta1);
                    
                    while($misdatos = mysqli_fetch_assoc($resultado1)){ 
                       ?>
                        <option value="<?php echo $misdatos["id_us"];?>">
                            <?php echo $misdatos["id_us"]; ?></option>
                        <?php }?>
                    </select>
                </div> 

                <div class="col-md-4 mb-3"> 
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="area">
                        <option value="NULL"></option>
                         <?php
                    $consulta2 = "SELECT DISTINCT area FROM file ";
                    $resultado2 = mysqli_query($conexion , $consulta2);
                    $contador=0;
                    while($misdatos = mysqli_fetch_assoc($resultado2)){ 
                        $contador++;?>
                        <option value="<?php echo $misdatos["area"];?>"><?php echo $misdatos["area"]; ?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <input type="submit"  value="Buscar" class="btn btn-dark" />
                    <input type="reset" value="Limpiar" class="btn btn-dark">
                </div>
            </div>
        </form>
    </div>

    <!-- tabla original -->
        <div class="tablafile">
        <?php
            if (!isset($_POST['us']) && !isset($_POST['area'])) {
                $u="-";
                $a="-";
                
            }else{
                $u=$_POST['us'];
                $a=$_POST['area'];
                
            }

            switch ($u && $a ) {
                case $u === $a:
                    $conecion="";
                    break;
                case $u === "NULL" :
                    $conecion="WHERE area = '$a'";
                    break;
                case $a === "NULL":
                    $conecion="WHERE id_us = '$u'";
                    break;
                case $u !== "NULL" && $a !== "NULL":
                    $conecion="WHERE area = '$a' && id_us = '$u'";
                    break;
            }

        $sqlbus = "SELECT * FROM file $conecion";           


        $consultabus = mysqli_query($conexion, $sqlbus);
        if($consultabus->num_rows === 0) {
        echo "No hay resultados <br><br><br>";
        } else {
        ?>
        <div class="table-responsive">  
            <table class="table table-striped ">
                <thead class="thead-dark">
                  <tr align="center" >
                    <th>Equipo/Usuario</th>
                    <th >Area</th>
                    <th>Actividad</th>
                    <th>Nombre del archivo</th>
                    <th>Descripcion</th>
                    
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $rownumber=0;
                    while($rowedit = mysqli_fetch_array($consultabus)){
                    $rownumber++;
                    $id = $rowedit["id"];
                    $area = $rowedit["area"];
                    $acti = $rowedit["actividad"];
                    $descri = $rowedit["description"];
                    $nom_archi = $rowedit["nom_archivo"];
                    $tamaño = $rowedit["tamanio"];
                    $tipo = $rowedit["tipo"];
                    $formato=$rowedit["formato"];
                    $id_us=$rowedit["id_us"];
                    ?>
                    <tr>
                      <td ><?php echo $id_us; ?></td>
                      <td  ><?php echo $area; ?></td>
                      <td  ><?php echo $acti; ?></td>
                      <td> <?php echo $nom_archi; ?></td>
                      <td  ><?php echo $descri; ?></td>
                      
                      <?php if ( $formato=="excel"||$formato=="word"){
                        ?>
                        <td>
                            <button type="button" class="btn "><i class="fas fa-eye-slash"></i></i></button>
                            <a href="archivos/<?php echo $nom_archi;?>" download> <i class="fas fa-download"></i> </a> 

                        </td>
                        <?php
                        }else{
                        ?>
                         <td>
                        <button onclick="openModelPDF('file/archivo.php?id=<?php echo $id;?>','<?php echo $area.$acti.$nom_archi;?>')" type="button" class="btn "><i class="fas fa-eye"></i></button>

                        <a href="archivos/<?php echo $nom_archi;?>" download> <i class="fas fa-download"></i> </a>
                      </td>
                        <?php
                        }
                        ?>
                      
                    </tr>
                    <?php
                    }
                    ?>    
                </tbody>
            </table>
        </div>
        <?php }?>
        </div>
    <!-- Fin de la tabla original -->

    <!-- fin de la parde del administrador -->
    <?php
    }else{
    ?> <!-- parde del usuario -->

    <!-- tabla original -->
        <div class="tablafile">
        <?php
        
        $sql = "SELECT * FROM file WHERE id_us ='$nombre' ";
        $consulta = mysqli_query($conexion, $sql);
        if($consulta->num_rows === 0) {
        echo "No hay resultados <br><br><br>";
        } else {
        ?>
        <div class="table-responsive">  
            <table class="table table-striped ">
                <thead class="thead-dark">
                  <tr align="center" >
                    <th >Area</th>
                    <th>Actividad</th>
                    <th>Nombre de archivo</th>
                    <th>Descripcion</th>
                    <th>Tipo</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $rownumber=0;
                    while($rowedit = mysqli_fetch_array($consulta)){
                    $rownumber++;
                    $id = $rowedit["id"];
                    $area = $rowedit["area"];
                    $acti = $rowedit["actividad"];
                    $descri = $rowedit["description"];
                    $nom_archi = $rowedit["nom_archivo"];
                    $tamaño = $rowedit["tamanio"];
                    $tipo = $rowedit["tipo"];
                    $formato=$rowedit["formato"];
                    $id_us=$rowedit["id_us"];
                    ?>
                    <tr>
                      <td  ><?php echo $area; ?></td>
                      <td  ><?php echo $acti; ?></td>
                      <td> <?php echo $nom_archi; ?></td>
                      <td  ><?php echo $descri; ?></td>
                      <td ><?php echo $formato; ?></td>
                      <?php if ( $formato=="excel"||$formato=="word"){
                        ?>
                        <td>
                            <button type="button" class="btn "><i class="fas fa-eye-slash"></i></i></button>
                        
                            <a href="archivos/<?php echo $nom_archi;?>" download> <i class="fas fa-download"></i> </a> 

                            <a href="file/eliminararchivo.php?id=<?php echo $id;?>&&nom=<?php echo $nombre;?>"> <button type="button" class="btn " onclick="return Confirmation()" ><i class="fas fa-trash-alt"></i></button> </a> 
                        </td>
                        <?php
                        }else{
                        ?>
                         <td>
                        <button onclick="openModelPDF('file/archivo.php?id=<?php echo $id;?>','<?php echo $area.$acti.$nom_archi;?>')" type="button" class="btn "><i class="fas fa-eye"></i></button>

                        <a href="archivos/<?php echo $nom_archi;?>" download> <i class="fas fa-download"></i> </a> 

                        <a href="file/eliminararchivo.php?id=<?php echo $id;?>&&nom=<?php echo $nombre;?>"> <button type="button" class="btn " onclick="return Confirmation()" ><i class="fas fa-trash-alt"></i></button> </a> 
                      </td>
                        <?php
                        }
                        ?>
                      
                    </tr>
                    <?php
                    }
                    ?>    
                </tbody>
            </table>
        </div>
        <?php }?>
        </div>
    <!-- Fin de la tabla original -->

    <!-- fin de la parde del usuario -->
    <?php    
    } ?>
    
        <!-- modal -->
            <!-- modal tabla -->
            <div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="titu"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="400px"></iframe>                           
                        </div>
                    </div>
                </div>
            </div>       
        <!-- fin de modal modal tabla -->

    


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