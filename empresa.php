<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	$id = $_SESSION['id'];
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
    require "conexion.php";
 
// Define variables and initialize with empty values
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST["nombre"];
        $rfc = $_POST["rfc"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $tipo = $_POST["tipo"];
        $giro = $_POST["giro"];
        $fecha_alta = $_POST["fecha"];
        $periodo = $_POST["periodo"];
        $id_us = $id;
        // Prepare an insert statement
        $sql = "INSERT INTO empresa (nombre, rfc, direccion, telefono, tipo, giro, fecha_alta, periodo, id_us) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
         if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssi", $param_nombre, $param_rfc, $param_direccion, $param_telefono, $param_tipo, $param_giro, $param_fecha_alta, $param_periodo, $param_id_us);
            
            // Set parameters
            $param_nombre = $nombre;
            $param_rfc = $rfc;
            $param_direccion = $direccion;
            $param_telefono = $telefono;
            $param_tipo = $tipo;
            $param_giro = $giro;  
            $param_fecha_alta = $fecha_alta;
            $param_periodo = $periodo;
            $param_id_us = $id_us;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: empresa.php");
                location.reload();
            } else{
                echo "Algo salió mal, por favor inténtalo de nuevo";
            }
        }mysqli_stmt_close($stmt);
    mysqli_close($mysqli);
}


    if($tipo_usuario == 1){
        $where = "";
        } else if($tipo_usuario == 2){
        $where = "WHERE id_us=$id";
    }
    
    $sql = "SELECT * FROM empresa $where";
    $resultado = $mysqli->query($sql);
    mysqli_close($mysqli);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ContaLobos </title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="principal.php">Sistema Contable</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#"><i class="fas fa-cannabis"></i> Configuración</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"><i class="far fa-frown"></i> Salir</a>
					</div>
				</li>
			</ul>
		</nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="principal.php"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Inicio</a>				
							<?php if($tipo_usuario == 1) { ?>
                            <a class="nav-link" href="admin.php"><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Usuarios registrados</a>

                                <?php } ?>
								
								
							<div class="sb-sidenav-menu-heading">Menu principal</div>
                        <a class="nav-link" href="conta.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i>
                            </div>Contabilidad
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Administracion
                        </a>			
						<a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Economia
                        </a>	
							
							</div>
					</div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Tecnológico Nacional de México</div>
                        Campus Tlahuac II 
					</div>
				</nav>
			</div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                          <h1 class="mt-4">Registro de la empresa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="principal.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Empresa</li>
                        </ol>
                
                        <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nueva Empresa</button>  
                
                        
                <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Datos de la Empresa</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                                    <thead>
                                        <tr>
                                        <th>Nombre</th>
                                        <th>RFC</th>
                                        <th>Direccion</th>                           
                                        <th>Telefono</th> 
                                        <th>Tipo</th> 
                                        <th>Giro</th>
                                        <th>Fecha Inicio</th>
                                        <th>Periodo</th>
                                        <th>Acciones</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <?php while($row = $resultado->fetch_assoc()) { ?>
                                                
                                        <tr>
                                            <td><?php echo $row['nombre']; ?></td>
                                            <td><?php echo $row['rfc']; ?></td>
                                            <td><?php echo $row['direccion']; ?></td>
                                            <td><?php echo $row['telefono']; ?></td>
                                            <td><?php echo $row['tipo']; ?></td>
                                            <td><?php echo $row['giro']; ?></td>
                                            <td><?php echo $row['fecha_alta']; ?></td>
                                            <td><?php echo $row['periodo']; ?></td>
                                            <td></td>
                                        </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                </div>
          
        
					
                        <!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">    
            <div class="modal-body">
                <div class="form-row">
                <div class="col-md-6">
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label class="col-form-label">RFC</label>
                <input type="text" class="form-control" name="rfc" id="rfc">
                </div>
                </div>
                </div>
                
                <div class="form-group">
                <label class="col-form-label">Direccion</label>
                <input type="tex" class="form-control" name="direccion" id="direccion">
                </div>

                <div class="form-row">
                <div class="col-md-6">
                <div class="form-group">
                <label class="col-form-label">Telefono</label>
                <input type="number" class="form-control" name="telefono" id="telefono">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label class="col-form-label">Tipo</label>
                <input type="tex" class="form-control" name="tipo" id="tipo">
                </div>
                </div>
                </div>

                <div class="form-group">
                <label class="col-form-label">Giro</label>
                <input type="tex" class="form-control" name="giro" id="giro">
                </div>

                <div class="form-row">
                <div class="col-md-6">
                <div class="form-group">
                <label class="col-form-label">Fecha de Inicio</label>
                <input type="tex" class="form-control" name="fecha" id="fecha">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label class="col-form-label">Periodo</label>
                <input type="tex" class="form-control" name="periodo" id="periodo">
                </div>
                </div>
                </div>
                </div>
            <div class="modal-footer">
                
                <input type="submit" class="btn btn-primary " value="Registrar">
                <input type="reset" class="btn btn-primary " value="Limpiar entradas">
                <button type="button" class="btn btn-primary " data-dismiss="modal">Cancelar</button>
                
            </div>
        </form>    
        </div>
    </div>
</div>  


    
				</main>

        <?php require_once "footer.php"?>
	</body>
</html>
