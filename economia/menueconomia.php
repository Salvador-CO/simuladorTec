<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: ../index.php");
	}
	  $nombre = $_SESSION['nombre'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    $nomUS =$_SESSION['usuario'];               
    $correo =$_SESSION['correo'];
    $escuela =$_SESSION['escuela'];
    $telefono =$_SESSION['telefono'];
?>
 
    <body class="sb-nav-fixed">
    <!--Menu superiro-->
     <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="../principal.php">Simulador CEA</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
       <!-- <ul class="">
            <input type="button" class="btn btn-outline-info" value="Calculadora" 
                onclick="javascript:window.open('vistas/calculadora.html','','width=400,height=310,toolbar=yes');" />
            <input type="button" class="btn btn-info" value="Calculadora" onclick="javascript:window.open('https://www.desmos.com/scientific?lang=es','','width=450,height=450,toolbar=yes');" />
        </ul>-->
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $nombre; ?> <!--dato nombre del usuario -->
                    <i class="fas fa-user-cog"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <font style="margin-left: 9%;" > <?php echo $nomUS; ?></font>
                    <div class="dropdown-divider"> </div>
                    
                    <a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt"></i> 
                       Salir
                    </a>
                </div>
            </li>
        </ul>
    </nav> <!--Fin del Menu superiro-->
    
    <div id="layoutSidenav">
        <!--menu lateral-->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!--menu si es usuario -->             
                        <?php if($tipo_usuario == 2) { ?>
                         <a class="nav-link"  href="../archivos.php"  >
                                <div class="sb-nav-link-icon"><i class="fas fa-file-pdf"></i></div>Carga de archivos 
                        </a>
                        <a class="nav-link" >
                            <div class="sb-nav-link-icon"><i class="fas fa-calculator"></i></div>
                             <input style="border: none; background: none; color:#fff;"   type="button" value="Calculadora" onclick="javascript:window.open('https://www.desmos.com/scientific?lang=es','','width=450,height=450,toolbar=yes');" />
                        </a>
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#RIM" >
                                <div class="sb-nav-link-icon"><i class="fas fa-file-invoice-dollar"></i></div>RIM 
                        </a>
                        <?php } ?>
                        <!--fin del menu si es usuario -->

                        <!--menu si es usuario administrador-->             
                        <?php if($tipo_usuario == 1) { ?>
                        <a class="nav-link" href="../admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Registro de usuarios
                        </a>
                        <a class="nav-link" href="../archivos.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-folder-open"></i></div>Archivos
                        </a>
                        <?php } ?>
    					<!--fin del menu si es usuario administrador-->
                    <!--menu principal simple-->
                    <!--
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-columns"></i>
                            </div>
                            Menu principal 
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="vistaclientes.php">Contabilidad</a>
                                <a class="nav-link" href="proveedores.php">Administracion</a>
                                <a class="nav-link" href="vistaclientes.php">Economia</a>
                                <a class="nav-link" href="proveedores.php">Finanzas</a>
                            </nav>
                        </div> 
                    -->
                    <!--fin del menu principal simple-->
                <!--munu desplegable principal-->
                        <!--inicio del menu con submenu-->  
                            <div class="sb-sidenav-menu-heading">Áreas</div>
                        <!--menu de conta-->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#conta" aria-expanded="false" aria-controls="conta">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-donate"></i>
                                </div>
                                Contabilidad <!--titulo principal del sub menu-->
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                                <div class="collapse" id="conta" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="../conta/libro_diario.php">Libro de diario</a>
                                        <a class="nav-link" href="../conta/tarjeta.php">Tarjeta de almacén</a>
                                        <a class="nav-link" href="../conta/libro_mayor.php">Libro mayor</a>
                                        <a class="nav-link" href="../conta/balanza_comprobacion.php">Balanza de comprobación</a>
                                        <a class="nav-link" href="../conta/estado_resultados.php">Estado de resultados</a>
                                        <a class="nav-link" href="../conta/balance_general.php">Estado de situación financiera</a>
                                        <a class="nav-link" href="../conta/flujo_efectivo.php">Estado de flujos de efectivo</a>
                                        <a class="nav-link" href="../conta/variacion_capcontable.php">Estado de variaciones en el capital contable</a>
                                        <a class="nav-link" href="../conta/costos_prodvent.php">Estado de costos de producción y venta</a>
                                        <a class="nav-link" href="../conta/analisis_financiero.php">Análisis financiero</a>
                                        <a class="nav-link" href="../conta/tecnicas_proyectos.php">Técnicas de evaluación de proyectos</a>
                                    </nav>
                                </div>
                        <!--fin del menu de conta-->

                        <!--menu de admin-->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin" aria-expanded="false" aria-controls="admin">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-paste"></i>
                                </div>
                                Administración <!--titulo principal del sub menu-->
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                                <div class="collapse" id="admin" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="../admin/espacioredaccion.php">Área de uso general (Word)</a>
                                        <a class="nav-link" href="../admin/hojacalculo.php">Área de uso general (Excel)</a>
                                        <a class="nav-link" href="../admin/flujo.php">Diagrama de flujo</a>
                                        <a class="nav-link" href="../admin/organigrama.php">Organigrama</a>
                                        <a class="nav-link" href="../admin/analisisfoda.php">Análisis FODA</a>
                                        <a class="nav-link" href="../admin/matrizfoda.php">Matriz FODA</a>
                                        <a class="nav-link" href="../admin/analisisbcg.php">Análisis BCG</a>
                                        <a class="nav-link" href="../admin/matrizbcg.php">Diseño de estrategias matriz BCG</a>
                                        <a class="nav-link" href="../admin/analisisbsc.php">Análisis de Balanced Score Card</a>
                                        <a class="nav-link" href="../admin/mapaestra.php">Diseño de mapa estratégico BSC</a>
                                        <a class="nav-link" href="../admin/gant.php">Diagrama de Gantt</a>
                                        <a class="nav-link" href="../admin/arbol.php">Árbol de deciones</a>
                                        <a class="nav-link" href="../admin/ciclovida.php">Ciclo de vida del producto</a>
                                        <a class="nav-link" href="../admin/rutacritica.php">Ruta crítica</a>
                                        <a class="nav-link" href="../admin/espina.php">Espina de pescado</a>
                                    </nav>
                                </div>
                        <!--fin del menu de admin-->

                         <!--menu de Economia-->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#economia" aria-expanded="false" aria-controls="economia">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-chart-area"></i>
                                </div>
                                Economía <!--titulo principal del sub menu-->
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                                <div class="collapse" id="economia" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="espacioredaccion.php">Area de uso general</a>
                                        <a class="nav-link" href="regresionlineal.php">Regresion lineal</a>
                                        <a class="nav-link" href="modelo_islm.php">Modelo IS-LM</a>
                                        <a class="nav-link" href="balanzap.php">Balanza de pagos</a>
                                        <a class="nav-link" href="pos_producion.php">Posibilidades de produccion</a>
                                        <a class="nav-link" href="pun_saturacion.php">Punto de saturacion</a>
                                        <a class="nav-link" href="punt_equilibrio.php">Punto de equilibrio</a>
                                        <a class="nav-link" href="Cobbdouglas.php">Cobb Douglas</a>
                                    </nav>
                                </div>
                        <!--fin del menu de Economia-->


                        <div class="sb-sidenav-menu-heading">Extras </div> 
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#formulas" >
                                <div class="sb-nav-link-icon">
                                    <i class="far fa-file-alt"></i>
                                </div>
                               Formulario 
                            </a>
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#forgen" >
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-square-root-alt"></i>
                                </div>
                               Formula General
                            </a>
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#derivada" >
                                <div class="sb-nav-link-icon">
                                    <img src="../iconos/fx.png" width="20px" height="20px">
                                </div>
                               Derivada
                            </a>
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#integral" >
                                <div class="sb-nav-link-icon">
                                    <img src="../iconos/integral.png" width="20px" height="20px">
                                </div>
                               Integral definida
                            </a>
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#solecua" >
                                <div class="sb-nav-link-icon">   
                                    <img src="../iconos/fx.png" width="20px" height="20px">
                                </div>
                               Despejador de ecuaciones
                            </a>

                	</div>
    			</div>
                <!--footer del menu-->
                <div class="sb-sidenav-footer">
                    <div class="text-muted">
                    <font size="1" face="Garamond" color="#E5E7E9">Copyright &copy; Todos los derechos reservados <b>Tecnológico Nacional de México</b></font>
                    </div>
    			</div><!--fin footer del menu-->

    		</nav>
    	</div><!--fin del menu lateral-->
        <!--modal economia-->
        <!-- modal RIM -->
        <div id="RIM" class="modal fade" role="dialog" style="z-index: 1400;">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content" >
              <div class="modal-header" style="background: #1B396A; color: #fff;">
                   <h3 class="modal-title col-11 text-center"><center>Archivos del RIM</center></h3>
                </div>
              <div class="modal-body">
                    <iframe src="../verus.php" width="100%" height="450px"></iframe>
              </div>      
            </div>
          </div>
        </div>
        <!-- modal RIM-->
          <div id="formulas" class="modal fade" style="z-index: 1400;">
            <div class="modal-dialog modal-lg" role="dialog" >
            <!-- Modal content-->
            <div class="modal-content">
                <div style="background: #1B396A; color: #fff; height: 60px;padding-left: 40px;">
                        <p><h3 class="modal-title col-11 text-center">Formulario de ciencias economico administrativas</h3></p>
                </div>
              <div class="modal-body">
                <embed src="../anexos/archivetempFormulario.pdf#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="490px" />
              </div>      
            </div>
          </div>
        </div>



        <div id="forgen" class="modal fade" style="z-index: 1400;">
            <div class="modal-dialog modal-lg" role="dialog" >
            <!-- Modal content-->
            <div class="modal-content">
                <div style="background: #1B396A; color: #fff; height: 75px;padding-left: 40px;">
                        <p><h3 class="modal-title col-11 text-center">Calculadora de ecuaciones cuadráticas</h3></p>
                </div>
              <div class="modal-body">
                <iframe src="formulas/formulagen.php" width="100%" height="450px" style="border:0px"></iframe>
              </div>      
            </div>
          </div>
        </div>

        <div id="derivada" class="modal fade" style="z-index: 1400;">
            <div class="modal-dialog modal-lg" role="dialog" >
            <!-- Modal content-->
            <div class="modal-content">
                <div style="background: #1B396A; color: #fff; height: 75px;padding-left: 40px;">
                        <p><h3 class="modal-title col-11 text-center">Derivadas <i>U<sup>n</sup></i></h3></p>
                </div>
              <div class="modal-body">
                    <div class="alert alert-info alert-dismissible fade show" style="font-size: 14px;" role="alert">
                        <ul class="list-unstyled" style="margin-bottom: 0;">
                          <li><strong>Nota:</strong> Para tener ayuda dirigete a la pestaña <strong>Guia</strong>.</li>
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <iframe src="derivada/index.html" width="100%" height="450px" style="border:none"></iframe>
              </div>      
            </div>
          </div>
        </div>

        <div id="integral" class="modal fade" style="z-index: 1400;">
            <div class="modal-dialog modal-lg" role="dialog" >
            <!-- Modal content-->
            <div class="modal-content">
                <div style="background: #1B396A; color: #fff; height: 65px;padding-left: 40px;">
                        <p><h3 class="modal-title col-11 text-center">Integrales definidas</h3></p>
                </div>
              <div class="modal-body">
                <div class="alert alert-info alert-dismissible fade show" style="font-size: 14px;" role="alert">
                        <ul class="list-unstyled" style="margin-bottom: 0;">
                          <li><strong>Nota:</strong> Para tener ayuda dirigete a la pestaña <strong>Guia</strong>.</li>
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <iframe src="integral/index.html" width="100%" height="450px" style="border:none"></iframe>
              </div>      
            </div>
          </div>
        </div>

        <div id="solecua" class="modal fade" style="z-index: 1400;">
            <div class="modal-dialog modal-lg" role="dialog" >
            <!-- Modal content-->
            <div class="modal-content">
                <div style="background: #1B396A; color: #fff; height: 65px;padding-left: 40px;">
                        <p><h3 class="modal-title col-11 text-center">Solucionador de ecuaciones</h3></p>
                </div>
              <div class="modal-body">
                    <iframe src="formulas/sol.html" width="100%" height="450px" frameborder="0"></iframe>
                </div>      
            </div>
          </div>
        </div>

        <div id="layoutSidenav_content">
        <main>
            <!--continua en los archivos-->

			
       

