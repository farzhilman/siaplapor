<div class="row">
    <div class="col-md-12 float-right">
        <button class="btn btn-success"><i class="fas fa-plus"></i> Tambah User</button>
    </div>
</div>
<table id="example1" class="table table-bordered">
  <thead>
    <tr>
      <th width="1px">No</th>
      <th width="1px">Username</th>
      <th>Nama</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $a=1; foreach($pegawai as $l):?>
    <tr <?php if($l->user_level == '1'){?> style='background-color: lightgrey;'<?php }?>>
        <td><?=$a?></td>
        <td><?=$l->user_id?></td>
        <td><?=$l->user_name?></td>
        <td>
            <?php if($l->user_level != '1'){?>
                <div class="btn-group">
                    <button type="button" class="btn btn-info">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger">
                      <i class="fas fa-trash"></i>
                    </button>
                </div>
            <?php }?>
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