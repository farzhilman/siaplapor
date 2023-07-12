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
    <meta name="description" content="">
    <title><?php echo $_head_title.''.$_apps_title; ?></title>
    <link rel="stylesheet" href="<?=base_url('assets/fonts/font-family-sans.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/dist/css/adminlte.css')?>">
    <link rel="shortcut icon" href="<?=base_url('assets/img/30.ico')?>"/>
    <script>var base_url_js = '<?php echo base_url() ?>';</script>
  </head>

<style type="text/css">
  table{
  /*  margin: 20px auto;*/
  /*  border-collapse: collapse;*/
  }
  table > thead > tr > th,
  table > tbody > tr > td{
    border: 1px solid black !important;
  }
</style>

<body>
  <?php
  // header("Content-type: application/vnd-ms-excel");
  header('Content-Disposition: attachment; filename="'.$nama_file.'.xls"');
  ?>

  <div class="fullcontent_bersih">
    <?php
    echo $__content_page;
    ?>
  </div>
  <script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?=base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
  <!-- AdminLTE App -->
  <script src="<?=base_url('assets/dist/js/adminlte.min.js')?>"></script>
</body>
</html>