
        <?php
        include 'config.php';
        include("../conexion.php");
        $db=new Conect_MySql();
            $sql = "select*from file where id=".$_GET['id'];
            $query = $db->execute($sql);

        if($datos=$db->fetch_row($query)){
            $nombre=$datos['nom_archivo'];
            $ruta="../archivos/".$nombre;
            unlink($ruta);
            if (isset($_GET['id'])){
            //Se almacena en una variable el id del registro a eliminar
            $id_cliente = $_GET['id'];
            $us = $_GET['nom'];
            //Preparar la consulta
            $consulta = "DELETE FROM file WHERE id ='$id_cliente' && id_us='$us'";

            //Ejecutar la consulta
            if ($conexion->query($consulta)) {
                $last_id = $conexion->insert_id;
                //echo $sql_1;?>
                <script type="text/javascript">
                    window.location.href='../archivos.php';
                </script>
                <?php
                } else {
                    printf("Errormessage: %s\n", $conexion->error);
                }
            }
       } 

    ?>
   
