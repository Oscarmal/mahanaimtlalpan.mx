<?php
/*O3M*/
/*Ejecuta las funciones de o3m_funciones.php y devuelve el resultado para ser aplicado por AJAX*/
import_request_variables("g,p","v_");
require("o3m_funciones.php");
$v=explode("|",$v_v);
$v_tot=count($v);
switch ($v[0]){
	case "ruta" : $valor=ruta($v[1]); break;
	case "fec_larga_hoy" : $valor=fec_larga_hoy(); break;
	case "fec_mes_esp" : $valor=fec_mes_esp($v[1]); break;
	case "fec_dmA" : $valor=fec_dmA($v[1]); break;
	case "fec_dato" : $valor=fec_dato($v[1],$v[2]); break;
	case "borrar_archivos" : $valor=borrar_archivos($v[1],$v[2],$v[3],$v[4]); break;
	case "suma" : for($x=1;$x<=$v_tot-1;$x++){$valor=$valor+$v[$x];} break;
	case "resta" : for($x=1;$x<=$v_tot-1;$x++){$valor=$valor-$v[$x];if($x==1){$valor=$valor*-1;}} break;
	case "imprime" : $valor=$v[1]; break;
}
echo $valor;
/*O3M*/
?>
