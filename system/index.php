<?php $login=1; include("common/php/header.php");
session_name('maha_tlalpan');
session_start();
unset($_SESSION['usu_id'],$_SESSION['usu_usuario'],$_SESSION['usu_nombre'],$_SESSION['usu_nivel']);
if($in['er']==1){$Msj="Sesión Cerrada."; }
if($in['er']==2){$Msj="Sin autorización."; }
if($ins['user'] || $ins['pass']){
	$row=SQLQuery("select id_usuario,usu_usuario,concat(b.per_nombre,' ',b.per_paterno,' ',b.per_materno) as nombre,id_acceso from sis_usuarios 
					left join cat_personas b using(id_persona)
					where 1 and usu_usuario='$ins[user]' and usu_clave='$ins[pass]'");
	if(!$row){$Msj="Sin acceso - Verifique su suario y/o contraseña";}
	else{
		session_name('maha_tlalpan');
		session_start();
		$_SESSION['usu_id']=$row[1][0];
		$_SESSION['usu_usuario']=$row[1][1];
		$_SESSION['usu_nombre']=$row[1][2];
		$_SESSION['usu_nivel']=$row[1][3];
		$_SESSION['header_path']=$Path['header'];
		header("location: modules/");
	}
}
$contentVars = array('FORM_ACTION_LOGIN'=>$_SERVER['PHP_SELF'], 'MENSAJE'=>$Msj );
?>

<?php
## Inicio - Generar HTML ##
echo HTMLconstructor(false,$contentHTML, $contentVars, 'index_login.tpl', false, 'index_login.tpl');
## Fin - Generar HTML ##
?>
<!-- <a href="modules/">Testing</a> -->