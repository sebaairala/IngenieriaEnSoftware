<!--=====================================
  =           MENU PRINCIPAL            =
  ======================================-->
  
   <section class="section-cabezote" >
  <div class="barra-menu">
    <div class="row-menu4"><span class="icon-menu js-slideout-toggle"></span></div>
    <div class="row-menu1"><a href="<?php echo $url; ?>inicio"><p class="txt-menu">Museo de Ciencias</p></a></div>
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
    <a href="" class="lin-register" data-toggle="modal" data-dismiss="modal" data-target="#recuperarModal">Olvide mi contraseña</a>
    <a href="" class="lin-register" data-toggle="modal" data-dismiss="modal" data-target="#registerModal">Crear cuenta</a>
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
     <a href="" class="lin-register" data-toggle="modal" data-dismiss="modal" data-target="#loginModal">Ya tengo cuenta</a>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Registrarme</button>
      </div>
    </div>
  </div>
</div>

<!--====  End of MODAL REGISTRO  ====-->

<!--============================================
=            RECUPERAR DATOS CUENTA            =
=============================================-->
<div class="modal fade" id="recuperarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Recuperar contraseña</h5>
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
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Recuperar</button>
      </div>
    </div>
  </div>
</div>


<!--====  End of RECUPERAR DATOS CUENTA  ====-->

  
  <nav id="menu" class="menu">
  		 <a href="https://github.com/mango/slideout" target="_blank">
        <header class="menu-header">
          <span class="menu-header-title">Museo de Ciencias</span>
        </header>
      </a>

      <section class="menu-section">
        <h3 class="menu-section-title">Docs</h3>
        <ul class="menu-section-list">
          <li><a href="https://github.com/mango/slideout#installation" target="_blank">Nosotros</a></li>
          <li data-toggle="modal" class="menu-slide-txt" data-target="#loginModal">Ingresar</li>
          <li data-toggle="modal" data-target="#registerModal" class="menu-slide-txt">Registrarme</li>
        </ul>
      </section>
	</nav>