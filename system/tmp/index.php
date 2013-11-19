<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['RaizLoc']."common/header.php");?>
<?php 
$sql=SQLQuery("select * from cat_areas",1);
##Menus
$menu = new Template($PathTPL.'index_menu.tpl');
$menu->set("menu", $PathCSS."menu/");
$menuizq = new Template($PathTPL.'index_menuizq.tpl');
##Plantilla principal
$html = new Template($PathTPL.'index.tpl');
$html->set("Titulo", "Index");
$html->set("CSS_estructura", $PathCSS."contenido.css");
$html->set("CSS_estilos", $PathCSS."estilos.css");
$html->set("Javascript_IMG", $PathJS."img.js");
$html->set("Javascript", $PathJS."o3m_funciones.js");
$html->set("jQuery", $PathJS."jquery/jquery-1.9.1.min.js");
$html->set("IMG", $PathIMG);
$html->set("FechaHoy", fec_larga_hoy());
$html->set("UsuarioNom", $UsuNom);
$html->set("UsuarioUsu", $UsuUsu);
$html->set("Menu", $menu->output());
$html->set("MenuIzq", "MenuIzq <br/>".$menuizq->output());
$html->set("Contenido", "Contenido<br/>".$sql);
$html->set("Anio", date('Y'));
$html=$html->output();
echo $html;
?>