$(document).ready(() => {

    $("#btnBusqueda").on("click", function(e) {
        e.preventDefault();

        let route = $("#formBusqueda").attr('action');
        let formData = $("#formBusqueda").serializeArray();

        console.log(formData);

        console.log(route); 

        $.ajax({
            type: "POST",
            url: route,
            data: formData,
            success: function(response){
                $("#boleta").html(response.boleta);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){

            }
        });
    });


});
