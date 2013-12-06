<?php
##Menu general
$menu = new Template($PathTPL.$menuTpl);
$menu->set("MENU", $PathCSS."menu/");
$menu->set("INICIO", $RaizUrl."modules/");
$menu->set("CONGREGACION", $RaizUrl."modules/congregacion/");
$menu->set("INVENTARIO", "#");
$menu->set("CONTABILIDAD", "#");
$menu->set("ADMIN", $RaizUrl."modules/admin/");
$menu->set("SALIR", $RaizUrl."?er=1");
##Header
$header = new Template($PathTPL.$headerTpl);
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
$footer = new Template($PathTPL.$footerTpl);
$footer->set("Anio", date('Y'));
?>