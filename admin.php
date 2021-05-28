<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Simulador CEA </title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <style>
        #status {  color:#000; font-weight:bold; font-size:12px; margin-bottom:10px; display:none;  }
        .contenido{
        margin-right: 4%;
        margin-left: 2%;       
        }
        </style>
	</head>
    <?php include("conexion.php");?>

    <?php require "menu.php" ?>
  
        <!--Titulo-->
         
        <div class="container-fluid">
            <h1> Panel de Usuarios</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Este aparatado es único para el administrador en el cual se observan los usuarios que se han registrado con la finalidad de poder tener un control.</li>
        </ol>
        
        <!-- tabla -->
        
            <?php
            $sql = "SELECT * FROM usuario ";
            $consulta = mysqli_query($conexion, $sql);
            if($consulta->num_rows === 1) {
              echo "No hay resultados <br><br><br>";
            } else {
            ?>

            <div class="table-responsive">
            <div id="status"></div>      
            <table class="table table-striped ">
                <thead class="thead-dark">
                  <tr align="center" >
                    <th><button type="button" class="btn btn-info " data-toggle="modal" data-target="#test1"><i class="fas fa-edit" aria-hidden="true"></i></button></th>
                    <th >Usuario</th>
                    <th>Contraseña</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Escuela</th>
                    <th>Telefono</th>
                  </tr>
                </thead>
                <tbody>
            <?php
            $rownumber=0;
            while($rowedit = mysqli_fetch_array($consulta)){
            $rownumber++;
            $id = $rowedit["id"];
            $user = $rowedit["username"];
            $contra = $rowedit["password"];
            $nombre = $rowedit["nombre"];
            $corre = $rowedit["correo"];
            $escuela = $rowedit["escuela"];
            $telefono = $rowedit["telefono"];
            $tipo=$rowedit["tipo"];
            ?>
            <?php 
                if ($tipo==1) {
                   ?>
                   <tr  class="table-success" >
                      <td ><center><a href="registroUs/eliminarUS.php?no=<?php echo $id; ?>" > <button type="button" class="btn " onclick="return Confirmation()" ><i class="fas fa-trash-alt"></i></button> </a></center></td>
                      <td id="nombre:<?php echo $id; ?>" contenteditable="true"><?php echo $nombre; ?></td>
                      <td id="password:<?php echo $id; ?>" contenteditable="true"><?php echo $contra; ?></td>
                      <td id="username:<?php echo $id; ?>" contenteditable="true"><?php echo $user; ?></td>
                      <td id="correo:<?php echo $id; ?>" contenteditable="true"><?php echo $corre; ?></td>
                      <td id="escuela:<?php echo $id; ?>" contenteditable="true"><?php echo $escuela; ?></td>
                      <td id="telefono:<?php echo $id; ?>" contenteditable="true"><?php echo $telefono; ?></td>
                    </tr>
                   <?php
                }elseif($tipo==3){

                }else{
                    ?>
                    <tr>
              <td ><center><a href="registroUs/eliminarUS.php?no=<?php echo $id; ?>" > <button type="button" class="btn " onclick="return Confirmation()" ><i class="fas fa-trash-alt"></i></button> </a></center></td>
              <td id="nombre:<?php echo $id; ?>" contenteditable="true"><?php echo $nombre; ?></td>
              <td id="password:<?php echo $id; ?>" contenteditable="true"><?php echo $contra; ?></td>
              <td id="username:<?php echo $id; ?>" contenteditable="true"><?php echo $user; ?></td>
              <td id="correo:<?php echo $id; ?>" contenteditable="true"><?php echo $corre; ?></td>
              <td id="escuela:<?php echo $id; ?>" contenteditable="true"><?php echo $escuela; ?></td>
              <td id="telefono:<?php echo $id; ?>" contenteditable="true"><?php echo $telefono; ?></td>
            </tr>
                    <?php
                }
             ?>

            <?php
            }
            ?>    
                </tbody>
             </table>
            </div>
            <?php }?>
        <!-- fin de la tabla -->
         
        <!-- modal -->
            <div id="test1" class="modal fade " role="dialog" style="z-index: 1400;">
              <div class="modal-dialog " >
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header" style="background: #1B396A; color: #fff;">
                    <h5 class="modal-title">Formulario de registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <div class="modal-body">
                    <!-- formulario -->
                    <form method="POST" action="registroUs/guardar.php" class="needs-validation" novalidate autocomplete="off">
    
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                              <label for="validationCustom01">Equipo / Nombre <strong>*</strong></label>
                              <input type="text" class="form-control" id="validationCustom01" name="nom" placeholder="First name"  required title="Three letter country code">
                              <div class="invalid-feedback" title="Three letter country code">Ingresa un nombre o equipo </div>
                            </div>

                            <div class="col-md-6 mb-3">
                              <label for="validationCustom02">Telefono </label>
                              <input type="text" class="form-control" id="validationCustom02" name="tel" placeholder="Telefono" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleDataList" class="form-label">Selecciona una escuela <strong>*</strong></label>
                            <input class="form-control" list="datalistOptions" id="exampleDataList" name="escuela" placeholder="Escribe para buscar..." required>
                            <datalist id="datalistOptions" data-show-subtext="true">
                            <?php
                                $consulta = "SELECT * FROM tecnologicos ";
                                $resultado = mysqli_query($conexion , $consulta);
                                $contador=0;
                                while($misdatos = mysqli_fetch_assoc($resultado)){ 
                                    $contador++;?>
                              <option value="<?php echo $misdatos["nombre"]; ?>"></option>
                            <?php }?>    
                            </datalist>
                            <div class="invalid-feedback">Selecciona una Institucion</div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                              <label for="validationCustomUsername">Correo electronico <strong>*</strong></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="email" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" name="correo" required >
                                <div class="invalid-feedback">
                                  Ingresa un correo valido
                                </div>
                              </div>
                            </div>
                        </div>        

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                              <label for="validationCustom03">Usuario <strong>*</strong></label>
                              <input type="text" class="form-control" id="us" name="us" placeholder="First name"  pattern="^([a-z]+[0-9]{0,4}){5,10}$" required title="Usuario valido entre 5 y 10 caracteres sin espacios ni caracteres especiales (.,-/*´+_)">
                              <div class="invalid-feedback">Ingresa un usuario</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom04">Crea una contraseña <strong>*</strong></label>
                                <div class="input-group">
                                    <input ID="txtPassword" type="Password" Class="form-control" pattern="[A-Za-z0-9!?-]{8,12}" name="contra" required title=" Creas un contraseña la cual podrá contener mayúsculas, minúsculas, números y los caracteres !?-. Su tamaño: entre 8 y 12 caracteres.">
                                    <div class="input-group-append">
                                          <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                        </div> 
                                <div class="invalid-feedback">Ingresa una contraseña valida</div>
                                </div>
                              </div>    
                        </div>
                        <div class="from-grup mb-3">
                        <span>Tipo de usuario : <strong>*</strong> </span>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Administrador</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo" id="inlineRadio2" value="2" required>
                        <label class="form-check-label" for="inlineRadio2">Simple mortal</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo" id="inlineRadio3" value="3" disabled >
                        <label class="form-check-label" for="inlineRadio3">Juez</label>
                        </div>
                    </div>  
                        <div id="result-username"></div>
                    </form>
                    <!-- fin del formulario -->
                  </div>      
                </div>
              </div>
            </div> 
        <!-- fin de modal -->


        </div><!-- container-fluid -->
	</main>
    <?php require_once "footer.php"?>
    <script type="text/javascript">
        function Confirmation() {
            if (confirm('¿Esta seguro de eliminar el registro?')==true) {
                return true;
            }else{
                return false;
            }
        }
    </script>
    <script>
        $(function(){
          //Mensaje
            var message_status = $("#status");
            $("td[contenteditable=true]").blur(function(){
                var rownumber = $(this).attr("id");
                var value = $(this).text();
                $.post('registroUs/procesous.php' , rownumber + "=" + value, function(data){
                    if(data != '')
              {
                message_status.show();
                message_status.html(data);
                //hide the message
                setTimeout(function(){message_status.html("REGISTRO ACTUALIZADO CORRECTAMENTE");},2000);
                setTimeout(function(){location.reload();},2500);
              } else {
                //message_status().html = data;
              }
                });
            });
        });
    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
    <script type="text/javascript">
        function mostrarPassword(){
                var cambio = document.getElementById("txtPassword");
                if(cambio.type == "password"){
                    cambio.type = "text";
                    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                }else{
                    cambio.type = "password";
                    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                }
            } 
            
            $(document).ready(function () {
            //CheckBox mostrar contraseña
            $('#ShowPassword').click(function () {
                $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {  
            $('#us').on('blur', function() {
                $('#result-username').html('<img src="img/loader2.gif" />').fadeOut(1000);
         
                var username = $(this).val();       
                var dataString = 'username='+username;
         
                $.ajax({
                    type: "POST",
                    url: "registroUs/validarus.php",
                    data: dataString,
                    success: function(data) {
                        $('#result-username').fadeIn(1000).html(data);
                    }
                });
            });              
        });    
    </script>
	</body>
</html>
