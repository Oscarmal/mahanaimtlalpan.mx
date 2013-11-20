<?php
##Menus
$menu = new Template($PathTPL.'index_menu.tpl');
$menu->set("MENU", $PathCSS."menu/");
$menu->set("SALIR", $RaizUrl."?er=1");
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
$header->set("UsuarioNom", $UsuarioNom);
$header->set("UsuarioUsu", $UsuarioUsu);
$header->set("Menu", $menu->output());
#Footer
$footer = new Template($PathTPL.'index_footer.tpl');
$footer->set("Anio", date('Y'));
?>