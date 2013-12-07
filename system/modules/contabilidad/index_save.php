<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['header_path']);?>
<?php
if(!empty($ins['tipomov']) && !empty($ins['fecha_mov']) && !empty($ins['horario']) && !empty($ins['total'])){
	$sql="INSERT INTO con_ingresos SET 
				TipoMov='$ins[tipomov]',
				FechaMov='$ins[fecha_mov]',
				Horario='$ins[horario]',
				Diezmos='$ins[diezmos]',
				Ofrendas='$ins[ofrendas]',
				DiezmoCentral='$ins[diezmo_central]',
				ProtemploPorc='".($ins['protemplo_porc']/100).".',
				Protemplo='$ins[protemplo]',
				Siervo='$ins[siervo]',
				TotRecibido='$ins[tot_recibido]',
				TotPagos='$ins[tot_pagos]',
				TotDeposito='$ins[total]',
				Comentarios='$ins[comentarios]',
				timestamp=NOW(),
				ID_usuario='$Usuario[id]'";
	$sql=SQLExec($sql);
	#$msj_ok="La información ha sido guardada correctamente. - $v_tipomov-$v_fecha_mov-$v_horario-$v_total";
		$exito=true;
}
echo $exito;
?>