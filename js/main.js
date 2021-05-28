$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Persona");            
    $("#modalCRUD").modal("show");   
        
});    
    
var fila; //capturar la fila para editar o borrar el registro

//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    //id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(0)').text();
    rfc = fila.find('td:eq(1)').text();
    direccion = fila.find('td:eq(2)').text();
    telefono = fila.find('td:eq(3)').text();
    tipo = fila.find('td:eq(4)').text();
    giro = fila.find('td:eq(5)').text();
    fecha = fila.find('td:eq(6)').text();
    periodo = fila.find('td:eq(7)').text();
    $("#nombre").val(nombre);
    $("#rfc").val(rfc);
    $("#direccion").val(direccion);
    $("#telefono").val(telefono);
    $("#tipo").val(tipo);
    $("#giro").val(giro);
    $("#fecha").val(fecha);
    $("#periodo").val(periodo);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Persona");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    nombre = $(this).closest("tr").find('td:eq(0)').text();
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+nombre+"?");
    if(respuesta){
        location.reload();
        $.ajax({
            url: "control/crudempresa.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, nombre:nombre},
            success: function(){
                tablaPersonas.row(fila.parents('tr')).remove().draw();
                location.reload();
            }
        });
    }   
});
    
   
    
});