

function agregardatos(fecha,concepto,parcial,debe,haber){

	cadena="fecha=" + fecha + 
			"&concepto=" + concepto +
			"&parcial=" + parcial +
			"&debe=" + debe +
			"&haber=" + haber;

	$.ajax({
		type:"POST",
		url:"php/agregarDatos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				alertify.success("agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function agregaform(datos){

	d=datos.split('||');

	$('#id').val(d[0]);
	$('#fechau').val(d[2]);
	$('#conceptou').val(d[3]);
	$('#parcialu').val(d[4]);
	$('#debeu').val(d[5]);
	$('#haberu').val(d[6]);
	
}

function actualizaDatos(){


	id=$('#id').val();
	fecha=$('#fechau').val();
	concepto=$('#conceptou').val();
	parcial=$('#parcialu').val();
	debe=$('#debeu').val();
	haber=$('#haberu').val();
	

	cadena="id="+ id +
			"&fecha=" + fecha + 
			"&concepto=" + concepto +
			"&parcial=" + parcial +
			"&debe=" + debe +
			"&haber=" + haber;

	$.ajax({
		type:"POST",
		url:"php/actualizaDatos.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}