$(document).ready(() => {

    $("#btnBusqueda").on("click", function(e) {
        e.preventDefault();

        let route = $("#formBusqueda").attr('action');
        let formData = $("#formBusqueda").serializeArray();

        $.ajax({
            type: "POST",
            url: route,
            data: formData,
            success: function(response){
                let result = JSON.parse(response);

                console.log(result);
                $("#boleta").html(result.boleta);
                $("#nombre").html(`${result.nombres} ${result.a_paterno} ${result.a_materno}`);
                $("#correo-tutor").html(result.correo_tutor);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){

            }
        });
    });


});
