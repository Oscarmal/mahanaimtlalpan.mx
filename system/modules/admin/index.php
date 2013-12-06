<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['RaizLoc']."common/header.php");?>
<?php 
$contentHTML = "Admin Module";
$contentVars = array('TEST'=>'Prueba de parse variable');
?>

<?php
## Inicio - Generar HTML ##
echo HTMLconstructor(true,$contentHTML,$contentVars);
## Fin - Generar HTML ##
?>