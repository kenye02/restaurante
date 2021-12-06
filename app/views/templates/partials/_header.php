    <header>
      <nav class="navbar navbar-expand-lg navbar-dark  " style="background-color:#244584">
        <img src="<?= URL.'public/img/logo.png'?>" width="80px" class="ml-3">
        <a class="navbar-brand navbar-text font-weight-bolder text-white ml-2 w-100" href="<?= URL ?>">I.E. ANDERÉS AVELINO CÁCERES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"           data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav ml-auto">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="">
              <img src="<?=URL.'public/img/usuario.jpg'?>" width="30px" height="30px" alt=""><?= ' '.$this->e($usuario)?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="<?=URL.'login/intranet'?>" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> Ingresar
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?=URL.'login/index'?>" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> Login
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?=URL.'login/salir'?>" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> Cerrar Sesión
              </a>
            </div>
          </li>
        </ul>
      </nav>  
    </header>