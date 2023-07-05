<div class="content-wrapper" style="margin-top: 0px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      
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
            <div class="card-body isi-tabel">
              <?=$_tabel?>
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