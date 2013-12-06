<?php #require($PathTPL.'HTMLconstructor.php'); 
function HTMLconstructor($contentHTML='', $menuIzqTpl='index_menuizq.tpl'){
#############
## Vista
#############
	global $PathTPL, $PathCSS, $PathJS, $PathIMG, $RaizUrl, $UsuarioNom, $UsuarioUsu, $SiteTitle;
	####### Impresión de Página #######
	##Header & Footer
	$menuTpl = 'index_menu.tpl';
	$headerTpl = 'index_header.tpl';
	$footerTpl = 'index_footer.tpl';
	#Menu general
	$menu = new Template($PathTPL.$menuTpl);
	$menu->set("MENU", $PathCSS."menu/");
	$menu->set("INICIO", $RaizUrl."modules/");
	$menu->set("CONGREGACION", $RaizUrl."modules/congregacion/");
	$menu->set("INVENTARIO", "#");
	$menu->set("CONTABILIDAD", "#");
	$menu->set("ADMIN", $RaizUrl."modules/admin/");
	$menu->set("SALIR", $RaizUrl."?er=1");
	#Header
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
	##Content
	#$menuIzqTpl = 'index_menuizq.tpl';
	$contentTpl = 'index_content.tpl';
	$menuizq = new Template($PathTPL.$menuIzqTpl);
	$content = new Template($PathTPL.$contentTpl);
	$content->set("MenuIzq", $menuizq->output());
	$content->set("Contenido", $contentHTML);
	$content->set("FOOTER", $footer->output());
	##Output
	$htmlTpl = 'index_frame.tpl';
	$html = new Template($PathTPL.$htmlTpl);
	$html->set("TITULO", $SiteTitle);
	$html->set("HEADER", $header->output());
	$html->set("CONTENT", $content->output());
	$html=$html->output();
	#echo $html;
	####### Fin de Impresión ##########
	return $html;
}
?>