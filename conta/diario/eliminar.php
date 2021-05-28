<?php

    include("../../conexion.php");


    $dato=$_GET['dato'];
    $nombre=$_GET['nom'];
    
  

    switch ($dato) {
        case 'mayor':
                eliminarCT();

            break;
        case 'mayor1':
                eliminarCT1();

            break;    
        case 'cp':
                eliminarCP();
            break;    
        case 'peps':
                eliminarPEPS();
            break;
        case 'ups':
                eliminarUPS();
            break;  
        case 'cuenta':
                balancecuenta();
            break;
        case 'reporte':
                balancereporte();
            break;     
    }



    function eliminarCT(){
        $nom= $GLOBALS['nombre'];
        $conexion= $GLOBALS['conexion'];
        $consulta="DELETE FROM `mayor` WHERE nom_us='$nom'";
        if ($conexion->query($consulta)) {
            $last_id = $conexion->insert_id;
            ?>
            <script type="text/javascript">
                alert("Eliminado Correctamente");
                window.location.href='../libro_mayor.php';
            </script>
            <?php
            } else {
                printf("Errormessage: %s\n", $conexion->error);
            }
    }
    function eliminarCT1(){
        $nom= $GLOBALS['nombre'];
        $conexion= $GLOBALS['conexion'];
        $cuen=$_GET['cuenta'];
        $consulta="DELETE FROM `mayor` WHERE nom_us='$nom' && cuenta='$cuen'";
        if ($conexion->query($consulta)) {
            $last_id = $conexion->insert_id;
            ?>
            <script type="text/javascript">
                window.location.href='../libro_mayor.php';
            </script>
            <?php
            } else {
                printf("Errormessage: %s\n", $conexion->error);
            }
    }

     function eliminarCP()
    {
        $nom= $GLOBALS['nombre'];
        $conexion= $GLOBALS['conexion'];
        $consulta="DELETE FROM `tarjetacp` WHERE num_us='$nom'";
        if ($conexion->query($consulta)) {
            $last_id = $conexion->insert_id;
            ?>
            <script type="text/javascript">
                alert("Eliminado Correctamente");
                window.location.href='../tarjeta.php';
            </script>
            <?php
            } else {
                printf("Errormessage: %s\n", $conexion->error);
            }
    }

     function eliminarPEPS()
    {
        $nom= $GLOBALS['nombre'];
        $conexion= $GLOBALS['conexion'];
        $consulta="DELETE FROM `tarjetapeps` WHERE nom_us='$nom'";
        if ($conexion->query($consulta)) {
            $last_id = $conexion->insert_id;
            ?>
            <script type="text/javascript">
                alert("Eliminado Correctamente");
                window.location.href='../tarjeta.php';
            </script>
            <?php
            } else {
                printf("Errormessage: %s\n", $conexion->error);
            }
    }

     function eliminarUPS() {
        $nom= $GLOBALS['nombre'];
        $conexion= $GLOBALS['conexion'];
        $consulta="DELETE FROM `tarjetaueps` WHERE nom_us='$nom'";
        if ($conexion->query($consulta)) {
            $last_id = $conexion->insert_id;
            ?>
            <script type="text/javascript">
                alert("Eliminado Correctamente");
                window.location.href='../tarjeta.php';
            </script>
            <?php
            } else {
                printf("Errormessage: %s\n", $conexion->error);
            }
    }

    function balancecuenta() {
        $nom= $GLOBALS['nombre'];
        $conexion= $GLOBALS['conexion'];
        $consulta="DELETE FROM `balance` WHERE nom_us='$nom'";
        if ($conexion->query($consulta)) {
            $last_id = $conexion->insert_id;
            ?>
            <script type="text/javascript">
                alert("Eliminado Correctamente");
                window.location.href='../balance_formcuenta.php';
            </script>
            <?php
            } else {
                printf("Errormessage: %s\n", $conexion->error);
            }
    }

    function balancereporte() {
        $nom= $GLOBALS['nombre'];
        $conexion= $GLOBALS['conexion'];
        $consulta="DELETE FROM `balance` WHERE nom_us='$nom'";
        if ($conexion->query($consulta)) {
            $last_id = $conexion->insert_id;
            ?>
            <script type="text/javascript">
                alert("Eliminado Correctamente");
                window.location.href='../balance_formreporte.php';
            </script>
            <?php
            } else {
                printf("Errormessage: %s\n", $conexion->error);
            }
    }




 ?>