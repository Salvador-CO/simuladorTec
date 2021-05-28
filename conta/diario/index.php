<?php include("../../conexion.php");?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  <script>
    $(function(){
      //Mensaje
        var message_status = $("#status");
        $("td[contenteditable=true]").blur(function(){
            var rownumber = $(this).attr("id");
            var value = $(this).text();
            $.post('proceso.php' , rownumber + "=" + value, function(data){
                if(data != '')
          {
            message_status.show();
            message_status.html(data);
            //hide the message
            setTimeout(function(){message_status.html("REGISTRO ACTUALIZADO CORRECTAMENTE");},2000);
            //location.reload();
          } else {
            //message_status().html = data;
          }
            });
        });
    });
  </script>

  <style>
    #status { padding:10px; background:#88C4FF; color:#000; font-weight:bold; font-size:12px; margin-bottom:10px; display:none; width:100%; }
    .registro{
      border:1px solid;
      margin-left: 3%;
      margin-right: 3%;
    }
    .cabecera{
       border:1px solid;
        margin-left: 3%;
      margin-right: 3%;
    }
    .tablaDiario{
      margin-left: 4%;
      margin-right: 4%;
    }
    td{
      border-bottom:  #000  2px;
    }
    #tcargo{
      border-top: 1px solid;
    } 
  </style>
</head>

<body>
  <!--  -->
  <div class="registro">
    <h3>Datos</h3>
    <!--  -->
    <form id="cabezera">
        <div class="form-row">
           <div class="form-group col-md-4">
                <label for="fechadiario">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control"  >
            </div>
             <div class="form-group col-md-4">
                <label for="esfin">Estado financiero</label>
                <select name="esfin" id="esfin" class="form-control">
                    <option value="" selected></option>
                    <option value="Esquemas de Mayor">Esquemas de Mayor</option>
                    <option value="Rayado diario">Rayado diario</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="nomempresa">Nombre de la empresa</label>
                <input type="text" name="nomempresa" id="nomempresa" class="form-control" > 
            </div>
            
        </div> <!-- cierre de form-row -->
        <!-- dejo fuera a submit -->
        <div class="form-group col-md-12"><center>
            <input type="submit" id="enviar" value="Enviar" class="btn btn-dark">
            <input type="reset" value="Limpiar" class="btn btn-dark"></center>
        </div>
    </form>
    <!--  -->
  </div>
  <!-- fin cabezera -->

  <div class="registro">
    <h3>Registro de asiento</h3>
    <!--  -->
    <form id="myForm" action="guardar.php" method="POST">
        <div class="form-row">
           <div class="form-group col-md-3">
                <label for="num_asiento">Número de asiento *</label>
                <input type="text" name="num_asiento" class="form-control" required >
            </div> 
            <div class="form-group col-md-3">
                <label for="fecha">Fecha de operacion</label>
                <input type="date" name="fecha" class="form-control" required>
                
            </div>
            <div class="form-group col-md-3">
                <label for="poliza">Poliza</label>
                <select name="poliza" id="poliza" class="form-control">
                    <option value="I" selected>(I) Ingresos</option>
                    <option value="E">(E) Egresoso</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="tarjetas">Tarjetas de almacen</label>
                <input type="text" name="tarjetas" class="form-control" >
            </div>

            <div class="form-group col-md-2">            
                <label for="cod_cuenta">Codigo de la cuenta</label>
                <input type="number" step = "any" name="cod_cuenta" id="cod_cuenta" class="form-control">
            </div>
            <div class="form-group col-md-10">
                <label for="cuenta">Cuenta o Concepto</label>
                <input type="text" name="cuenta" id="cuenta" class="form-control" readonly="readonly">
            </div>
            <div class="form-group col-md-4">
                <label for="parcial">Parcial</label>
                <input type="text" name="parcial" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="cargo">Cargo</label>
                <input type="number" step = "any" name="cargo" class="form-control" value="0">
            </div>
             <div class="form-group col-md-4">
                <label for="abono">Abono</label>
                <input type="number" step = "any" name="abono" class="form-control" value="0">
            </div>
            
        </div> <!-- cierre de form-row -->
        <!-- dejo fuera a submit -->
        <div class="form-group col-md-12"><center>
            <input type="submit" value="Enviar" class="btn btn-dark">
            <input type="reset" value="Limpiar" class="btn btn-dark"></center>
        </div>
    </form>
    
  </div><!--  -->

    <a class="btn btn-primary" href="pdf/index.php" target="_blank"><i class="fa fa-download"></i> Descargar archivo PDF</a>
  <!-- resultado cabezera -->
  <div class="cabecera">
      <h1>as</h1>
  </div>  
   <!-- fin resultado cabezera -->
