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
              <!-- <div class="card-tools">
	            <a href="<?=base_url('dashboard/admin/excel')?>" class="btn btn-tool" target="_blank">
	              <i class="fas fa-download"></i> <i class="fas fa-file-excel"></i> Download Excel
	            </a>
	          </div> -->
                <div class="row" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                    <div class="col-md-12">
                        <h4>Report Laporan</h4>
                    </div>
                </div>
                <form action="<?=base_url('dashboard/admin/excel')?>" method="post" target='_blank'>  

                <!-- <div class="row" style="height: 30px;">
                    <div class="form-group col-md-12">
                        <label for="petugas">Filter Report</label>
                    </div>
                </div> -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="petugas">Nama Petugas:</label>
                        <select class="form-control select2" name="petugas" id="select2-petugas" style="width: 100%;">
                          <option value="">Semua Petugas</option>
                          <?php foreach($pegawai as $t):?>
                          <option value="<?=$t->nama?>" <?php if($this->session->userdata('user_level') == 3) {?> selected='' <?php } else if(!empty($entri) && $entri['nama'] == $t->nama) {?>selected='' <?php }?>><?=$t->nama?></option>
                          <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="seksi">Seksi:</label>
                        <select class="form-control select2" name="seksi" id="select2-seksi" style="width: 100%;">
                            <option value="">Semua Seksi</option>
                            <option value="Sekretariat" <?php if(!empty($entri) && $entri['seksi'] == 'Sekretariat') {?>selected='' <?php }?>>Sekretariat</option>
                            <option value="Pemerintahan dan Layanan Publik" <?php if(!empty($entri) && $entri['seksi'] == 'Pemerintahan dan Layanan Publik') {?>selected='' <?php }?>>Pemerintahan dan Layanan Publik</option>
                            <option value="Ketentraman, Ketertiban Umum dan Pembangunan" <?php if(!empty($entri) && $entri['seksi'] == 'Ketentraman, Ketertiban Umum dan Pembangunan') {?>selected='' <?php }?>>Ketentraman, Ketertiban Umum dan Pembangunan</option>
                            <option value="Kesejahteraan Rakyat dan Perekonomian" <?php if(!empty($entri) && $entri['seksi'] == 'Kesejahteraan Rakyat dan Perekonomian') {?>selected='' <?php }?>>Kesejahteraan Rakyat dan Perekonomian</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="giat">Dasar Giat:</label>
                        <select class="form-control select2" name="giat" id="select2-giat" style="width: 100%;">
                            <option value="">Semua Giat</option>
                            <option value="LAPORAN WARGA" <?php if(!empty($entri) && $entri['giat'] == 'LAPORAN WARGA') {?>selected='' <?php }?>>LAPORAN WARGA</option>
                            <option value="KEJADIAN DARURAT" <?php if(!empty($entri) && $entri['giat'] == 'KEJADIAN DARURAT') {?>selected='' <?php }?>>KEJADIAN DARURAT</option>
                            <option value="KEGIATAN RUTIN" <?php if(!empty($entri) && $entri['giat'] == 'KEGIATAN RUTIN') {?>selected='' <?php }?>>KEGIATAN RUTIN</option>
                            <option value="ARAHAN PIMPINAN" <?php if(!empty($entri) && $entri['giat'] == 'ARAHAN PIMPINAN') {?>selected='' <?php }?>>ARAHAN PIMPINAN</option>
                            <?php foreach($giat as $g):?>
                            <option value="<?=$g->giat?>"><?=$g->giat?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label for="rt">RW:</label>
                              <select class="form-control select2" name="rw" id="select2-rw" style="width: 100%;">
                                    <option value="">Semua RW</option>
                                    <?php for ($i = 1; $i <= 8; $i++) {?>
                                        <option value="<?=$i?>" <?php if(!empty($entri) && $entri['rw'] == $i) {?>selected='' <?php }?>><?=$i?></option>
                                    <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label for="rt">RT:</label>
                            <select class="form-control select2" name="rt" id="select2-rt" style="width: 100%;">
                                    <option value="">Semua RT</option>
                                    <?php for ($i = 1; $i <= 17; $i++) {?>
                                        <option value="<?=$i?>" <?php if(!empty($entri) && $entri['rt'] == $i) {?>selected='' <?php }?>><?=$i?></option>
                                    <?php }?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 div-export-excel float-right" style="display: none;">
                        <button type="submit" class="btn btn-success btn-filter"><i class="fas fa-file-excel"></i> Export Excel</button>  
                    </div>
                </form>
                    <div class="form-group col-md-4">
                        <a href='#' class="btn btn-primary btn-filter">Tampilkan Report</a>
                    </div>
                </div>         
                <div class="row">
                    
                </div>
            </div>
            <div class="card-body">
                <div class="isi-tabel table-responsive">
                </div>
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