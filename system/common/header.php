<?php 
##Establece ambiente de trabajo
require_once('path.php');
$RaizLoc=$_SESSION['RaizLoc'];
$RaizUrl=$_SESSION['RaizUrl'];
$SiteFolder=$_SESSION['SiteFolder'];
$cfgFile = $RaizLoc.'common\cfg\system.cfg';
load_vars($cfgFile);
require($RaizLoc.$cfg['dbi_conex']); 
require($RaizLoc.$cfg['php_functions']); 
include($RaizLoc.$cfg['php_template']);
$PathTPL=$RaizLoc.$cfg['path_tpl'];
$PathCSS=$RaizUrl.$cfg['path_css'];
$PathJS=$RaizUrl.$cfg['path_js'];
$PathIMG=$RaizUrl.$cfg['path_img'];
$SiteTitle=$cfg['site_title'];
require_once($PathTPL.'HTMLconstructor.php'); 
parse_form_sanitizer($_GET, $_POST);
parse_form($_GET, $_POST);
##Variables de usuario
$UsuarioID=$_SESSION['usu_id'];
$UsuarioUs=$_SESSION['usu_usuario'];
$UsuarioNom=$_SESSION['usu_nombre'];
$UsuarioNiv=$_SESSION['usu_nivel'];		


##Validación de autentificación
#if (!isset($UsuarioID)) { header("Location: ".$RaizUrl."index.php?er=1"); exit; }
if(empty($UsuarioUs) && empty($UsuarioNom)){$UsuarioUs="Usuario"; $UsuarioNom="Nombre de Usuario";}
/*
#Log Txt
LogTxt($SiteFolder,$UsuarioID,$UsuarioNom,$UsuarioUs,$UsuarioNiv,$RaizLoc);

#Online
$ultimo_clic=time();
$sql = "select id_online from $db1.$tbl_online where id_usuario='$UsuarioID'";
$con=SQLconsulta($sql,$RaizLoc);
$row=SQLresultados($con,$RaizLoc);
if(!isset($row[0]) || $row[0]<1){
	$sql= "insert into $db1.$tbl_online (online,id_usuario) values('$ultimo_clic', '$UsuarioID')"; }
else { $sql ="UPDATE $db1.$tbl_online SET online='$ultimo_clic' WHERE id_usuario='$UsuarioID'"; }
$con=SQLconsulta($sql,$RaizLoc);
/**/
function load_vars($filename='') {
#Load config information from system.cfg file.
	global $sys, $cfg;	
	if (file_exists($filename)) {
        if ($handle = fopen($filename, 'r')) {
            while (!feof($handle)) {
                list($type, $name, $value) = preg_split("/\||=/", fgets($handle), 3);
				if ($type == 'sys') {
					$sys[$name] = trim($value);
					$val.=$type.' | '.$name.' = '.$value."<br/>\n\r";
				} elseif ($type == 'conf' or $type == 'conf_local') { 
					$cfg[$name] = trim($value);
					$val.=$type.' | '.$name.' = '.$value."<br/>\n\r";
				}
            }
        }
		return $val;
    }	   
}
/**/
?>