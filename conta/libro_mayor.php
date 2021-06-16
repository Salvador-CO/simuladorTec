<?php include("../conexion.php");?>

<html>
  <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="css/emergente.css">
        <title>Libro Mayor</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
   <style type="text/css">
    
    .parents{ 
      width: auto; 
      height: auto; 
      margin: auto;
      display: flex;  
      justify-content: space-around;
      flex-wrap: wrap; 
      transition: all 0.2 linear;
     
    }
    .child{
      height: auto;
      background:#c3dec9;
      box-shadow: 0 0 20px #bac3c3;
      flex:1 1 200px;
      margin: 10px;

    }

    .grand_parent{
     
      margin: 2%;
    }
    .btn-circle {
          width: 30px;
          height: 30px;
          padding: 6px 0px;
          border-radius: 15px;
          text-align: center;
          font-size: 12px;
          line-height: 1.42857;
      }
    /*
    .child:first-child{
      background: #ffbe76;
    }
    .child:last-child{
      background: #ff7979;

    }*/
    @media (max-width: 768px){
      .grand_parent{height:auto; }
    }
    path{
      fill: currentColor !important;
    }
    </style>
  </head>
  <?php require "menuconta.php" ?>
    <!--Titulo-->
    <div class="container-fluid">
      <center><h1 class="mt-4">Libro Mayor <button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#btnPrueba" title="¡Da clic para obtener mas información!"><i class="fas fa-question"></i> </button></h1></center>

      <!-- modal de instrccines -->
      <div id="btnPrueba" class="modal fade" style="z-index: 1400;" data-target="#btnPrueba">
          <div class="modal-dialog modal-lg" role="dialog" >
            <!-- Modal content-->
            <div class="modal-content">
                <div style="background: #1B396A; color: #fff; height: 75px;padding-left: 40px;">
                        <p><h3 class="modal-title col-11 text-center">Ayuda</h3></p>
                </div>
              <div class="modal-body">
               <!--   contenido -->
                 <embed src="../manual/libro_mayor.pdf#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />
              </div>      
            </div>
          </div>
      </div>


      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><b>Instrucciones:</b> En el siguiente apartado se mostrará el libro mayor con base en los datos que ingresaste en el "Libro Diario". Posteriormente deberás guardar cada una de las cuentas, para así poder generar la balanza de comprobación, de lo contrario esta no se generará y deberás regresar a dicho apartado. Una vez terminadas de guardar tus cuentas deberás descargarlo en formato PDF para posteriormente poder subirlo en el apartado “Carga de archivos”. </li>
      </ol>
      <!--Contenido dentro del div con margen-->
    </div>
    <div class="grand_parent">
      
      
        <?php 
        $sql1 ="SELECT DISTINCT concepto FROM `diario` WHERE`nom_us`='$nombre'";
              $consulta1 = mysqli_query($conexion, $sql1);
              if($consulta1->num_rows === 0) {
              echo "<br><div style=\"border:1px solid #88C4FF; background-color:#88C4FF;\">
                  <center>No hay datos, registra tu primer asiento.<//center>
           </div>";
              }else{
                ?>
      <div class="parents">          
                <?php 

              while( $titulo = mysqli_fetch_assoc($consulta1) ) {
                $concepto= implode(";", $titulo);
                $con= $titulo ['concepto'];
                ?>
                <div class="child">
                  <table class="table">
                    <thead align="center">
                    <tr>
                      <th colspan="3" scope="col" style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; "><?php echo $con; ?></th>
                    </tr>
                    <tr>
                      <th style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; " scope="col">#</th>
                      <th style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; " scope="col">Debe</th>
                      <th style="background-color:#3b6c9b; color: #ffff; border: 1px solid #fff; " scope="col">Haber</th>
                    </tr>
                    </thead>
                    <tbody align="right">
                      <?php 
                      $sql2 ="SELECT id, codigo_cuen, numAsiento, cargo, abono FROM diario WHERE nom_us='$nombre' && concepto='$con'";
                        $consulta2 = mysqli_query($conexion, $sql2);
                        while($rowedit = mysqli_fetch_array($consulta2)){
                                    $id=$rowedit["id"];
                                    $numAsiento=$rowedit["numAsiento"];
                                    $cargo = $rowedit["cargo"];
                                    $abono = $rowedit["abono"];
                                    $codigo_cuen=$rowedit["codigo_cuen"];
                        ?>
                        <tr>
                          <td align="center" scope="row" style="border: 1px solid #fff; background-color: #c3dec9;"><?php echo $numAsiento; ?></td>
                          <td style="border: 1px solid #fff; background-color: #c3dec9;"><?php echo "$".number_format($cargo,2); ?></td>
                          <td style="border: 1px solid #fff; background-color: #c3dec9;"><?php echo "$".number_format($abono,2); ?></td>
                        </tr>
                        <?php          
                          }//Fin del segundo while
                        ?>
                    </tbody>
                <?php  
                $sqlcargo="SELECT SUM(cargo) FROM diario Where nom_us= '$nombre' && concepto= '$con'";
                $sqlabono="SELECT SUM(abono) FROM diario Where nom_us= '$nombre' && concepto= '$con'";
                //echo $sqlcargo;
                $rescargo = $conexion->query($sqlcargo);
                    $datocargo = $rescargo->fetch_assoc();
                  if(isset($datocargo['SUM(cargo)'])){
                    $cargo = $datocargo['SUM(cargo)'];
                  }else{
                    $cargo="0";
                    }
                $resabono = $conexion->query($sqlabono);
                    $datoabono = $resabono->fetch_assoc();
                  if(isset($datoabono['SUM(abono)'])){
                    $abono = $datoabono['SUM(abono)'];
                  }else{
                    $abono="0";
                    }


                    $sd=$cargo-$abono;
                    $sa=$abono-$cargo;
                    if ($sd>0) {
                      $sd= $sd;
                      $sa= 0;
                      $des="<strong>SD</strong> ";
                    }elseif ($sa>0) {
                      $sd= 0;
                      $sa= $sa;
                      $des="<strong>SA</strong> ";
                    }else{
                      $sd= "0";
                      $sa= "0";
                      $des="-";;
                    }

                ?>
                    <tfoot align="right">
                      <tr style="background-color: #ECDBA5; border: 1px solid #fff; ">
                        <td align="right" style="border-right: 1px solid #fff;"></td>
                        <td style="border-right: 1px solid #fff;"><?php echo "$";  echo number_format($cargo,2) ?></td>
                        <td class="success"><?php echo "$"; echo  number_format($abono,2);  ?></td>
                      </tr>
                      <tr style="background-color: #ECDBA5; border: 1px solid #fff; ">
                        <td  style="border-right: 1px solid #fff;"><?php echo $des;  ?></td>
                        <td  style="border-right: 1px solid #fff;"><?php echo number_format($sd,2);  ?></td>
                        <td  style="border-right: 1px solid #fff;"><?php echo number_format($sa,2);  ?></td>
                      </tr>
                    </tfoot>
                  </table>

          <form method="POST" action="diario/mayor.php" >
            <div class="row uniform"   hidden="true">
              <div class="form-group col-md-6">
                <label>codigo:</label>
                <input type="text" name="codigo" id="codigo" value="<?php echo $codigo_cuen; ?>" class="form-control" />
              </div>
              <div class="form-group col-md-6">
                <label>Cueta:</label>
                <input type="text" name="cuenta" id="cuenta" value="<?php echo $con; ?>" class="form-control" />
              </div>
              <div class="form-group col-md-6">
                <label>MD:</label>
                <input type="text" name="cargo" id="cargo" value="<?php  echo $cargo; ?>" class="form-control"/>
              </div>
              <div class="form-group col-md-6">
                <label>MA:</label>
                <input type="text" name="abono" id="abono"  value="<?php  echo $abono; ?>" class="form-control"/>
              </div>
              <div class="form-group col-md-6">
                <label>SD:</label>
                <input type="text" name="SD" id="SD" value="<?php  echo $sd; ?>" class="form-control"/>
              </div>
              <div class="form-group col-md-6">
                <label>SA:</label>
                <input type="text" name="SA" id="SA"  value="<?php  echo $sa; ?>" class="form-control"/>
              </div>
              <div class="form-group col-md-6">
                <label>nomus:</label>
                <input type="text" name="nom_us"  id="nom_us" class="form-control" value="<?php echo $nombre;?>">
              </div>
            </div>
            <?php
              if ($sa == $sd) {
                 echo "<div style=\"border:1px solid #F45757; background-color:#F45757;\">
                        <center>Cuenta cancelada</center>
                        </div>";               
                } else{


                $buscarcuenta = "SELECT `cuenta` FROM `mayor` WHERE `cuenta`='$concepto' && nom_us= '$nombre'";
                 $resultado = $conexion->query($buscarcuenta);
                 $contador = mysqli_num_rows($resultado);

                 if($contador===0) {

                    ?>
                     <div class="form-group col-md-12">
                  <center>              
                    <button type="submit" class="btn btn-outline-info" data-toggle="modal" data-target="#test1"><img src="../iconos/guardar.svg" width="18px;"></button>

                  </center>

                  </div>

                  <?php

                 } else{
                  echo "<div style=\"border:1px solid #88C4FF; background-color:#88C4FF;\">
                        <center>Cuenta registrada</center>
                        </div>";
                  ?>
                  <center>
                  <a href="diario/eliminar.php?dato=mayor1&&nom=<?php echo $nombre; ?>&&cuenta=<?php echo $con; ?>"> <button title="Eliminar cuentas de libro mayor" type="button" class="btn btn-outline-danger"><img src="../iconos/eliminar.svg" width="18px;"></button></a>
                  </center>
                  <?php    
                 } 
               }  
              ?>
              
          </form>


                </div><!-- fin de div de hijo -->
                <?php  
              }//fin del primer while
              } //fin del primer else
         ?>
        
      </div>

      <?php 
      $sqlcon="SELECT count(*) FROM mayor Where nom_us= '$nombre'";
              //echo $sqlcargo;
              $res = $conexion->query($sqlcon);
                  $dato = $res->fetch_assoc();
                  $resul = $dato['count(*)'];
                if($resul>=2){
                  ?>
                  <br>
            <div class="table-responsive">
        <center>
          <a href="pdf/mayor.php" target="_blank"> <button  title="Descargar libro mayor.pdf" type="button" class="btn btn-outline-secondary"><img src="../iconos/download-solid.svg" width="18px;"></i></button></a>
          
          <a href="diario/eliminar.php?dato=mayor&&nom=<?php echo $nombre; ?>">
           <button title="Eliminar cuentas de libro mayor" type="button" class="btn btn-outline-danger"><img src="../iconos/eliminar.svg" width="18px;"></button></a>
           
        </center><br><br>
      </div> 
                  <?php

                  
                }


       ?>
      


    </div>
   

      
      </main>
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