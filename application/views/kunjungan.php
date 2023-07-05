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
                  Selamat Datang di<br>Badan Perencanaan Pembangunan Daerah, Penelitian dan Pengembangan<br>Kota Surabaya
                </div>
              </div>
            </div>
            <div class="row-md-4">
              <span>
              <a href="<?=base_url('login')?>" class="btn btn-block btn-outline-info btn-sm float-md-right"><i class="fas fa-lock"></i> Masuk</a>
              </span>
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
                Dalam rangka tertib administrasi penerimaan kunjungan kerja / <i>study</i> banding di lingkungan Badan Perencanaan Pembangunan Daerah, Penelitian dan Pengembangan Kota Surabaya, dimohon untuk melengkapi isian sebagai berikut:
              </p>  
            </div>
            <div class="card-body isi-form">
              <form id="form-kunjungan" action="<?=base_url('awal/submit_kunjungan')?>" method="POST" enctype="multipart/form-data">
                <div class="form-body">
                      <div class="form-group">
                          <label for="nama_pic">Nama PIC<code>*</code>:</label>
                          <input type="text" class="form-control form-control-border border-width-2" id="nama_pic" name='nama_pic' placeholder="Input nama PIC">
                      </div>
                      <div class="form-group">
                          <label for="nomor_pic">Nomor Handphone PIC<code>*</code>:</label>
                          <input type="number" class="form-control form-control-border border-width-2" id="nomor_pic" name='nomor_pic' min="0" placeholder="Input nomor HP PIC. contoh: 081234567890">
                      </div>
                      <div class="form-group">
                          <label for="email_pic">Email PIC<code>*</code>:</label>
                          <input type="text" class="form-control form-control-border border-width-2" id="email_pic" name='email_pic' placeholder="Input email PIC">
                      </div>
                      <div class="form-group">
                          <label for="daerah">Asal Daerah<code>*</code>:</label>
                          <input type="text" class="form-control form-control-border border-width-2" id="daerah" name='daerah' placeholder="Input asal daerah">
                      </div>
                      <div class="form-group">
                          <label for="instansi">Instansi<code>*</code>:</label>
                          <input type="text" class="form-control form-control-border border-width-2" id="instansi" name='instansi' placeholder="Input instansi">
                      </div>
                      <!-- Date and time -->
                      <div class="form-group">
                          <label>Tanggal & Jam Rencana Kunjungan<code>*</code>:</label>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="input-group date" id="tanggal" data-target-input="nearest">
                                      <input type="text" class="form-control datetimepicker-input" data-target="#tanggal" name="tanggal"/>
                                      <div class="input-group-append" data-target="#tanggal" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                            </div>
                            <div class="col-md-3">
                              <div class="bootstrap-timepicker">
                                  <div class="input-group date" id="waktu" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#waktu" name="waktu"/>
                                    <div class="input-group-append" data-target="#waktu" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="tempat_inap">Rencana Menginap di<code>*</code>:</label>
                            <input type="text" class="form-control form-control-border border-width-2" id="tempat_inap" name="tempat_inap" placeholder="Input nama Hotel/Homestay/Penginapan">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="lama_inap">Menginap selama<code>*</code>:</label>
                            <div class="row">
                              <div class="col-md-4">
                                <input type="number" class="form-control form-control-border border-width-2" id="lama_inap" min="0" name="lama_inap" placeholder="0">
                              </div>
                              <div class="col-md-2">hari</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                          <label for="jumlah_peserta">Jumlah Peserta<code>*</code>:</label>
                          <div class="row">
                            <div class="col-md-2">
                              <input type="number" class="form-control form-control-border border-width-2" id="jumlah_peserta" min="0" name="jumlah_peserta" placeholder="0">
                            </div>
                            <div class="col-md-4">orang</div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="nama_pimpinan">Nama Pimpinan Rombongan<code>*</code>:</label>
                        <input type="text" class="form-control form-control-border border-width-2" id="nama_pimpinan" placeholder="Input nama pimpinan" name="nama_pimpinan">
                      </div>
                      <div class="form-group">
                        <label for="jabatan_pimpinan">Jabatan Pimpinan Rombongan<code>*</code>:</label>
                        <input type="text" class="form-control form-control-border border-width-2" id="jabatan_pimpinan" placeholder="Input jabatan pimpinan" name="jabatan_pimpinan">
                      </div>
                      <div class="form-group">
                        <label for="tujuan">Tujuan Kunjungan<code>*</code>:</label>
                        <input type="text" class="form-control form-control-border border-width-2" id="tujuan" placeholder="Input tujuan dilakukannya kunjungan" name="tujuan">
                      </div>
                      <div class="form-group">
                        <label for="topik">Topik Kunjungan<code>*</code>:</label>
                        <!-- <input type="text" class="form-control form-control-border border-width-2" id="topik" placeholder="Input topik kunjungan" name="topik"> -->
                        <select class="form-control select2" name="topik" id="select2-topik" style="width: 100%;">
                          <option></option>
                          <?php foreach($topik as $t):?>
                          <option value="<?=$t->id?>"><?=$t->topik?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="replikasi">Hal yang ingin direplikasi dari Pemkot Surabaya<code>*</code>:</label>
                        <input type="text" class="form-control form-control-border border-width-2" id="replikasi" placeholder="Input hal yang ingin direplikasi" name="replikasi">
                      </div>
                      <div class="form-group">
                        <label for="pertanyaan">Daftar Pertanyaan<code>*</code>:&nbsp;</label><div class="text-info text-sm" style="display:inline-block;">(Klik tombol "tambah pertanyaan", jika ingin menambah pertanyaan)</div>
                        <input type="text" class="form-control form-control-border border-width-2" id="pertanyaan" placeholder="Input pertanyaan yang akan diajukan" name="pertanyaan">
                      </div>
                      <div class="div-plus-tanya-1">

                      </div>
                      <div class="row">
                        <div class="col-md-8">
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="btn btn-danger btn-block btn-sm btn-min-tanya" data-plus='1' style="display: none;"><i class="fa fa-trash"></i> hapus pertanyaan</button>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="btn btn-success btn-block btn-sm btn-plus-tanya" data-plus='1'><i class="fa fa-plus"></i> tambah pertanyaan</button>
                        </div>
                      </div>
                  </div>
                  <br>
                <div class="form-actions">
                      <input type="hidden" name="jumlah-tanya" value="">
                      <input class="btn btn-success" id="btn-submit-kunjungan" value="Simpan" type="submit"/>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(function () {
    $('.select2').select2({
      placeholder: 'Pilih Topik'
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