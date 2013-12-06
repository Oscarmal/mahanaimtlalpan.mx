<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['RaizLoc']."common/header.php");?>
<?php 
$sql=SQLQuery("select * from cat_areas",1);
$contentHTML = "Inicio<br/>".$sql;
$contentVars = array('TEST'=>'Prueba de parse variable');
?>

<?php
## Inicio - Generar HTML ##
echo HTMLconstructor(true,$contentHTML,$contentVars);
## Fin - Generar HTML ##
?>