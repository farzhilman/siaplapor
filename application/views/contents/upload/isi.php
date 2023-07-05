<?php 
$dirf_skpd = './uploaded/'.$unit_id;
$dir_skpd = scandir($dirf_skpd);
if ($warning != '' || $warning == NULL) {
    if($dir_skpd)
    {
        foreach($dir_skpd as $file) 
        {
            if(($file!='..') && ($file!='.'))
            {
                $file=str_replace(' ', '%20', $file);
                echo '<a href='.$dirf_skpd."/".$file." target='_blank'>" .$file."</a> <button class='btn btn-xs btn-danger hapus-file' data-unit_id='".$unit_id."' data-file='".str_replace('.', 't1t1k', $file)."'> x </button> ";
            }
        }
    }
} else {
    echo $warning;
}
?>