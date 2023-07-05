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