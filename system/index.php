<?php include("common/header.php");?>
<?php 
#if($in['er']){session_destroy('maha_tlalpan'); }
if($ins['user'] || $ins['pass']){
	$row=SQLQuery("select * from sis_usuarios where 1 and usu_usuario='$ins[user]' and usu_clave='$ins[pass]'",1);
	if(!$row){$Msj="Sin acceso - Verifique su suario y/o contraseña";}
	else{
		session_name('maha_tlalpan');
		session_start();
		$_SESSION['usu_id']=$row['id_usuario'];
		$_SESSION['usu_usuario']=$row['usu_usuario'];
		$_SESSION['usu_nombre']=$row['usu_usuario'];
		$_SESSION['usu_nivel']=$row['id_acceso'];
		header("location: modules/");
	}
}
$contentVars = array('FORM_ACTION_LOGIN'=>$PHP_SELF, 'MENSAJE'=>$Msj );
?>

<?php
## Inicio - Generar HTML ##
echo HTMLconstructor(false,$contentHTML, $contentVars, 'index_login.tpl');
## Fin - Generar HTML ##
?>
<a href="modules/">Testing</a>