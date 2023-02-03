$("body").on("submit", "citatorio_form", function() {
    $(this).submit(function() {
        return false;
    });
    return true;
});

$(document).on("click","#cerrar", function(){
    $('#citatorio_form')[0].reset();
    $('#incidencia_form')[0].reset();
    $('#modalcitatorio').modal('hide');
});

$(document).on("click","#callcita", function(){
    $('#mdltitulo').html('Citatorio');
    $('#citatorio_form');
    
    var boleta = $("#boleta").val();
    $("#hora_citat").html(boleta);
    $('#modalcitatorio').modal('show');
    $('#fecha_generada').val(new Date().toDateInputValue());

});

 

$(document).ready(function(){
    $("#boleta").change(function(){
        var boleta = $("#boleta").val()
        console.log("mi boleta "+boleta);
        $.post("./registroincidencia.php?op=get_alumno", {boleta : boleta}, function (data) {
            $("#nombre_al").html(data);
            console.log("datos: "+data);
        });
    });
  
})

$("#incidencia_form").submit(function(e) {
	e.preventDefault(); // avoid to execute the actual submit of the form.
	var form = $(this);
    var folio= $('#folio').val();
    $.ajax({
        url: "registroincidencia.php?op=registra_incidencia",
        type: "POST",
        data: form.serialize(),
        success: function(datos){    
            datos = JSON.parse(datos);
            console.log("boleta: "+datos);
            console.log("folio: "+folio);
            citatorio(folio,datos);

        }
    }); 
});

function citatorio(folio, boleta){
    $('#mdltitulo').html('Agregar Citatorio');
    $('#fecha_generada').val(new Date().toDateInputValue());
    
    $('#boleta_al').val(boleta);
    $('#folio_inc').val(folio);
    
    var boleta_al = $('#boleta_al').val();

        $.post("./registroincidencia.php?op=get_no_cita", {boleta_al : boleta_al}, function (data) {
            data = JSON.parse(data);
            console.log("boleta "+data.boleta);
            console.log("no_cita "+data.ncita);
            $('#no_cita').val(data.ncita);
        });

    /* TODO: Mostrar Modal */
    $('#modalcitatorio').modal('show');
}

 
$("#citatorio_form").submit(function(e) {
	e.preventDefault(); // avoid to execute the actual submit of the form.
	var form = $(this);
    $.ajax({
        url: "registroincidencia.php?op=citatorio",
        type: "POST",
        data: form.serialize(),
        success: function(data){    
            $('#citatorio_form')[0].reset();
            $('#incidencia_form')[0].reset();
            $("#modalcitatorio").modal('hide');
            
        }
    }); 
});


Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});