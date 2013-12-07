<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['header_path']); ?>
<?php 
$contentHTML = "Congregación";
$contentVars = array('TEST'=>'Prueba de parse variable');
?>

<?php
## Inicio - Generar HTML ##
echo HTMLconstructor(true,$contentHTML,$contentVars);
## Fin - Generar HTML ##
?>