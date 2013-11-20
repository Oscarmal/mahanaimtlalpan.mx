<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['RaizLoc']."common/header.php");?>
<?php 
##Header & Footer
include($PathTPL.'index_head_tpl.php');
##Content
$content = new Template($PathTPL.'index_content.tpl');
$menuizq = new Template($PathTPL.'index_menuizq.tpl');
$content->set("MenuIzq", "MenuIzq <br/>".$menuizq->output());
$content->set("Contenido", "Admin Module".$sql);
$content->set("FOOTER", $footer->output());
##Output
include($PathTPL.'index_frameset_tpl.php');
?>