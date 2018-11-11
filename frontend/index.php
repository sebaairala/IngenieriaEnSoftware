<?php
/*=============================================
=            INCLUDE CONTROLADORES            =
=============================================*/
require_once "controladores/plantilla.controlador.php";


/*=====  End of INCLUDE CONTROLADORES  ======*/

/*=======================================
=            INCLUDE MODELOS            =
=======================================*/

require_once "modelos/rutas.php";

/*=====  End of INCLUDE MODELOS  ======*/



$plantilla = new ControladorPLantilla();
$plantilla-> plantilla();
 ?>