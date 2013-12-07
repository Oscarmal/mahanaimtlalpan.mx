<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['RaizLoc']."common/header.php");?>
<?php 
$contentHTML = "Admin Module";
?>

<?php
## Inicio - Generar HTML ##
echo HTMLconstructor(true,$contentHTML,$contentVars);
## Fin - Generar HTML ##
?>