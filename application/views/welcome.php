<?=$__head_page?>

<style type="text/css">
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
  <body class="layout-top-nav layout-navbar-fixed">
    <div class="wrapper">
    	<div class="preloader justify-content-center align-items-center">
			<img src="<?=base_url('assets/img/30-k.png')?>" alt="Kuisioner Bappedalitbang" height="200">
		</div>
      <nav class="main-header navbar navbar-expand-md border-bottom-0 text-sm">
        <div class="container">
          <a href="#" class="navbar-brand">
            <!-- <img src="<?=base_url('assets/img/30-k.png')?>" alt="Kuisioner Logo" class="brand-image img-circle"> -->
            <!-- <span class="brand-text font-weight-light"> - </span> -->
          </a>
          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <?php
          // echo $__navbar_page;
          ?>
        </div>
      </nav>
      
      <?=$__content_page?>

      <aside class="control-sidebar control-sidebar-dark"></aside>
      <!-- footer -->
    </div>

    <?=$__script_page?>

    <script>
		$('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
		$('#tanggal').datetimepicker({
	        format:'L'
	    });
	    $('#waktu').datetimepicker({
	      format: 'HH:mm'
	    })
	</script>
  </body>
</html>