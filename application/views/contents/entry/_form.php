<form id="form-kunjungan" action="<?=base_url('dashboard/entry/submit_laporan')?>" method="POST" enctype="multipart/form-data">
  <div class="form-body">
        <div class="form-group">
            	<label for="petugas">Nama Petugas<code>*</code>:</label>
            <select class="form-control select2" name="petugas" id="select2-petugas" style="width: 100%;">
              <option></option>
              <?php foreach($pegawai as $t):?>
              <option value="<?=$t->nama?>"><?=$t->nama?></option>
              <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
          	<label for="seksi">Seksi<code>*</code>:</label>
          	<select class="form-control select2" name="seksi" id="select2-seksi" style="width: 100%;">
            		<option></option>
                <option>Sekretariat</option>
                <option>Pemerintahan dan Layanan Publik</option>
                <option>Ketentraman, Ketertiban Umum dan Pembangunan</option>
                <option>Kesejahteraan Rakyat dan Perekonomian</option>
          	</select>
        </div>
        <div class="form-group">
            <label for="giat">Dasar Giat<code>*</code>:</label>
            <select class="form-control select2" name="giat" id="select2-giat" style="width: 100%;">
              	<option></option>
              	<option>LAPORAN WARGA</option>
              	<option>KEJADIAN DARURAT</option>
              	<option>KEGIATAN RUTIN</option>
              	<option>ARAHAN PIMPINAN</option>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat<code>*</code>:</label>
            <input type="text" class="form-control form-control-border border-width-2" id="alamat" name='alamat' placeholder="Input alamat">
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="rt">RW<code>*</code>:</label>
	              <select class="form-control select2" name="rw" id="select2-rw" style="width: 100%;">
            			<option></option>
            			<?php for ($i = 1; $i <= 8; $i++) {?>
            				<option value="<?=$i?>"><?=$i?></option>
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
            				<option value="<?=$i?>"><?=$i?></option>
            			<?php }?>
          		</select>
            </div>
          </div>
        </div>
        <div class="form-group">
            <label for="tinjau">Hasil Tinjau Lokasi<code>*</code>:</label>
            <input type="text" class="form-control form-control-border border-width-2" id="tinjau" name='tinjau' placeholder="Input Hasil Tinjau Lokasi">
        </div>
        <div class="form-group">
            <label for="saran">Saran Masukan<code>*</code>:</label>
            <input type="text" class="form-control form-control-border border-width-2" id="saran" name='saran' placeholder="Input saran">
        </div>
        <div class="form-group">
            <label for="dokumentasi">Dokumentasi<code>*</code>:</label>
            <input type="text" class="form-control form-control-border border-width-2" id="dokumentasi" name='dokumentasi' placeholder="Input dokumentasi">
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
    });
</script>