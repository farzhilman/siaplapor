<?=$__head_page?>

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
            <!-- <img src="<?=base_url('assets/img/30-k.png')?>" alt="Kuisioner Logo" class="brand-image img-circle"> -->
            <!-- <span class="brand-text font-weight-light"> - </span> -->
          </a>
          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <?=$__user_menu_page?>
          <?=$__navbar_page?>
        </div>
      </nav>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container" style="max-width: 1800px !important;">
          <!-- <div class="card card-pink card-outline" style="margin-bottom: 0px;">
            <div class="card-body">
              <div class="row">
                <div class="row-md-4">
                  <img src="<?=base_url('assets/img/30-k.png')?>" height="75px">
                </div>
                <div class="row-md-8" style="vertical-align: middle; padding-left: 10px;">
                  Selamat Datang<br>di Badan Perencanaan Pembangunan Daerah, Penelitian dan Pengembangan<br>Kota Surabaya
                </div>
              </div>
            </div>
          </div> -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
        <div class="content">
          <div class="container isi-konten" style="max-width: 1800px !important;">
            <?=$__content_page?>
          </div>
        </div>
      </div>
      <aside class="control-sidebar control-sidebar-dark"></aside>
      <?php
      // echo $__footer_page;
      ?>
    </div>

    <div class="modal fade no-print" id="modal-kunjungan-aksi" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content div-modal-kunjungan-aksi">
          
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
      
    <?=$__script_page?>
  </body>
</html>