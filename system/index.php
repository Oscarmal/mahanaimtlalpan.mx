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
		header("location: tmp/index.php");
	}
}
#############
## Vista
#############
##Header & Footer
$menuTpl = 'index_menu.tpl';
$headerTpl = 'index_header.tpl';
$footerTpl = 'index_footer.tpl';
include($PathTPL.'index_head_tpl.php');
##Content
$header->set("Menu", "");
$content = new Template($PathTPL.'index_login.tpl');
$content->set("FORM_ACTION_LOGIN", $PHP_SELF);
$content->set("FOOTER", $footer->output());
$content->set("MENSAJE", $Msj);
##Index [framset]
$html = new Template($PathTPL.'index_frame.tpl');
$html->set("TITULO", "Sistema");
$html->set("HEADER", $header->output());
$html->set("CONTENT", $content->output());
$html=$html->output();
echo $html;
?>
<a href="modules/">Testing</a>