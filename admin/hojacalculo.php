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
        <title>Hoja de calculo</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<style type="text/css">
			.cont{
				height: 500px;
				
			}
		</style>

	<!-- librerias exel -->
		<!-- end meta block -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
		<script type="text/javascript" src="librerias/exel/codebase/spreadsheet.js?v=4.0.5"></script>
		<link rel="stylesheet" href="librerias/exel/codebase/spreadsheet.css?v=4.0.5">
		<link rel="stylesheet" href="librerias/exel/common/index.css?v=4.0.5">
		<link rel="stylesheet" href="librerias/exel/common/spreadsheet.css?v=4.0.5">
		<script type="text/javascript" src="librerias/exel/common/dataset.js?v=4.0.5"></script>
	<!-- fin de librerias -->

	</head>

	<?php require "menuadmin.php" ?>
		<!--Titulo-->
		<div class="container-fluid">
	    	<center><h1 class="mt-4">Área de uso general (Excel)</h1></center>
	    <ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active"><b>Instrucciones: </b>Este apartado será utilizando para la solución de los ítems de carácter general, que requieran el uso de Excel, solicitados en el Reactivo Integrador Multidisciplina. (RIM) . Así mismo, al terminar de realizar tu ejercicio deberás descargarlo en formato PDF para posteriormente poder subirlo en el apartado “Carga de archivos”.</li>
		</ol>
		</div>
		<!--Contenido dentro del div con margen-->
<div class="cont">
		<section class="dhx_sample-container">
			<div class="dhx_sample-container__widget" id="spreadsheet"></div>
		</section>
</div>

<script>
			var spreadsheet = new dhx.Spreadsheet("spreadsheet", {
				menu: true,
			});
			spreadsheet.parse(dataset);
			//antes de continuar tomar una cerbeza att: Jasmin Casas. carrera de gestion guiiiuuu :(
			spreadsheet.menu.data.add(
				{
					id: "validate",
					value: "Validate",
					items: [
						{
							id: "isNumber",
							value: "Is number",
						},
						{
							id: "isEven",
							value: "Is even number",
						},
					],
				},
				spreadsheet.menu.data.getLength() - 1
			);

			//
			spreadsheet.toolbar.data.add({
				type: "navItem",
				icon: "dxi dxi-delete",
				tooltip: "Remove all",
				id: "remove-all",
			});

			spreadsheet.toolbar.data.add({
				type: "button",
				icon: "dxi dxi-rotate-right",
				tooltip: "Restore all",
				id: "restore-all",
			});

			spreadsheet.toolbar.events.on("click", function (id) {
				if (id === "remove-all") {
					spreadsheet.parse([]);
				}
				if (id === "restore-all") {
					spreadsheet.parse(dataset);
				}
			});
			//


			function checkValue(check) {
				spreadsheet.eachCell(function (cell, value) {
					if (!check(value)) {
						spreadsheet.setStyle(cell, { background: "#e57373" });
					} else {
						spreadsheet.setStyle(cell, { background: "" });
					}
				}, spreadsheet.selection.getSelectedCell());
			}
			spreadsheet.menu.events.on("click", function (id) {
				switch (id) {
					case "isNumber":
						checkValue(function (value) {
							return !isNaN(value);
						});
						break;
					case "isEven":
						checkValue(function (value) {
							return value % 2 === 0;
						});
						break;
				}
			});
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