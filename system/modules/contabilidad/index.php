<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['header_path']);?>
<?php 
$sql=SQLQuery("select * from con_ingresos order by timestamp desc",1);
$contentHTML = "";
$contentVars = array('Resultados'=>$sql);
?>

<?php
## Inicio - Generar HTML ##
echo HTMLconstructor(true,$contentHTML,$contentVars,'contabilidad_index.tpl','contabilidad_menuizq.tpl');
## Fin - Generar HTML ##
?>