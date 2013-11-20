<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['RaizLoc']."common/header.php");?>
<?php 
$sql=SQLQuery("select * from cat_areas",1);
##Header & Footer
include($PathTPL.'index_head_tpl.php');
##Content
include($PathTPL.'index_content_tpl.php');
##Index [framset]
include($PathTPL.'index_frameset_tpl.php');
?>