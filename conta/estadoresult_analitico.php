<?php include("../conexion.php");?>
<html>
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <title>Estado de Resultados Analítico</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<style type="text/css">
			.tabla{
				margin-left: 20%;
				margin-right: 20%; 
			}
      .container2{
        margin-left: 20%;
        margin-right: 20%;
      }
       .mod{
        margin-right: 2%;
        
        float: right;

      }
		</style>
<style>
#status { padding:10px; background:#88C4FF; color:#000; font-weight:bold; font-size:12px; margin-bottom:10px; display:none; width:90%; }
</style>
	</head>

	<?php require "menuconta.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Estado de Resultados</h1><h5>-Analítico-</h5></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active"><b>Instrucciones:</b> En el siguiente apartado podrás realizar tu estado de resultados con base en los datos dados en la balanza de comprobación. Así mismo, al terminar de realizar tu ejercicio deberás descargarlo en formato PDF para posteriormente poder subirlo en el apartado “Carga de archivos”. </li>
		</ol>
		<!--Contenido dentro del div con margen-->
  <!-- modal --> 
  <!--  -->
  		</div>
  			<!--Contenido Fuera del div para q crees lo q quiera o en el anteriri ajja -->
      <div class="mod">
          <!-- modal -->
          <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#test1">Balanza</button>
          <!-- modal -->
          <div id="test1" class="modal fade" role="dialog" style="z-index: 1400;">
            <div class="modal-dialog modal-lg" role="dialog">
              <!-- Modal content-->
              <div class="modal-content">
                
                <div class="modal-body">
                  <div class="container">
                  <?php
                  $sql = "SELECT * FROM `mayor` where nom_us='$nombre' ORDER BY `mayor`.`codigo_cuen` ASC";
                  $consulta = mysqli_query($conexion, $sql);
                  if($consulta->num_rows === 0) {
                    echo "<br><div style=\"border:1px solid #88C4FF;background-color:#88C4FF;\">
                                <center>No hay datos, registra tu primer asiento</center>
                                 </div>";
                  } else {
                  ?>
          <div class="row">
          <div id="status"></div>      
          <table class="table table-hover table-success">
              <thead class="thead-dark">
                <tr align="center">
                  <th scope="col"style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">Nombre de la cuenta</th>
                  <th scope="col" colspan="2" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">Saldo del mes</th>
                </tr>
                <tr align="center">
                  <th scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">ACTIVO - PASIVO - CAPITAL </th>
                  <th scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">DEUDOR</th>
                  <th scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">ACREEDOR</th>
                </tr>
              </thead>
              <tbody>
          <?php
          $rownumber=0;
          while($rowedit = mysqli_fetch_array($consulta)){
          $rownumber++;
          $id= $rowedit["id"];
          $codigo= $rowedit["codigo_cuen"];
          $cuenta = $rowedit["cuenta"];
          $MD = $rowedit["MD"];
          $MA = $rowedit["MA"];
          $SD = $rowedit["SD"];
          $SA = $rowedit["SA"];

          ?>
          <tr>
            <td  id="Nombres:<?php echo $rownumber; ?>" contenteditable="false"><?php echo $cuenta; ?></td>
            <td align="right" id="Cel:<?php echo $rownumber; ?>" contenteditable="false">$ <?php echo number_format($SD,2); ?></td>
            <td align="right" id="Cel:<?php echo $rownumber; ?>" contenteditable="false">$ <?php echo number_format($SA,2); ?></td>
        
          </tr>
          <?php
          }
          ?>    
              </tbody>
           </table>
          </div>
          <?php }?>
      </div>
                  </div>      
                </div>
              </div>
        </div>
  <!-- fin  modal -->
  </div>

    <!-- tabla n -->
    <div class="container2">
      
      <?php
      $sql = "SELECT * FROM `resulanal` WHERE `nom_us`='$nombre'";
      $consulta = mysqli_query($conexion, $sql);
      if($consulta->num_rows === 0) {
        ?>
        <div >
            <form action="estado_res/insert_res.php" method= "POST" >
          <center><h1>Generar tabla</h1>
            <button type="submit" class="btn btn-outline-light"> <img src="tarjetas/tabla.svg" width="100" height="100"> </button><br>
            <input type="text" name="nom_us" value="<?php echo $nombre;?>" hidden>
            <input type="text" id="botonCP" title ="Generar tablas" style="visibility:hidden">
          </center>
        </form> 
        </div>  
        <?php
      } else {
      ?>
      <!--  -->
          <?php 
          $sqlenc ="SELECT * FROM encabezado WHERE nom_us='$nombre'";
              $encabezado = mysqli_query($conexion, $sqlenc); ?>
           <div class="tablaDiario">              
                  <div class="row">    
                  <table class="table ">
                     <!--  <thead style="background: #000; color: #fff;">
                      <tr align="center" >
                        <th scope="col" colspan="2">Encabezado</th>
                      </tr>
                   </thead> -->
                      <tbody>
                    <?php
                      $rownumber=0;
                      while($enca = mysqli_fetch_array($encabezado)){
                      $rownumber++;
                      $id=$enca["id"];
                      $nom = $enca["nomEm"];
                      $ape = $enca["fechaEm"];
                      $ciu = $enca["tipoDoc"];
                      $cel = $enca["firma"];
                    ?>
                    <tr  align="center" >
                      <!--  <td scope="row"><?php echo $rownumber; ?></td>-->
                      <td style= "border: none; height: 5px;"  id="nomEm:<?php echo $id; ?>" ><b><?php echo $nom; ?></b></td>
                    </tr>
                    <tr  align="center" >
                      <td  style="border: none;" id="fechaEm:<?php echo $id; ?>" ><b><?php echo $ape; ?></b></td>
                    </tr>
                    
                  <?php
                  }
                  ?>    
                      </tbody>
                   </table>
                </div>
              </div>
      <!--  -->
        <div class="row">
          <div id="status"></div>      
          <table class="table table-striped">
            <thead class="thead-dark">
              <tr align="center">
                <th scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; ">Cuentas</th>
                <th scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; "> </th>
                <th scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; "> </th>
              </tr>
            </thead>
            <tbody>
            <?php
            $rownumber=0;
            while($rowedit = mysqli_fetch_array($consulta)){
            $rownumber++;
            $id = $rowedit["id"];
            $des = $rowedit["des"];
            $c1 = $rowedit["c1"];
            $c2 = $rowedit["c2"];
            if ($c2==0) {
              $c2="";
            }else{
              $c2;
            }

            ?>
              <tr>
                
                <?php 
                if ($c1=='') {
                  ?>
                  <td align="right" id="des:<?php echo $id; ?>"  contenteditable="false"><?php echo $des; ?></td>
                  <?php
                }elseif ($id==17 || $id==22 || $id==23|| $id==26) {
                  ?>
                  <td align="center" id="des:<?php echo $id; ?>"  contenteditable="false"><strong><u><?php echo $des; ?></u></strong></td>
                  <?php
                }else{
                  ?>
                  <td id="des:<?php echo $id; ?>"  contenteditable="false"><?php echo $des; ?></td>
                  <?php
                }
                ?>
                <?php 
                if ($c1=='' || $c1=='-') {
                  ?>
                  <td id="c1:<?php echo $id; ?>" contenteditable="false" ><?php echo $c1; ?></td>
                  <?php
                }else{
                ?>
                  <td id="c1:<?php echo $id; ?>" contenteditable="true" ><?php echo $c1; ?></td>
                <?php
              }
                 ?>

                <td id="c2:<?php echo $id; ?>" contenteditable="false"><?php echo $c2; ?></td>

              </tr>

            <?php
            }
            ?>    
            </tbody>
            <tfoot align="right">
                <tr  style="height:1px; border-bottom: 2px solid #27AE60"><td colspan="4" height="1px" ></td></tr>
                <td align="center"   style=" border-bottom: 2px solid #27AE60;" id="tabono" colspan="9">
                  <a href="pdf/resultanal.php" target="_blank">  <button title="Descargar ER Analítico.pdf" type="button" class="btn btn-dark"><i class="fa fa-download"> </i></button> </a>
                  <a href="estado_res/eliminar_res.php?nom=<?php echo $nombre; ?>"><button title="Eliminar ER Analítico" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> </a>
                  <a href="estado_res/calculos_an.php?nom=<?php echo $nombre; ?>">  <button title="Calcular ER Analítico" type="button" class="btn btn-info"><i class="fa fa-calculator"> </i></button> </a>
                </td>
            </tfoot>
          </table>
        </div>
      <?php }?>
    </div>
    <!-- fin de la tabla n -->


	<!---->
  </main>
	</div>
	</div>
		  <script>
        $(function(){
          //Mensaje
            var message_status = $("#status");
            $("td[contenteditable=true]").blur(function(){
                var rownumber = $(this).attr("id");
                var value = $(this).text();
                $.post('estado_res/actualizarresan.php' , rownumber + "=" + value, function(data){
                    if(data != '')
              {
                message_status.show();
                message_status.html(data);
                //hide the message
                setTimeout(function(){message_status.html("REGISTRO ACTUALIZADO CORRECTAMENTE");},2000);
                
              } else {
                //message_status().html = data;
              }
                });
            });
        });
      </script>

 		<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script type="text/javascript" src="estado_res/es_resanalitico.js"></script>
	</body>
</html>