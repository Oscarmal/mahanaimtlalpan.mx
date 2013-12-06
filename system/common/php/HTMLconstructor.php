<?php #require($PathTPL.'HTMLconstructor.php');
/**
* @author Oscar Maldonado - O3M
* @params $menuTop =>  Define si se usarla la barra de menu superior (true/false)
* @params $contentHTML => Contenido de la pagina
* @params $contentVars => Variables adicionales dentro de la plantilla TPL
* @params $contentTPL => Nombre de la plantilla TPL para el contenido
* @params $menuIzqTpl => Nombre de la plantilla TPL para el menu izquierdo
*/ 
function HTMLconstructor($menuTop=true, $contentHTML='', $contentVars=false, $contentTPL='index_content.tpl', $menuIzqTpl='index_menuizq.tpl'){
	$contentTPL=(!$contentTPL)?'index_content.tpl':$contentTPL;	
#############
## Vista
#############
	global $PathPHP, $PathTPL, $PathCSS, $PathJS, $PathIMG, $RaizUrl, $UsuarioNom, $UsuarioUsu, $SiteTitle;
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
	if($menuTop){$header->set("Menu", $menu->output());}else{$header->set("Menu", '');}
	#Footer
	$footer = new Template($PathTPL.$footerTpl);
	$footer->set("Anio", date('Y'));
	##Content
	$contentTpl = $contentTPL;
	$menuizq = new Template($PathTPL.$menuIzqTpl);
	$content = new Template($PathTPL.$contentTpl);
	$content->set("IMG", $PathIMG);
	if(!$menuIzqTpl){$content->set("MenuIzq", '');}else{$content->set("MenuIzq", $menuizq->output());}
	#$content->set("MenuIzq", $menuizq->output());
	$content->set("Contenido", $contentHTML);
	$content->set("FOOTER", $footer->output());		
	if($contentVars){
	/*Busca variables adicionales dentro del la plantilla TPL*/
		$tvars = count($contentVars);
		$vnames = array_keys($contentVars);
		$vvalues = array_values($contentVars);
		for($i=0;$i<$tvars;$i++){$content->set($vnames[$i], $vvalues[$i]);}
	}
	##Output
	$htmlTpl = 'index_frame.tpl';
	$html = new Template($PathTPL.$htmlTpl);
	$html->set("TITULO", $SiteTitle);
	$html->set("HEADER", $header->output());
	$html->set("CONTENT", $content->output());
	$html=$html->output();
	####### Fin de Impresión ##########
	return $html;
}
?>