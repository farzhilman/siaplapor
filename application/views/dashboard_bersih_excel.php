<?php
header('Content-Disposition: attachment; filename="'.$nama_file.'.xls"');
?>
<!DOCTYPE html>
<html lang="en">

<?php
echo $__head_page;
?>

<body>
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