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
  <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>vistas/css/buscar.css">
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

	<main id="panel">
 		 <?php
       if(isset($_GET["ruta"])){
   
          $rutas = explode("/", $_GET["ruta"]);
          $item = "ruta";
          $valor =  $rutas[0];

          if($valor == 'inicio' ||  $valor=='buscar'){
            include "modulos/".$valor.".php"; 
          }else{
            //include "error404.php";
          }

          include "modulos/footer.php";
          
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