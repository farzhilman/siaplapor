<div class="content-wrapper" style="margin-top: 0px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="card card-pink card-outline" style="margin-bottom: 0px;">
        <div class="card-header" style="padding-bottom: 0px; padding-top: 5px; padding-right: 20px; border-bottom-width: 0px;">
          <div class="card-tools">
            <!-- <a href="<?=base_url('login')?>" class="btn btn-block btn-outline-success btn-sm"><i class="fa-regular fa-right-to-bracket"></i> Masuk</a> -->
          </div>
        </div>
        <div class="card-body" style="padding-top: 5px;padding-bottom: 10px;margin-left: 10px;">

          <div class="row justify-content-between">
            <div class="row-md-6">
              <div class="row">
                <div class="row-md-4">
                  <img src="<?=base_url('assets/img/30-k.png')?>" height="75px">
                </div>
                <div class="row-md-6" style="padding-left: 10px;">
                  LAPORAN HARIAN KEGIATAN KELURAHAN KETINTANG<br>
                  "SIAP LARI" Sistem Aplikasi Lapor Monitor
                </div>
              </div>
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
        <div class="col-lg-12">
          <div class="card card-pink card-outline">
            <div class="card-header">
              <p class="card-title m-0 keterangan" style="text-align: justify;">
                
              </p>  
            </div>
            <div class="card-body isi-form">
              <?=$_form?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    function sukses() {
        Swal.fire({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            icon: 'success',
            title: ' berhasil.'
        });
    }

    function gagal() {
        Swal.fire({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            icon: 'error',
            title: ' gagal. Mohon untuk tekan Ctrl + F5.'
        });
    }

    function pindah() {
       Swal.fire(
          'Good job!',
          'You clicked the button!',
          'success'
        )
    }
</script>

<?php 
if ($status == 'sukses') {
    echo "<script>sukses()</script>";
} else if($status == 'gagal') {
    echo "<script>gagal()</script>";
}
?>