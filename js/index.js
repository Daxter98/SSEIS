// global vars
const currentUser = JSON.parse(sessionStorage.getItem("user"));

// Password change
$('#form-password-change').submit(function (e) {
    e.preventDefault();

    const form = document.getElementById("form-password-change");
    const datosAcceso = form.querySelectorAll("input:not([type='button'])");
    [currentPassword, newPassword, confirmPassword] = datosAcceso;

    // Obviamente se puede obtener los datos directamente del form sin convertirlos a JSON antes pero por
    // practicidad y rapidez lo hacemos de esta forma
    let payload = {}
    datosAcceso.forEach(field => {
        payload[field.id] = field.value;
    });
    payload["id"] = currentUser.id;
    console.log(payload);
    
    if(currentUser.contrasena != currentPassword.value)
    {
        Swal.fire({
            title: 'Error!',
            text: 'La contraseña actual no coincide con los datos del usuario.',
            icon: 'error',
            confirmButtonText: 'OK'
          })
        return;
    }

    if(newPassword.value != confirmPassword.value){
        Swal.fire({
            title: 'Error!',
            text: 'Las contraseñas no coinciden.',
            icon: 'error',
            confirmButtonText: 'OK'
          })
        return;
    }

    $.ajax({
        type: "POST",
        url: 'modPassword.php',
        data: payload,
        beforeSend: function(){
          console.log("Enviando datos...");
        },
        success: function(response){

          result = JSON.parse(response);

          if(result.ok){
            // La actualizacion fue correcta, aplicamos cierre de sesion.

            // Borramos primero la sesion del usuario.
            sessionStorage.removeItem("user");

            // Rederigimos al inicio de sesion
            window.top.location.href = 'index.html';
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Ocurrio un erro al actualizar, verifique su información o contacte a T.I.'
            })
          } 
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            console.error(textStatus);
        }
      });
});