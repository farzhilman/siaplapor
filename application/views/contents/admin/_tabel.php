<table id="example1" class="table table-bordered table-striped table-condensed">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Pelapor</th>
      <th>Seksi</th>
      <th>Dasar Giat</th>
      <th>Alamat</th>
      <th>RT</th>
      <th>RW</th>
      <th>Hasil Tinjau Lokasi</th>
      <th>Saran Masukan</th>
      <th>Dokumentasi</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  	<?php $a=1; foreach($laporan as $l):?>
  	<tr>
  		<td><?=$a?></td>
  		<td><?=$l->petugas?></td>
    	<td><?=$l->seksi?></td>
    	<td><?=$l->giat?></td>
    	<td><?=$l->alamat?></td>
    	<td><?=$l->rt?></td>
    	<td><?=$l->rw?></td>
    	<td><?=$l->tinjau?></td>
    	<td><?=$l->saran?></td>
    	<td><?=$l->dokumentasi?></td>
    	<td style="text-align: center;">
    		<div class="btn-group-vertical">
  				<button type="button" class="btn bg-maroon btn-sm btn-hapus" id="btn-hapus-<?=$l->id?>" data-id="<?=$l->id?>" title="Hapus"><i class="fas fa-trash"></i></button>
			</div>
		</td>
  	</tr>
  	<?php $a++; endforeach;?>
  </tbody>
</table>

<script>
	$("#example1").DataTable({
	  	"responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 50, "pagination": true, "ordering": false
	});
    function sukses() {
        Swal.fire({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            icon: 'success',
            title: ' berhasil hapus.'
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