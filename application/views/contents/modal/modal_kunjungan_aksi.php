<div class="modal-header">
	<h4 class="modal-title"><?=$title?></h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">×</span>
	</button>
</div>
<div class="modal-body">
	<div class="row table-responsive">
		<table class="table table-condensed table-bordered text-sm">
			<tr>
				<th width="10%" style="background-color: aliceblue;">Detil Kunjungan:</th>
				<td><?=$kunjungan->instansi?> - <?=$kunjungan->daerah?>. <b>PIC</b>: <?=$kunjungan->nama_pic?>; <?=$kunjungan->nomor_pic?>; <?=$kunjungan->email_pic?>.</td>
				<th width="10%" style="background-color: aliceblue;">telah ditindaklanjuti oleh:</th>
				<td style="vertical-align:middle;">
					<div class="div-bidang-nama">
						<?php if ($kunjungan->bidang_nama == NULL):?>
							<p class="text-info" style="margin-bottom: 0px;">-</p>
						<?php else:?>
							<?=$kunjungan->bidang_nama?>
						<?php endif;?>
					</div>
				</td>
			</tr>
			<tr>
				<th style="background-color: aliceblue;">Unggahan Foto / SPJ:</th>
				<td colspan="3">
					<div class="isi-upload-kunjungan-foto">
						<div class="row justify-content-center">
							<div class="col-md-12">
								<?php if (empty($isiupload)):?>
									<p class="text-info">belum ada file yang diunggah.</p>
								<?php else:?>
									<?php foreach ($isiupload as $ul):?>
										|
										<?php if(substr(strtolower($ul->nama_file), -3) == 'pdf'):?>
											<a style="margin-bottom: 5px; padding: 0px;" href="#" onclick="MyWindow=window.open('<?=base_url('uploaded/foto/'.$ul->id_kunjungan.'/'.$ul->nama_file)?>','MyWindow','width=700,height=600'); return false;" title="Klik untuk melihat"><i class="fa fa-file-pdf-o"></i> <?=$ul->nama_file?></a>
										<?php else: ?>
											<a href="<?=base_url('uploaded/foto/'.$ul->id_kunjungan.'/'.$ul->nama_file)?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-md-2" style="padding: 0px;">
								      	<img id="myImg" src="<?=base_url('uploaded/foto/'.$ul->id_kunjungan.'/'.$ul->nama_file)?>" class="img-fluid" alt='<?=$kunjungan->instansi?>' style="width: 100px; max-width: 100px;">
								      </a>
										<?php endif ?>
							      <button class="btn btn-xs bg-red btn-hapus-kunjungan-foto" id="btn-hapus-kunjungan-foto-<?=$ul->id?>" data-id="<?=$ul->id?>"><i class="fa fa-trash"></i></button> |
	                <?php endforeach;?>
								<?php endif ?>
              </div>
            </div>
          </div>
        </td>
			</tr>
			<tr>
				<th style="background-color: aliceblue;">Upload File:</th>
				<td colspan="3">
					<form action="#" enctype="multipart/form-data">
            <?php if($this->session->userdata('user_level') == 1):?>
            	<input name='kunjungan_foto' type='file' id='kunjungan_foto'>
            	<button type="submit" class='btn btn-xs btn-success' id="upload-kunjungan-foto" data-id="<?=$kunjungan->id?>"><i class="fas fa-file-upload"></i> Upload</button>
            	<p style="color: red">*berupa gambar / pdf (SPJ) [ jpg/png/pdf ]. Ukuran maks 2Mb.<br>Direkomendasikan mengunggah 2 file foto & 1 file SPJ.</p>
            <?php else:?>
            	<?php if($kunjungan->bidang_nama == NULL):?>
            		<input name='kunjungan_foto' type='file' id='kunjungan_foto'>
            		<button type="submit" class='btn btn-xs btn-success' id="upload-kunjungan-foto" data-id="<?=$kunjungan->id?>"><i class="fas fa-file-upload"></i> Upload</button>
            		<p style="color: red">*berupa gambar / pdf (SPJ) [ jpg/png/pdf ]. Ukuran maks 2Mb.<br>Direkomendasikan mengunggah 2 file foto & 1 file SPJ.</p>
            	<?php else:?>
              	<?php if($this->session->userdata('user_name') == $kunjungan->bidang_nama):?>
              		<input name='kunjungan_foto' type='file' id='kunjungan_foto'>
              		<button type="submit" class='btn btn-xs btn-success' id="upload-kunjungan-foto" data-id="<?=$kunjungan->id?>"><i class="fas fa-file-upload"></i> Upload</button>
              		<p style="color: red">*berupa gambar / pdf (SPJ) [ jpg/png/pdf ]. Ukuran maks 2Mb.<br>Direkomendasikan mengunggah 2 file foto & 1 file SPJ.</p>
              	<?php else:?>
              		<button type="submit" disabled class='btn btn-xs btn-success'><i class="fas fa-file-upload"></i> Upload</button>
              		<p class="text-info" style="margin-bottom: 0px;">Ditindaklanjuti oleh <?=$kunjungan->bidang_nama?></p>
              	<?php endif;?>
            	<?php endif;?>
            <?php endif;?>
        	</form>
        	<div id="pesan-upload-kunjungan-foto"></div>
				</td>
			</tr>
		</table>
	</div>
</div>
<!-- <div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
  <button type="button" class="btn btn-primary">Tindaklanjuti</button>
</div> -->

<script>
  $(function () {
    $('.select2-bidang').select2({
      placeholder: 'Pilih Bidang'
    })
  });
</script>