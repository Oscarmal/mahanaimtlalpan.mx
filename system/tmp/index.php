<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['RaizLoc']."common/header.php");?>
<?php 
$sql=SQLQuery("select * from cat_areas",1);
##Menus
$menu = new Template($PathTPL.'index_menu.tpl');
$menu->set("menu", $PathCSS."menu/");
$menuizq = new Template($PathTPL.'index_menuizq.tpl');
##Header
$header = new Template($PathTPL."index_header.tpl");
$header->set("CSS_estructura", $PathCSS."contenido.css");
$header->set("CSS_estilos", $PathCSS."estilos.css");
$header->set("Javascript_IMG", $PathJS."img.js");
$header->set("Javascript", $PathJS."o3m_funciones.js");
$header->set("jQuery", $PathJS."jquery/jquery-1.9.1.min.js");
$header->set("IMG", $PathIMG);
$header->set("FechaHoy", fec_larga_hoy());
$header->set("UsuarioNom", $UsuNom);
$header->set("UsuarioUsu", $UsuUsu);
$header->set("Menu", $menu->output());
#Footer
$footer = new Template($PathTPL.'index_footer.tpl');
$footer->set("Anio", date('Y'));
##Content
$content = new Template($PathTPL.'index_content.tpl');
$content->set("MenuIzq", "MenuIzq <br/>".$menuizq->output());
$content->set("Contenido", "Contenido<br/>".$sql);
$content->set("FOOTER", $footer->output());
##Index [framset]
$html = new Template($PathTPL.'index_frame.tpl');
$html->set("Titulo", "Sistema");
$html->set("HEADER", $header->output());
$html->set("CONTENT", $content->output());
$html=$html->output();
echo $html;
?>