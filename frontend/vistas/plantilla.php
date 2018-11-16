<?php
 $url = Ruta::ctrRuta();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 	<title>Museo de Ciencias</title>

  

 	<!--=================================
 	=            CSS PLUGINS            =
 	==================================-->
 	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/css/fonts/style.css">
 	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
 	<!--====  End of CSS PLUGINS  ====-->

    <!--========================================
  =            CSS PERSONALIZADOS            =
  =========================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/css/inicio.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/css/plantilla.css">
  
  <!--====  End of CSS PERSONALIZADOS  ====-->

 	<!--============================================
 	=            PLUGINS SDE JAVASCRIPT            =
 	=============================================-->
 	<script type="text/javascript" src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>
  <script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.js"></script>
 	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/css/cabezote.css">
 	<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
 	<!--====  End of PLUGINS SDE JAVASCRIPT  ====-->
 	
 	
 </head>
 <body>
  
  <?php 
    include "modulos/menu.php"; 
  ?>
  <section class="section-cabezote" >
  <div class="barra-menu">
    <div class="row-menu4"><span class="icon-menu js-slideout-toggle"></span></div>
    <div class="row-menu1"><a href=""><p class="txt-menu">Museo de Ciencias</p></a></div>
    <div class="row-menu2"><input type="search" placeholder="Busca por Inventor o por Invento" name=""></div>
    <div class="row-menu3"><p class="txt-menu" data-toggle="modal" data-target="#loginModal">Ingresar </p> <p class="txt-menu">|</p> <p class="txt-menu" data-toggle="modal" data-target="#registerModal">Crear Cuenta</p></div>
  </div>  
</section>
<!--===================================
=            MODAL INGRESO            =
====================================-->

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ingreso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">@</span>
        </div>
        <input type="text" class="form-control" placeholder="E-mail" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text icon-lock" id="basic-addon1"></span>
        </div>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <a href="" class="lin-register">Olvide mi contraseña</a>
    <a href="" class="lin-register">Crear cuenta</a>
   </div>
  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Ingresar</button>
      </div>
    </div>
  </div>
</div>
<!--====  End of MODAL INGRESO  ====-->

<!--====================================
=            MODAL REGISTRO            =
=====================================-->

<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">@</span>
        </div>
        <input type="text" class="form-control" placeholder="E-mail" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text icon-lock" id="basic-addon1"></span>
        </div>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text icon-lock" id="basic-addon1"></span>
        </div>
        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Repite la password">
    </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Registrarme</button>
      </div>
    </div>
  </div>
</div>

<!--====  End of MODAL REGISTRO  ====-->

	<main id="panel">
 		 <?php
       if(isset($_GET["ruta"])){
   
          $rutas = explode("/", $_GET["ruta"]);
          $item = "ruta";
          $valor =  $rutas[0];

          include "modulos/cabezote.php";

          if($valor == 'inicio'){
            include "modulos/inicio.php"; 
          }else{
            //include "error404.php";
          }

        }else{
          include "modulos/cabezote.php";
          include "modulos/inicio.php"; 
          include "modulos/slide.php";
          include "modulos/destacados.php";
          include "modulos/footer.php";
        }
      ?>
  </main>

<script type="text/javascript" src="<?php echo $url; ?>vistas/js/plugins/slideout.min.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>vistas/js/prueba.js"></script>
<script>
  var slideout = new Slideout({
    'panel': document.getElementById('panel'),
    'menu': document.getElementById('menu'),
    'padding': 256,
    'tolerance': 70
  });
</script>
<script>
      window.onload = function() {
        document.querySelector('.js-slideout-toggle').addEventListener('click', function() {
          slideout.toggle();
        });

        document.querySelector('.menu').addEventListener('click', function(eve) {
          if (eve.target.nodeName === 'A') { slideout.close(); }
        });
      };
</script>  

<!--==========================================
   =            INICIALIZAR FLICKITY            =
   ===========================================-->
   <script type="text/javascript">
     $('.main-carousel').flickity({
      // options
       cellAlign: 'left',
       autoPlay: 3500,
       pauseAutoPlayOnHover: true,
       contain: true
    });
   </script>
   
   
   <!--====  End of INICIALIZAR FLICKITY  ====-->

 </body>
 </html>