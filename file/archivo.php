
        <?php
        include 'config.php';
        $db=new Conect_MySql();
            $sql = "select*from file where id=".$_GET['id'];
            $query = $db->execute($sql);

        if($datos=$db->fetch_row($query)){

            if($datos['nom_archivo']==""){?>
                <p>NO tiene archivos</p>
        <?php }else{ ?>
            <?php if (isset($_GET['des'])){
               ?>
               <iframe width="50%" height="50%" src="../archivos/<?php echo $datos['nom_archivo']; ?>">
                </iframe>
                <script type="text/javascript">
                    window.location.href='../archivos.php';
                </script>
               <?php 
            }else{
               ?>
               <iframe width="100%" height="100%" src="../archivos/<?php echo $datos['nom_archivo']; ?>">
                </iframe>
               <?php 
            } ?>       
    <?php 
    } 
    } 
    ?>
   
