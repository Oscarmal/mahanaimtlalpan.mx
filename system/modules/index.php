<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['RaizLoc']."common/header.php");?>
<?php 
$sql=SQLQuery("select * from cat_areas",1);
$contentHTML = "Inicio<br/>".$sql;
#############
## Vista
#############
####### Impresi�n de P�gina #######
##Header & Footer
$menuTpl = 'index_menu.tpl';
$headerTpl = 'index_header.tpl';
$footerTpl = 'index_footer.tpl';
include($PathTPL.'index_head_tpl.php');
##Content
$menuIzqTpl = 'index_menuizq.tpl';
$contentTpl = 'index_content.tpl';
include($PathTPL.'index_content_tpl.php');
##Output [framset] (Imprime la pagina)
$htmlTpl = 'index_frame.tpl';
include($PathTPL.'index_frameset_tpl.php');
####### Fin de Impresi�n ##########
?>