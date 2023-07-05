<script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/moment/moment.min.js')?>"></script>
<!-- date-range-picker -->
<script src="<?=base_url('assets/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
<script src="<?=base_url('assets/dist/js/adminlte.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')?>"></script>
<!-- <script src="<?=base_url('assets/dist/js/demo.js')?>"></script> -->
<!-- jQuery -->
<script src="<?=base_url('assets/scripts/jquery.form.js')?>" type="text/javascript"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url('assets/plugins/jquery-ui/jquery-ui.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?=base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/toastr/toastr.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/dist/js/adminlte.min.js')?>"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/plugins/select2/js/select2.full.min.js')?>"></script>
<!-- jquery-validation -->
<script src="<?=base_url('assets/plugins/jquery-validation/jquery.validate.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/jquery-validation/additional-methods.min.js')?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/jszip/jszip.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/pdfmake/pdfmake.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/pdfmake/vfs_fonts.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/lightbox/ekko-lightbox.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url('assets/scripts/gooder.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/scripts/gooder-4.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/scripts/jquery.form.js')?>" type="text/javascript"></script>
<script>
  $(document).ready(function () {
  	const Toast = Swal.mixin({
		  toast: true,
		  position: 'top-end',
		  showConfirmButton: false,
		  timer: 3000,
		  timerProgressBar: true,
		  didOpen: (toast) => {
		    toast.addEventListener('mouseenter', Swal.stopTimer)
		    toast.addEventListener('mouseleave', Swal.resumeTimer)
		  }
		})
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
		// setTimeout(function(){window.location.reload();; }, 2000);
		$('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

		$("#example1").DataTable({
	  	"responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 50, "pagination": true, "ordering": false
	  });
  });
</script>