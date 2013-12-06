<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['RaizLoc']."common/header.php");?>
<?php 
/* Opcion 1*
$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
foreach($crumbs as $crumb){
    $bRuta .= ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
}
/**/
/*opcion 2*/
#echo $_SERVER['REQUEST_URI'];
#echo $SiteFolder;
$path = array_filter(explode($SiteFolder.'/modules', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
	echo $path[0].'  '.$path[1];
function breadcrumbs($separator = '>', $home = 'Inicio') {
	#$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
	#$base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
	$path = array_filter(explode($SiteFolder.'/modules', parse_url($RaizUrl, PHP_URL_PATH)));
	$base = $RaizUrl;
	$breadcrumbs = array('<a rel="nofollow" href="'. $base .'">'. $home .'</a>');	 
	#$breadcrumbs = array('<a rel="nofollow" href="'. $base .'">'. $base .'</a>');	 
	$last = end(array_keys($path));	 
	foreach ($path as $x => $crumb) {
		$title = ucwords(str_replace(array('.php', '_'), array('', ' '), $crumb));	 
		if ($x != $last) {
			$breadcrumbs[] = '<a rel="nofollow" href="'. $base . $crumb .'">'. $title .'</a>';
		} else {
			$breadcrumbs[] = $title;
		}
	}	 
	return implode($separator, $breadcrumbs);
}
$bRuta=breadcrumbs();
/**/
$contentHTML = "Admin Module";
$contentVars = array('BarraRuta'=>$bRuta);
?>

<?php
## Inicio - Generar HTML ##
echo HTMLconstructor(true,$contentHTML,$contentVars);
## Fin - Generar HTML ##
?>