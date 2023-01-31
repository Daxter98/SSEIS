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

                $("#boleta").html(result.boleta);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){

            }
        });
    });


});
