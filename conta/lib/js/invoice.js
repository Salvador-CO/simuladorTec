$(document).on('ready', funcMain);


function funcMain()
{
	
	$("#add_row_encabezado").on('click',newRowTable1);
	

	
}


function newRowTable1()
{
	var empresa=document.getElementById("empresa").value;
	//var estado=document.getElementById("estado").value;
	var fec=document.getElementById("fec").value;
	
	var name_table=document.getElementById("tabla_datos");

	document.getElementById("nombre_empresa").innerHTML=empresa;
    //document.getElementById("nombre_estado").innerHTML=estado;
    document.getElementById("fecha_en").innerHTML=fec;

    localStorage.setItem('nombre', empresa);
    //localStorage.setItem('estado', 'Libro diario');
    localStorage.setItem('fecha', fec);

}



$(document).ready(function()
{
	var dato1 = localStorage.getItem('nombre');
	//var dato2 = localStorage.getItem('estado');
	var dato3 = localStorage.getItem('fecha');


    document.getElementById("nombre_empresa").innerHTML=dato1;
    //document.getElementById("nombre_estado").innerHTML=dato2;
    document.getElementById("fecha_en").innerHTML=dato3;
});