<div class="content-wrapper" style="margin-top: 0px; background: white;">
<!-- /.content-header -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p></p>
          <button class="btn btn-primary no-print" onclick="window.print();"><i class="fas fa-print"></i> Cetak</button>
          <table class="table table-borderless">
            <tr>
              <th colspan="3" style="text-align: center"><h5>SURAT KETERANGAN REPLIKASI INOVASI</h5></th>
            </tr>
            <tr>
              <td colspan="3"><br><br><br>Yang bertanda tangan di bawah ini :</td>
            </tr>
            <tr>
              <td width="1px">Nama</td>
              <td width="1px">:</td>
              <td><?=$kunju->nama_pimpinan?></td>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td>:</td>
              <td><?=$kunju->jabatan_pimpinan?></td>
            </tr>
            <tr>
              <td>Instansi</td>
              <td>:</td>
              <td><?=$kunju->instansi?></td>
            </tr>
            <tr>
              <td colspan="3" style="text-align: justify;">Menerangkan bahwa dalam rangka <?=$kunju->tujuan?>, <?=$kunju->instansi?> akan melaksanakan kunjungan kerja ke Pemerintah Kota Surabaya pada tanggal <?=tgl_indo_tanpa_jam_($kunju->tanggal)?>. Sebagai tindak lanjut hasil kunjungan tersebut, <?=$kunju->instansi?> telah melakukan replikasi <?=$kunju->replikasi?> <?=$topik->topik?> yang ada pada Pemerintah Kota Surabaya.<br><br>Demikian surat keterangan ini dibuat untuk digunakan sebagaimana mestinya.</td>
            </tr>
          </table>
          <table class="table table-borderless">
            <tr>
              <td width="60%"></td>
              <td style="text-align: center"><?=$kunju->jabatan_pimpinan?><br><br><br><br><br></td>
            </tr>
            <tr>
              <td></td>
              <td style="text-align: center"><?=$kunju->nama_pimpinan?></td>
            </tr>
          </table>
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