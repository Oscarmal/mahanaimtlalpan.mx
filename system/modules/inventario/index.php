<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['header_path']);?>
<?php 
$sql=SQLQuery("select * from inv_productos order by timestamp desc",1);
$contentHTML = "";
$contentVars = array('Resultados'=>$sql);
?>

<?php
## Inicio - Generar HTML ##
echo HTMLconstructor(true,$contentHTML,$contentVars,'inventario_index.tpl','inventario_menuizq.tpl');
## Fin - Generar HTML ##
?>