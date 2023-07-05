<p>Berikut rincian isian:<br>
<ul>
	<li>Kunjungan dari: <?=$instansi?>, <?=$daerah?>.</li>
	<li>PIC: <?=$nama_pic?> - <?=$nomor_pic?> - <?=$email_pic?>.</li>
	<li>Menginap di <?=$tempat_inap?>, selama <?=$lama_inap?> hari.</li>
	<li>Jam dan Tanggal Kunjungan: <?=$waktu?>, <?=tgl_indo_tanpa_jam_blm_db($tanggal)?>.</li>
	<li>dengan peserta: <?=$jumlah_peserta?> orang.</li>
	<li>Pimpinan: <?=$nama_pimpinan?>, <?=$jabatan_pimpinan?>.</li>
	<li>Tujuan Kunjungan: <?=$tujuan?>.</li>
	<li>Topik Kunjungan: <?=$topik->topik?>.</li>
	<li>Hal yang ingin direplikasi: <?=$replikasi?>.</li>
</ul>
Dengan Pertanyaan:
<ol>
	<?php foreach($pertanyaan as $p):?>
	<li><?=$p->pertanyaan?></li>
	<?php endforeach;?>
</ol>
</p>
<p>
	<a href="<?=base_url('cetak/preview/'.$id->id)?>" target='_blank' class="btn btn-xl btn-primary"> Cetak Surat Keterangan Replikasi Inovasi</a>
</p>

<div class="row">
	<div class="col-md-4">
		<a href="<?=base_url('')?>" class="btn btn-xl btn-info"> Kembali</a>
		<!-- <button class="btn btn-xl btn-info btn-kembali-kunjungan"> Kembali</button> -->
	</div>
</div>