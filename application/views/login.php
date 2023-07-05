<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <!-- <meta http-equiv="refresh" content="1800; URL=<?=base_url()?>"> -->
    <meta name="description" content="bappedalitbang surabaya">
    <title><?php echo $_head_title.''.$_apps_title; ?></title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/plugins/toastr/toastr.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/dist/css/adminlte.min.css')?>">
    <link rel="shortcut icon" href="<?=base_url('assets/img/30.ico')?>"/>  
    <script>var base_url_js = '<?php echo base_url() ?>';</script>
  </head>
  <style type="text/css">
    body {
      background-color: #ff85b1;
      background-image: linear-gradient(45deg, #ff85b1 0%, #da1919 100%);
    }
  </style>

<body class="hold-transition login-page">
  <div class="preloader justify-content-center align-items-center">
      <img src="<?=base_url('assets/img/30-k.png')?>" alt="Kuisioner Bappedalitbang" height="200">
  </div>
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-warning">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Siap</b>LAPOR</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sistem Aplikasi Lapor Monitor</p>
        <p class="text-danger"><?php if($_msg != NULL){?><?=$_msg?><?php }?></p>
        <form id="form-login" action="<?=base_url('login/proses')?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary bg-red btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/dist/js/adminlte.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/toastr/toastr.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/jquery-validation/jquery.validate.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/jquery-validation/additional-methods.min.js')?>"></script>
<script src="<?=base_url('assets/scripts/gooder.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/scripts/gooder-4.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/scripts/jquery.form.js')?>" type="text/javascript"></script>
<script>
  $(document).ready(function () {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
  });
</script>
</body>
</html>
