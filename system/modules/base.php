<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['header_path']);?>
<?php 
$contentHTML = "Archivo base [@TEST]<br/>";
$contentVars = array('TEST'=>'[Prueba de variable nueva]');
?>

<?php
## Inicio - Generar HTML ##
echo HTMLconstructor(true,$contentHTML,$contentVars,'index_content.tpl','index_container.tpl','index_menuizq.tpl');
## Fin - Generar HTML ##
?>