<!-- Tabla -->

  <div class="tablaDiario">
    <?php
      $sql = "SELECT * FROM `diario`";
      $consulta = mysqli_query($conexion, $sql);
      if($consulta->num_rows === 0) {
        echo "<br><div style=\"border:1px solid #88C4FF; background-color:#88C4FF;\">
                <center>No hay datos, registra tu primer asiento.</center>
         </div>";
        //echo "No hay resultados <br><br><br>";
      } else {
    ?>

    <div class="row">
      <div id="status"></div>      
      <table id="rayadoD" cellspacing="0" cellpadding="0" class="table table-striped">
          <thead class="thead-dark">
            <tr >
              <th scope="col">#</th>
              <th scope="col">Fecha</th>
              <th scope="col">Código</th>
              <th scope="col">Póliza</th>
              <th scope="col">Concepto</th>
              <th scope="col">Parcial</th>
              <th scope="col">Cargo</th>
              <th scope="col">Abono</th>
              
              <th scope="col">Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $rownumber=0;
              while($rowedit = mysqli_fetch_array($consulta)){
              $rownumber++;
              $id=$rowedit["id"];
              $numAsiento=$rowedit["numAsiento"];
              $nom = $rowedit["fecha"];
              $ape = $rowedit["codigo_cuen"];
              $ciu = $rowedit["poliza"];
              $cel = $rowedit["concepto"];
              $par = $rowedit["parcial"];
              $carg = $rowedit["cargo"];
              $abo = $rowedit["abono"];
              $nom_us = $rowedit["nom_us"];
              ?>
              <tr>
                <td BGCOLOR="#99A3A4" scope="row"><?php echo $numAsiento; ?></td>
                <td id="fecha:<?php echo $id; ?>" contenteditable="true"><?php echo $nom; ?></td>
                <td id="codigo_cuen:<?php echo $id; ?>" contenteditable="true"><?php echo $ape; ?></td>
                <td id="poliza:<?php echo $id; ?>" contenteditable="true"><?php echo $ciu; ?></td>
                <td id="concepto:<?php echo $id; ?>" contenteditable="false"><?php echo $cel; ?></td>
                <td BGCOLOR="#D5D8DC " id="parcial:<?php echo $id; ?>" contenteditable="true"><?php echo $par; ?></td>
                <td BGCOLOR="#85C1E9" id="cargo:<?php echo $id; ?>" contenteditable="true"><?php echo $carg; ?></td>
                <td BGCOLOR="#FAD7A0" id="abono:<?php echo $id; ?>" contenteditable="true"><?php echo $abo; ?></td>
                <!--  <td id="nom_us:<?php echo $id; ?>" contenteditable="true"><?php echo $nom_us; ?></td>-->
                <td> <a href="eliminar_reg.php?no=<?php echo $id; ?>"> <button type="button" class="btn btn-danger">Eliminar</button> </a></td>
              </tr>
              <?php
              }
              ?>    
            </tbody>
            <!--  -->
            <?php  
              // Codigo para buscar en tu base de datos acá
              // SELECT SUM(`cargo`) FROM `diario` WHERE `nom_us`='admin'
              $sqlcargo = "SELECT SUM(cargo) FROM diario ";
              $sqlabono = "SELECT SUM(abono) FROM diario ";
              //cargo
              $rescargo = $conexion->query($sqlcargo);
                $datocargo = $rescargo->fetch_assoc();
              if(isset($datocargo['SUM(cargo)'])){
                $cargo = $datocargo['SUM(cargo)'];
              }else{
                $cargo="¡0!";
                }
              //abono
              $resabono = $conexion->query($sqlabono);
                $datoabono = $resabono->fetch_assoc();
              if(isset($datoabono['SUM(abono)'])){
                $abono = $datoabono['SUM(abono)'];
              }else{
                $abono="0";
                }
            ?>
            <tfoot>
              <tr  style="height:1px; border-bottom: 10px solid"><td colspan="9" height="1px" ></td></tr>
              <th colspan="6"><center><b><strong>Total de cargo y abono </strong></b></center></th>
              <td  id="tcargo" ><?php echo $cargo; ?></td>
              <td  id="tabono" ><?php echo $abono; ?></td>
            </tfoot>
            <!--  -->
        </table>
    </div>
      <?php }?>
  </div>
  <!-- Fin de Tabla -->
  <!-- creando pdf como tipo imagen 
  <br/>
    <input type="button" id="rayadoD" value="Export" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        $("body").on("click", "#rayadoD", function () {
            html2canvas($('#rayadoD')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("RayadoDiario.pdf");
                }
            });
        });
    </script>-->
  <!-- busqueda cuentas -->
  <script>
      document.getElementById("cod_cuenta").onchange = function(){alerta()};
      
      function alerta() {
          // Creando el objeto para hacer el request
          var request = new XMLHttpRequest();
   
          // Objeto PHP que consultaremos
          request.open("POST", "busquedacat.php");
   
          // Definiendo el listener
          request.onreadystatechange = function() {
              // Revision si fue completada la peticion y si fue exitosa
              if(this.readyState === 4 && this.status === 200) {
                  // Ingresando la respuesta obtenida del PHP
                  document.getElementById("cuenta").value = this.responseText;
              }
          };
   
          // Recogiendo la data del HTML
          var myForm = document.getElementById("myForm");
          var formData = new FormData(myForm);
   
          // Enviando la data al PHP
          request.send(formData);
      }
  </script>
  <!--  -->
  

</body>
</html>