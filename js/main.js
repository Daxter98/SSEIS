$(document).ready(() => {
    $('#btnLogin').on('click', function(e) {
      
      e.preventDefault();

      let $this = $(this);
      let form = "#form";
      let formData = $(form).serializeArray();
      let route = $(form).attr('action');
      let caption = $this.html();

      $.ajax({
        type: "POST",
        url: route,
        data: formData,
        beforeSend: function(){
          $this.attr('disabled', true).html("Procesando...");
        },
        success: function(response){
          $this.attr('disabled', false).html(caption);

          result = JSON.parse(response);

          if(result.ok){
            location.href = 'vista_administrador.html';
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Las credenciales introducidas no son validas, verifique su informacion.'
            })
          } 
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){

        }
      });
    });
  // $('#itemAyuda').on('click', e => {
  //   e.preventDefault();
  //   Swal.fire({
  //     icon: 'info',
  //     text: 'Debes descargar el manual adecuado, según tu perfil',
  //     showCloseButton: true,
  //     showCancelButton: true,
  //     focusConfirm: false,
  //     confirmButtonText:
  //       '<a class="text-decoration-none text-white" href="https://www.saes.upiicsa.ipn.mx/Ayuda/Manuales/Manual%20Alumno.pdf" target="_blank"><i class="fas fa-graduation-cap"></i> Alumno</a>',
  //     confirmButtonAriaLabel: 'Alumno',
  //     cancelButtonText:
  //       '<a class="text-decoration-none text-white" href="https://www.saes.upiicsa.ipn.mx/Ayuda/Manuales/Manual%20Profesor.pdf" target="_blank"><i class="fas fa-chalkboard-teacher"></i> Profesor</a>',
  //     cancelButtonAriaLabel: 'Profesor'
  //   });
  // });

  // $('#itemPassword').on('click', e => {
  //   e.preventDefault();

  //   $('#inicio').hide();

  //   $('#recuperarPassword').show();
  // });

  // $('#itemInicio').on('click', e => {
  //   e.preventDefault();

  //   $('#recuperarPassword').hide();

  //   $('#inicio').show();
  // });

  // /*Inicio de sesión*/
  // 'use strict'
  // var forms = document.querySelectorAll('.needs-validation')
  // Array.prototype.slice.call(forms)
  //   .forEach(function (form) {
  //     form.addEventListener('submit', function (event) {
  //       if (!form.checkValidity()) {
  //         event.preventDefault()
  //         event.stopPropagation()
  //       }
  //       form.classList.add('was-validated')
  //     }, false)
  //   })
  // /*Fin de inicio de sesión*/
});
