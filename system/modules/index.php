<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['header_path']);?>
<?php 
$sql=SQLQuery("select * from cat_areas",1);
$contentHTML = '<table width="100%" border="0" cellpadding="0" cellspacing="0">  <tr>
    <td width="274" rowspan="5" valign="top"><img src="'.$Path['img'].'palabra_miel_274x300.png" width="274" height="300" /></td>
    <td width="454" height="87">&nbsp;</td>
  </tr>
  <tr>
    <td height="28" valign="top">Bienvenidos </td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
  </tr>
  <tr>
    <td height="94" valign="top">Sistema de la Iglesia Mahanaim en Tlalpan</td>
  </tr>
  <tr>
    <td height="70">&nbsp;</td>
  </tr>
  </table>';

?>

<?php
## Inicio - Generar HTML ##
echo HTMLconstructor(true,$contentHTML,$contentVars);
## Fin - Generar HTML ##
?>