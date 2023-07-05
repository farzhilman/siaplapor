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
    <link rel="stylesheet" href="<?=base_url('assets/fonts/font-family-sans.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/plugins/toastr/toastr.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/dist/css/adminlte.min.css')?>">
    <link rel="shortcut icon" href="<?=base_url('assets/img/30.ico')?>"/>  
    <script>var base_url_js = '<?php echo base_url() ?>';</script>
  </head>

<style type="text/css">
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
  <body class="layout-top-nav layout-navbar-fixed">
    <div class="wrapper">
        <div class="preloader justify-content-center align-items-center">
            <img src="<?=base_url('assets/img/30-k.png')?>" alt="Kuisioner Bappedalitbang" height="200">
        </div>
      <nav class="main-header navbar navbar-expand-md navbar-light border-bottom-0 text-sm">
        <div class="container">
          <a href="#" class="navbar-brand">
          </a>
          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <?=$__navbar_page?>
        </div>
      </nav>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container">
            <div class="card card-pink card-outline" style="margin-bottom: 0px;">
              <div class="card-body">
                <div class="row">
                  <div class="row-md-4">
                    <img src="<?=base_url('assets/img/30-k.png')?>" height="75px">
                  </div>
                  <div class="row-md-8" style="vertical-align: middle; padding-left: 10px;">
                    Selamat Datang di<br>Badan Perencanaan Pembangunan Daerah, Penelitian dan Pengembangan<br>Kota Surabaya
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
              </div>
              <div class="col-md-4">
                <div class="card card-dark card-outline">
                  <div class="card-header">
                    <p class="card-title m-0 keterangan" style="text-align: justify;">
                        Masuk
                    </p>    
                  </div>
                  <div class="card-body isi-form">
                    <form class="login-form" action="<?=base_url('login/proses')?>" method="post">
                        <!-- <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>
                            <span> Enter any username and password. </span>
                        </div> -->
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Username</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control" autocomplete="off" placeholder="Username" name="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Password</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                              </div>
                              <input type="password" class="form-control" autocomplete="off" placeholder="Password" name="password">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success pull-right"> Masuk</button>
                            <a href="<?=base_url('')?>" class="btn btn-sm btn-info pull-left"> Kembali ke kuisioner</a>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
              </div>
            </div>
          </div>
        </div>
      </div>
      <aside class="control-sidebar control-sidebar-dark"></aside>
      <?=$__footer_page?>
    </div>

    <script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
    <script src="<?=base_url('assets/dist/js/adminlte.min.js')?>"></script>
    <!-- jQuery -->
    <script src="<?=base_url('assets/scripts/jquery.form.js')?>" type="text/javascript"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?=base_url('assets/plugins/jquery-ui/jquery-ui.js')?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="<?=base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/toastr/toastr.min.js')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/dist/js/adminlte.min.js')?>"></script>
    <script src="<?=base_url('assets/scripts/jquery.form.js')?>" type="text/javascript"></script>
  </body>
</html>

