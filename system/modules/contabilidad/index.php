<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['header_path']);?>
<?php 
$contentHTML = "Contabilidad";
?>

<?php
## Inicio - Generar HTML ##
echo HTMLconstructor(true,$contentHTML,$contentVars);
## Fin - Generar HTML ##
?>