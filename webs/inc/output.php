<?php
if (PT_GZIP_POWER == "true"){
    $file = $pt_tpl->parser($pt_type);
    ob_start('ob_gzip');
    include $file;
    ob_end_flush();
}else{
    $file = $pt_tpl->parser($pt_type);
    include $file;
}
?>