<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->e($titulo_pagina)?></title>
  <link rel="icon" href="<?= URL.'public/img/logo.ico'?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--Estilos Comunes-->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=URL.'public/css/all.min.css'?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=URL.'public/css/adminlte.min.css'?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="<?= URL.'public/css/sweetalert2.min.css'?>">

  <!--Estilos Personalizados-->
  <?= $this->section('mis_estilos')?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php require_once 'app/views/templates/partials/_menu_lateral.php';?>
  <?php require_once 'app/views/templates/partials/_menu.php';?>
  <?php require_once 'app/views/templates/partials/_cuerpo.php';?>
  <?php require_once 'app/views/templates/partials/_footer.php';?>
</div>
<?= $this->section('my_modals')?>
<!-- scripts Comunes-->
<!-- jQuery -->
<script src="<?=URL.'public/js/jquery.min.js'?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=URL.'public/js/bootstrap.bundle.min.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?=URL.'public/js/adminlte.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=URL.'public/js/demo.js'?>"></script>

<script src="<?= URL.'public/js/jquery.form.js'?>"></script>
<script src="<?= URL.'public/js/scripts/modal_crud.js'?>"></script>
<script src="<?= URL.'public/js/sweetalert2.min.js'?>"></script>

<!-- scripts Personalizados-->
<?= $this->section('mis_scripts')?>
</body>
</html>
