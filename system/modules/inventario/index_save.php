<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['header_path']);?>
<?php
if(!empty($ins['tipo']) && !empty($ins['producto']) && !empty($ins['marca'])){
	$sql="INSERT INTO inv_productos SET 
			pro_folio='$ins[folio]',
			pro_producto='$ins[producto]',
			pro_marca='$ins[marca]',
			pro_modelo='$ins[modelo]',
			pro_noserie='$ins[serie]',
			pro_caracteristicas='$ins[caracteristicas]',
			pro_tipo='$ins[tipo]',
			timestamp=NOW(),
			ID_usuario='$Usuario[id]'";
	$sql=SQLExec($sql);
	$msj_ok="Datos del Producto: $ins[producto] guardados correctamente.";
	$exito=true;
}
echo $exito;
?>