$(document).ready(() => {
  $('#itemAyuda').on('click', e => {
    e.preventDefault();
    Swal.fire({
      icon: 'info',
      text: 'Debes descargar el manual adecuado, según tu perfil',
      showCloseButton: true,
      showCancelButton: true,
      focusConfirm: false,
      confirmButtonText:
        '<a class="text-decoration-none text-white" href="https://www.saes.upiicsa.ipn.mx/Ayuda/Manuales/Manual%20Alumno.pdf" target="_blank"><i class="fas fa-graduation-cap"></i> Alumno</a>',
      confirmButtonAriaLabel: 'Alumno',
      cancelButtonText:
        '<a class="text-decoration-none text-white" href="https://www.saes.upiicsa.ipn.mx/Ayuda/Manuales/Manual%20Profesor.pdf" target="_blank"><i class="fas fa-chalkboard-teacher"></i> Profesor</a>',
      cancelButtonAriaLabel: 'Profesor'
    });
  });

  $('#itemPassword').on('click', e => {
    e.preventDefault();

    $('#inicio').hide();

    $('#recuperarPassword').show();
  });

  $('#itemInicio').on('click', e => {
    e.preventDefault();

    $('#recuperarPassword').hide();

    $('#inicio').show();
  });

  /*Inicio de sesión*/
  'use strict'
  var forms = document.querySelectorAll('.needs-validation')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  /*Fin de inicio de sesión*/

});
