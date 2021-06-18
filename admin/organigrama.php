<!-- *Copyright © Todos los derechos reservados DASHA 
Para cualquier duda y/o aclaración comunicarse a los correos: 
 - daniela.rojano.r@gmail.com  - antsanchezz12@gmail.com - salvador.camposorihuela@gmail.com-->

<html>
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <title>Organigrama</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<style type="text/css">
			.cont{
				height: 500px;
				
			}
		</style>

	<!-- Librerias organigrama-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
		<script type="text/javascript" src="librerias/codebase/diagram.js?v=3.0.4"></script>
		<link rel="stylesheet" href="librerias/codebase/diagram.css?v=3.0.4">
		<link rel="stylesheet" href="librerias/common/index.css?v=3.0.4">
		<link rel="stylesheet" href="librerias/common/diagram.css?v=3.0.4">
		<script type="text/javascript" src="librerias/common/customsvg.js"></script>
		<!-- custom sample head -->
		<script type="text/javascript" src="librerias/common/menu/menu.js?v=3.0.4"></script>
		<script type="text/javascript" src="librerias/codebase/diagramWithEditor.js?v=3.0.4"></script>
		<link rel="stylesheet" href="librerias/codebase/diagramWithEditor.css?v=3.0.4">
		<link href="https://cdn.materialdesignicons.com/4.5.95/css/materialdesignicons.min.css?v=3.0.4" media="all" rel="stylesheet" type="text/css">
		<style>
			.dhx_sample-container__without-editor {
				height: calc(100% - 121px);
			}
			.dhx_sample-container__with-editor {
				height: calc(100% - 61px);
			}
			.dhx_sample-widget {
				height: 100%;
			}
			.template {
				height: 100%;
				display: flex;
				align-items: center;
				justify-content: center;
				background: white;
				color: rgba(0, 0, 0, 0.7);
				border: 1px solid #DFDFDF;
				padding: 10px 12px;
			}
			.template span {
				display: flex;
			}
			.template h3, .template p {
				text-align: left;
				font-size: 14px;
				line-height: 20px;
				height: 20px;
				margin: 0 0 4px 0;
				overflow: hidden;
				text-overflow: ellipsis;
				white-space: nowrap;	
			}
			.template_container {
				height: 100%;
				width: 100%;
				overflow: hidden;
				position: relative;
			}
			.template_img-container {
				min-width: 93px;
				width: 93px;
				margin-right: 12px;
			}
			.template_img-container img {
				width: inherit;
				height: auto;
			}
			.template_icon {
				height: 20px;
				width: 20px;
				margin-right: 4px;
			}
			.toggle_container {
				position: absolute;
				right: 2px;
				top: 10px;
				cursor: pointer;
				height: 20px;
				width: 20px;
			}
			.toggle_container .template_icon {
				height: 14px;
				width: 4px;
				margin: 0;
			}
			.cont{
				height: 1000px;
				
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
		</style>
	</head>

	<?php require "menuadmin.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Organigrama <button type="button" class="btn btn-info btn-circle" data-toggle="modal" data-target="#btnPrueba" title="¡Da clic para obtener mas información!"><i class="fas fa-question"></i> </button></h1></center>
	    	<br>
	    <ol class="breadcrumb mb-4">
	    	<li class="breadcrumb-item active" style="text-align: justify;">
                <b> Instrucciones:</b> Diseñar el organigrama de la empresa, con base a la información proporcionada en el Reactivo Integrador Multidisciplina. (RIM), que muestre la estructura organizacional. Así mismo, al terminar de realizar tu ejercicio deberás descargarlo en formato PDF para posteriormente poder subirlo en el apartado “Carga de archivos”.</li>
		</ol>
		</div>
		<!-- modal de las Instrucciones -->
        <div id="btnPrueba" class="modal fade" style="z-index: 1400;" data-target="#btnPrueba">
            <div class="modal-dialog modal-lg" role="dialog" >
            <!-- Modal content-->
            <div class="modal-content">
                <div style="background: #1B396A; color: #fff; height: 75px;padding-left: 40px;">
                        <p><h3 class="modal-title col-11 text-center">Ayuda</h3></p>
                </div>
              <div class="modal-body">
                

                <embed src="../manual/Organigrama.pdf#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />
              </div>      
            </div>
          </div>
        </div>
		<!--Contenido dentro del div con margen-->
<div class="cont">
		<section id="control" class="dhx_sample-controls">
			<button class="dhx_sample-btn dhx_sample-btn--flat" onclick="runEditor()">Editar Nuevo Diagrama</button>
			<button class="dhx_sample-btn dhx_sample-btn--flat" onclick="diagram.export.pdf()">Exportar PDF</button>
			<button class="dhx_sample-btn dhx_sample-btn--flat" onclick="diagram.export.png()">Exportar PNG</button>
		</section>
		<section id="container" class="dhx_sample-container__without-editor">
			<div class="dhx_sample-widget" id="diagram"></div>
			<div class="dhx_sample-widget" id="editor" style="display: none;"></div>
		</section>
</div>
		<script>
			var diagram = new dhx.Diagram("diagram", {
				type: "org",
				defaultShapeType: "template"
			});
			
			var editor = new dhx.DiagramEditor("editor", {
				type: "org",
				shapeType: "template"
			});
			
			function template(config) {
				var template = '<section class="template">';
					template += '<div>';
					template += '<h3>'+ config.name +'</h3>';
					template += '<p>'+ config.post +'</p>';
					template += '<span>';
					template += '</span></div>';
					template += '</section>';
				return template;
			}

			diagram.addShape("template", {
				template: template,
				defaults: {
					height: 115,
					width: 330
				}
			});

			editor.diagram.addShape("template", {
				template: template,
				defaults: {
					name: "Nombre",
					post: "Agregar puesto",
	

					height: 115, width: 330
				},
				properties: [
					{ type: "position" },
					{ type: "size" },
					{ type: "text", label: "Nombre", property: "name" },
					{ type: "text", label: "Puesto", property: "post" },
					
									]
			});

			var item;

			diagram.events.on("ShapeClick", function (id) {
				item = diagram.data.getItem(id);
			});

			var contextMenu = new dhx.ContextMenu(null, {
				css: "dhx_widget--bg_gray"
			});

			



			var toggleItem;

			function show(event) {
				event.preventDefault();
				contextMenu.showAt(event.target, "bottom");
			}

			function showMenu() {
				dhx.awaitRedraw().then(function () {
					if (toggleItem) {
						for (var index = 0; index < toggleItem.length; index++) {
							toggleItem[index].removeEventListener("click", show);
						}
					}
					toggleItem = document.querySelectorAll(".toggle_container");
					for (var index = 0; index < toggleItem.length; index++) {
						toggleItem[index].addEventListener("click", show);
					}
				});
			}

			showMenu();

			diagram.events.on("afterexpand", function() {
				showMenu();           
			});

			var editorCont = document.querySelector("#editor");
			var diagramCont = document.querySelector("#diagram");
			var control = document.querySelector("#control");
			var container = document.querySelector("#container");
			
			var withEditor = "dhx_sample-container__with-editor";
			var withoutEditor = "dhx_sample-container__without-editor";

			function expand() {
				diagramCont.style.display = "none";
				control.style.display = "none";
				editorCont.style.display = "block";
				container.classList.remove(withoutEditor);
				container.classList.add(withEditor);
			}

			function collapse() {
				diagramCont.style.display = "block";
				control.style.display = "flex";
				editorCont.style.display = "none";
				container.classList.remove(withEditor);
				container.classList.add(withoutEditor);
			}

			function runEditor() {
				expand();
				editor.import(diagram);
			}

			editor.events.on("ApplyButton", function () {
				collapse();
				diagram.data.parse(editor.serialize());
			});

			editor.events.on("ResetButton", function () {
				collapse();
			});

			diagram.data.parse(medCardShape);
		</script>   	

	
		<!--Librerias del bostrap-->
	   	
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