<?php #require($Path['tpl'].'HTMLconstructor.php');
/**
* @author Oscar Maldonado - O3M
* @params $menuTop =>  Define si se usarla la barra de menu superior (true/false)
* @params $contentHTML => Contenido de la pagina
* @params $contentVars => Variables adicionales dentro de la plantilla TPL
* @params $contentTPL => Nombre de la plantilla TPL para el area de contenido
* @params $menuIzqTpl => Nombre de la plantilla TPL para el menu izquierdo
* @params $containerTPL => Nombre de la plantilla TPL para el contenedor general
*/ 
function HTMLconstructor($menuTop=true, $contentHTML='', $contentVars=false, $contentTPL='index_content.tpl', $menuIzqTpl='index_menuizq.tpl', $containerTPL='index_container.tpl'){
	$containerTPL=(!$containerTPL)?'index_container.tpl':$containerTPL;	
#############
## Vista
#############
	global  $Raiz,$Path,$Usuario,$AppTitle,$BreadcrumbsImg;
	#### Plugins ####
	$jQueryPlugins = '
				<!--jQuery-->
				<script type="text/javascript" src="'.$Path['js'].'jquery/jquery-1.9.1.min.js"></script>
				<!--jQuery UI-->
				<link href="'.$Path['js'].'jquery/jquery-ui-1.10.3.custom/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
			   <script type="text/javascript" src="'.$Path['js'].'jquery/jquery-ui-1.10.3.custom/jquery-ui-1.10.3.custom.min.js"></script>
			   <!--jQuery Datepicker ES-->
			   <script src="'.$Path['js'].'jquery/jquery-ui-1.10.3.custom/jquery.ui.datepicker-es.js"></script>
				<!--jQuery Confirm Popups-->
				<link href="http://fonts.googleapis.com/css?family=Cuprum&amp;subset=latin" rel="stylesheet" type="text/css">
				<link rel="stylesheet" type="text/css" href="'.$Path['js'].'jquery/jquery.confirm/jquery.confirm.css" />
				<script src="'.$Path['js'].'jquery/jquery.confirm/jquery.confirm.js"></script>';
	
	####---
	####### Impresión de Página #######
	##Header & Footer
	$menuTpl = 'index_menu.tpl';
	$headerTpl = 'index_header.tpl';
	$footerTpl = 'index_footer.tpl';
	#Menu general
	$menu = new Template($Path['tpl'].$menuTpl);
	$menu->set("MENU", $Path['css']."menu/");
	$menu->set("JS", $Path['js']);
	$menu->set("jQueryPlugIns", $jQueryPlugins);
	$menu->set("INICIO", $Raiz['url']."modules/");
	$menu->set("CONGREGACION", $Raiz['url']."modules/congregacion/");
	$menu->set("INVENTARIO", $Raiz['url']."modules/inventario/");
	$menu->set("CONTABILIDAD", $Raiz['url']."modules/contabilidad/");
	$menu->set("ADMIN", $Raiz['url']."modules/admin/");
	$menu->set("SALIR", $Raiz['url']."?er=1");
	#Header
	$header = new Template($Path['tpl'].$headerTpl);
	$header->set("CSS_estructura", $Path['css']."contenido.css");
	$header->set("CSS_estilos", $Path['css']."estilos.css");
	$header->set("Javascript_IMG", $Path['js']."img.js");
	$header->set("Javascript", $Path['js']."o3m_funciones.js");
	$header->set("jQueryPlugIns", $jQueryPlugins);	
	$header->set("IMG", $Path['img']);
	$header->set("FechaHoy", fec_larga_hoy());
	$header->set("UsuarioNom", $Usuario['name']);
	$header->set("UsuarioUsu", $Usuario['user']);
	$header->set("AppTitle", utf8_encode($AppTitle));
	if($menuTop){$header->set("Menu", $menu->output());}else{$header->set("Menu", '');}
	#Footer
	$footer = new Template($Path['tpl'].$footerTpl);
	$footer->set("Anio", date('Y'));
	
	##Content
	$content = new Template($Path['tpl'].$contentTPL);
	$content->set("Contenido", utf8_encode($contentHTML));
	if($contentVars){
	/*Busca variables adicionales dentro del la plantilla TPL*/
		$tvars = count($contentVars);
		$vnames = array_keys($contentVars);
		$vvalues = array_values($contentVars);
		for($i=0;$i<$tvars;$i++){$content->set($vnames[$i], $vvalues[$i]);}
	}

	##Left Menu
	$menuizq = new Template($Path['tpl'].$menuIzqTpl);	

	##Container	
	$container = new Template($Path['tpl'].$containerTPL);
	$container->set("CSS_estructura", $Path['css']."contenido.css");
	$container->set("CSS_estilos", $Path['css']."estilos.css");
	$container->set("Javascript_IMG", $Path['js']."img.js");
	$container->set("Javascript", $Path['js']."o3m_funciones.js");
	$container->set("jQueryPlugIns", $jQueryPlugins);	
	$container->set("IMG", $Path['img']);
	$container->set("BarraRuta", breadcrumbs(':: Inicio', $BreadcrumbsImg));
	if(!$menuIzqTpl){$container->set("MenuIzq", '');}else{$container->set("MenuIzq", $menuizq->output());}
	$container->set("FORM_ACTION", $_SERVER['PHP_SELF']);
	$container->set("CONTENT", $content->output());
	$container->set("FOOTER", $footer->output());	
	if($contentVars){
	/*Busca variables adicionales dentro del la plantilla TPL*/
		$tvars = count($contentVars);
		$vnames = array_keys($contentVars);
		$vvalues = array_values($contentVars);
		for($i=0;$i<$tvars;$i++){$container->set($vnames[$i], $vvalues[$i]);}
	}
	
	##Output
	$htmlTpl = 'index_frame.tpl';
	$html = new Template($Path['tpl'].$htmlTpl);
	$html->set("TITULO", $SiteTitle);
	$html->set("HEADER", $header->output());
	$html->set("CONTAINER", $container->output());
	$html=$html->output();
	####### Fin de Impresión ##########
	return $html;
}
?>