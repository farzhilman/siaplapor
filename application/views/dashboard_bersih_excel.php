<!DOCTYPE html>
<html lang="en">

<?php
echo $__head_page;
?>
<style type="text/css">
table{
/*  margin: 20px auto;*/
/*  border-collapse: collapse;*/
}
table > thead > tr > th,
table > tbody > tr > td{
  border: 1px solid black !important;
}
</style>

<body>
  <?php
  header("Content-type: application/vnd-ms-excel");
  header('Content-Disposition: attachment; filename="'.$nama_file.'.xlsx"');
  ?>

  <div class="fullcontent_bersih">
    <?php
    echo $__content_page;
    ?>
  </div>
<?php
echo $__script_page;
?>
</body>
</html>