<?php #require($Path['tpl'].'HTMLconstructor.php');
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
	global  $Raiz,$Path,$Usuario,$AppTitle,$BreadcrumbsImg;
	####### Impresión de Página #######
	##Header & Footer
	$menuTpl = 'index_menu.tpl';
	$headerTpl = 'index_header.tpl';
	$footerTpl = 'index_footer.tpl';
	#Menu general
	$menu = new Template($Path['tpl'].$menuTpl);
	$menu->set("MENU", $Path['css']."menu/");
	$menu->set("INICIO", $Raiz['url']."modules/");
	$menu->set("CONGREGACION", $Raiz['url']."modules/congregacion/");
	$menu->set("INVENTARIO", "#");
	$menu->set("CONTABILIDAD", "#");
	$menu->set("ADMIN", $Raiz['url']."modules/admin/");
	$menu->set("SALIR", $Raiz['url']."?er=1");
	#Header
	$header = new Template($Path['tpl'].$headerTpl);
	$header->set("CSS_estructura", $Path['css']."contenido.css");
	$header->set("CSS_estilos", $Path['css']."estilos.css");
	$header->set("Javascript_IMG", $Path['js']."img.js");
	$header->set("Javascript", $Path['js']."o3m_funciones.js");
	$header->set("jQuery", $Path['js']."jquery/jquery-1.9.1.min.js");
	$header->set("IMG", $Path['img']);
	$header->set("FechaHoy", fec_larga_hoy());
	$header->set("UsuarioNom", $Usuario['name']);
	$header->set("UsuarioUsu", $Usuario['user']);
	$header->set("AppTitle", $AppTitle);
	if($menuTop){$header->set("Menu", $menu->output());}else{$header->set("Menu", '');}
	#Footer
	$footer = new Template($Path['tpl'].$footerTpl);
	$footer->set("Anio", date('Y'));
	##Content
	$contentTpl = $contentTPL;
	$menuizq = new Template($Path['tpl'].$menuIzqTpl);
	$content = new Template($Path['tpl'].$contentTpl);
	$content->set("BarraRuta", breadcrumbs(':: Inicio', $BreadcrumbsImg));
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
	$html = new Template($Path['tpl'].$htmlTpl);
	$html->set("TITULO", $SiteTitle);
	$html->set("HEADER", $header->output());
	$html->set("CONTENT", $content->output());
	$html=$html->output();
	####### Fin de Impresión ##########
	return $html;
}
?>