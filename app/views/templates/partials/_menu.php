  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><img src="<?=URL.'public/img/menu.png'?>" width="20px" height="20px"></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="<?=URL.'public/img/usuario.jpg'?>" width="20px" height="20px" alt=""><?= ' '.$this->e($usuario)?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="<?=URL.'login/salir'?>" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Cerrar Sesión
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->