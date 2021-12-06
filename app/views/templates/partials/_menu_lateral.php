<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?=URL.'public/img/logo.png'?>"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">A.A.C</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=URL.'public/img/usuario.jpg'?>"  class="img-circle " alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->e($usuario)?></a>
          <a href="#" class="d-block"><?= $this->e($email)?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <img src="<?=URL.'public/img/mantenimiento.png'?>" alt="">
              <p>
                Mantenimiento
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=URL.'alumnos'?>" class="nav-link">
                  <img src="<?=URL.'public/img/alumnos.png'?>" alt="">
                  <p>Alumnos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=URL.'apoderados'?>" class="nav-link">
                  <img src="<?=URL.'public/img/apoderados.png'?>" alt="">
                  <p>Apoderados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=URL.'empleados'?>" class="nav-link">
                  <img src="<?=URL.'public/img/empleados.png'?>" alt="">
                  <p>Empleados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=URL.'madres'?>" class="nav-link">
                  <img src="<?=URL.'public/img/padres.png'?>" alt="">
                  <p>Madres</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=URL.'matriculas'?>" class="nav-link">
                  <img src="<?=URL.'public/img/matriculas.png'?>" alt="">
                  <p>Matriculas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=URL.'padres'?>" class="nav-link">
                  <img src="<?=URL.'public/img/padres.png'?>" alt="">
                  <p>Padres</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=URL.'traslados'?>" class="nav-link">
                  <img src="<?=URL.'public/img/traslados.png'?>" alt="">
                  <p>Traslados</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <img src="<?=URL.'public/img/seguridad.png'?>" alt="">
              <p>
                Seguridad
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=URL.'usuarios'?>" class="nav-link">
                  <img src="<?=URL.'public/img/usuarios.png'?>" alt="">
                  <p>Usuarios</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>