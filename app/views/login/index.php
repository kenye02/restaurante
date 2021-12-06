<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>I.E. A.A.C. | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=URL.'public/css/all.min.css'?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=URL.'public/css/icheck-bootstrap.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=URL.'public/css/adminlte.min.css'?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Colegio A.A.C.</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login</p>

      <form action="<?=URL.'login/acceso'?>" method="post">
        <div class="input-group mb-3">
          <input id="email" name="email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span><img src="https://img.icons8.com/ios-filled/50/000000/email-open.png" width="20px" height="20px"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="contra" name="contra" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span><img src="https://img.icons8.com/metro/26/000000/lock-2.png" width="20px" height="20px"/></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <a class="btn btn-dark btn-block btn-flat" href="<?=URL?>">Home</a>
          </div>
          <!-- /.col -->
          <div class="col-8">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Continuar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>-->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=URL.'public/js/jquery.min.js'?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=URL.'public/js/bootstrap.bundle.min.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?=URL.'public/js/adminlte.min.js'?>"></script>

</body>
</html>
