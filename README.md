# SSEIS
Repositorio para el proyecto de control escolar del CECyT #8.

## Requisitos
- Tener instalado previamente composer.
- PHP 8.0 o superior.

## ¿Cómo correr localmente?
Al clonar a la carpeta destino y con composer instalado, debemos ejecutar `composer install` para que en automatico se instale PHPSpreadSheet, de lo contrario no servira el cargado de archivos

## Ultimos cambios
[30/01/23]
- Se implementa la carga de archivos excel con los datos de los alumnos [autor>emadrigals]
- Se corrige parte de la busqueda de alumnos [autor>emadrigals]

[31/01/23]
- Se implementa el uso de almacenamiento de sesion para almacenar los datos del usuario actual
- Se implementa cambio de password con cierre de sesion.

[03/02/23]
- Se implementa que el sistema sea capaz de definir que vista cargar en base al nivel de acceso del usuario.

### TODO
- [X] Completar el ocultar opciones dependiendo del nivel de acceso del usuario.
