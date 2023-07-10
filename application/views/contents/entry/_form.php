<form id="form-kunjungan" action="<?=base_url('dashboard/entry/submit_laporan')?>" method="POST" enctype="multipart/form-data">
  <div class="form-body">
        <div class="form-group">
            	<label for="petugas">Nama Petugas<code>*</code>:</label>
            <select class="form-control select2" name="petugas" id="select2-petugas" style="width: 100%;">
              <option></option>
              <?php foreach($pegawai as $t):?>
              <option value="<?=$t->nama?>" <?php if($this->session->userdata('user_level') == 3) {?> selected='' <?php } else if(!empty($entri) && $entri['nama'] == $t->nama) {?>selected='' <?php }?>><?=$t->nama?></option>
              <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
          	<label for="seksi">Seksi<code>*</code>:</label>
          	<select class="form-control select2" name="seksi" id="select2-seksi" style="width: 100%;">
            		<option></option>
                <option <?php if(!empty($entri) && $entri['seksi'] == 'Sekretariat') {?>selected='' <?php }?>>Sekretariat</option>
                <option <?php if(!empty($entri) && $entri['seksi'] == 'Pemerintahan dan Layanan Publik') {?>selected='' <?php }?>>Pemerintahan dan Layanan Publik</option>
                <option <?php if(!empty($entri) && $entri['seksi'] == 'Ketentraman, Ketertiban Umum dan Pembangunan') {?>selected='' <?php }?>>Ketentraman, Ketertiban Umum dan Pembangunan</option>
                <option <?php if(!empty($entri) && $entri['seksi'] == 'Kesejahteraan Rakyat dan Perekonomian') {?>selected='' <?php }?>>Kesejahteraan Rakyat dan Perekonomian</option>
          	</select>
        </div>
        <div class="form-group">
            <label for="giat">Dasar Giat<code>*</code>:</label>
            <select class="form-control select2" name="giat" id="select2-giat" style="width: 100%;">
              	<option></option>
              	<option <?php if(!empty($entri) && $entri['giat'] == 'LAPORAN WARGA') {?>selected='' <?php }?>>LAPORAN WARGA</option>
              	<option <?php if(!empty($entri) && $entri['giat'] == 'KEJADIAN DARURAT') {?>selected='' <?php }?>>KEJADIAN DARURAT</option>
              	<option <?php if(!empty($entri) && $entri['giat'] == 'KEGIATAN RUTIN') {?>selected='' <?php }?>>KEGIATAN RUTIN</option>
              	<option <?php if(!empty($entri) && $entri['giat'] == 'ARAHAN PIMPINAN') {?>selected='' <?php }?>>ARAHAN PIMPINAN</option>
                <?php foreach($giat as $g):?>
                <option><?=$g->giat?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat<code>*</code>:</label>
            <input type="text" class="form-control form-control-border border-width-2" id="alamat" name='alamat' placeholder="Input alamat" <?php if(!empty($entri)) {?>value="<?=$entri['alamat']?>" <?php }?>>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="rt">RW<code>*</code>:</label>
	              <select class="form-control select2" name="rw" id="select2-rw" style="width: 100%;">
            			<option></option>
            			<?php for ($i = 1; $i <= 8; $i++) {?>
            				<option value="<?=$i?>" <?php if(!empty($entri) && $entri['rw'] == $i) {?>selected='' <?php }?>><?=$i?></option>
            			<?php }?>
          		</select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="rt">RT<code>*</code>:</label>
	            <select class="form-control select2" name="rt" id="select2-rt" style="width: 100%;">
            			<option></option>
            			<?php for ($i = 1; $i <= 17; $i++) {?>
            				<option value="<?=$i?>" <?php if(!empty($entri) && $entri['rt'] == $i) {?>selected='' <?php }?>><?=$i?></option>
            			<?php }?>
          		</select>
            </div>
          </div>
        </div>
        <div class="form-group">
            <label for="tinjau">Hasil Tinjau Lokasi<code>*</code>:</label>
            <input type="text" class="form-control form-control-border border-width-2" id="tinjau" name='tinjau' placeholder="Input Hasil Tinjau Lokasi" <?php if(!empty($entri)) {?>value="<?=$entri['tinjau']?>" <?php }?>>
        </div>
        <div class="form-group">
            <label for="saran">Saran Masukan<code>*</code>:</label>
            <input type="text" class="form-control form-control-border border-width-2" id="saran" name='saran' placeholder="Input saran" <?php if(!empty($entri)) {?>value="<?=$entri['saran']?>" <?php }?>>
        </div>
        <div class="form-group">
            <label for="tindaklanjut">Tindak Lanjut<code>*</code>:</label>
            <select class="form-control select2" name="tindaklanjut" id="select2-tindaklanjut" style="width: 100%;">
                <option></option>
                <option <?php if(!empty($entri) && $entri['tindaklanjut'] == 'Sudah Ditindaklanjuti') {?>selected='' <?php }?>>Sudah Ditindaklanjuti</option>
                <option <?php if(!empty($entri) && $entri['tindaklanjut'] == 'Perlu Ditindaklanjuti') {?>selected='' <?php }?>>Perlu Ditindaklanjuti</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dokumentasi">Dokumentasi<code>*</code>:</label>
            <div class="custom-file">
              <input type="file" class="form-control custom-file-input" id="customFile" name='dokumentasi'>
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
    </div>
    <br>
  <div class="form-actions">
        <input class="btn btn-success" id="btn-submit-kunjungan" value="Simpan" type="submit"/>
    </div>
</form>

<script>
  $(function () {
      //Initialize Select2 Elements
      $('.select-pindah-pd').select2()
      $('#select2-petugas').select2({
        placeholder: 'Pilih Nama Petugas'
      })
      $('#select2-seksi').select2({
        placeholder: 'Pilih Seksi'
      })
      $('#select2-giat').select2({
        placeholder: 'Pilih Dasar Giat'
      })
      $('#select2-rw').select2({
        placeholder: 'Pilih RW'
      })
      $('#select2-rt').select2({
        placeholder: 'Pilih RT'
      })

      $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
      $('#tanggal').datetimepicker({
          format:'L'
      });
      $('#waktu').datetimepicker({
        format: 'HH:mm'
      });
      bsCustomFileInput.init();
    });
</script>