<div class="content-wrapper" style="margin-top: 0px; background: white;">
<!-- /.content-header -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>-</p>
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