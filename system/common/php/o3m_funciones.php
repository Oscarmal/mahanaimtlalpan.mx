<?php
/*O3M*/
/*
function load_vars($filename='') {
#Load config information from system.cfg file.
	global $sys, $cfg;	
	if (file_exists($filename)) {
        if ($handle = fopen($filename, 'r')) {
            while (!feof($handle)) {
                list($type, $name, $value) = preg_split("/\||=/", fgets($handle), 3);
				if ($type == 'sys') {
                    $sys[$name] = trim($value);
                } elseif ($type == 'conf' or $type == 'conf_local') { 
                    $cfg[$name] = trim($value);
                }
				$val.=$type.' | '.$name.' = '.$value."<br/>\n\r";
            }
        }
		return $val;
    }	   
}
*/
function parse_form_sanitizer($g,$p){
#Load form information ($_GET/$_POST) into array $in[], $cmd[] with sanitizer
#ejem: parse_form($_GET, $_POST);
	global $ins, $cmd;
	if(!empty($g)){
		$tvars = count($g);
		$vnames = array_keys($g);
		$vvalues = array_values($g);
	}elseif(!empty($p)){
		$tvars = count($p);
		$vnames = array_keys($p);
		$vvalues = array_values($p);
	}
	for($i=0;$i<$tvars;$i++){
		if($vnames[$i]=='cmd'){$cmd=$vvalues[$i];}
		$ins[$vnames[$i]]=sanitizer_url($vvalues[$i]);
	}
}
function parse_form($g,$p){
#Load form information ($_GET/$_POST) into array $in[], $cmd[] without sanitizer
#ejem: parse_form($_GET, $_POST);
	global $in, $cmd;
	if(!empty($g)){
		$tvars = count($g);
		$vnames = array_keys($g);
		$vvalues = array_values($g);
	}elseif(!empty($p)){
		$tvars = count($p);
		$vnames = array_keys($p);
		$vvalues = array_values($p);
	}
	for($i=0;$i<$tvars;$i++){
		if($vnames[$i]=='cmd'){$cmd=$vvalues[$i];}
		$in[$vnames[$i]]=$vvalues[$i];
	}
}
function sanitizer_url($param) {
#Sanitizes a url param
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]","}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;","â€”", "â€“", ",", "<", ".", ">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($param)));
	return $clean;
}

function fec_larga_hoy(){
$dia=date("l");
if ($dia=="Monday") $dia="Lunes";
if ($dia=="Tuesday") $dia="Martes";
if ($dia=="Wednesday") $dia="Miercoles";
if ($dia=="Thursday") $dia="Jueves";
if ($dia=="Friday") $dia="Viernes";
if ($dia=="Saturday") $dia="Sabado";
if ($dia=="Sunday") $dia="Domingo";
$dia2=date("d");
$mes=date("F");
if ($mes=="January") $mes="Enero";
if ($mes=="February") $mes="Febrero";
if ($mes=="March") $mes="Marzo";
if ($mes=="April") $mes="Abril";
if ($mes=="May") $mes="Mayo";
if ($mes=="June") $mes="Junio";
if ($mes=="July") $mes="Julio";
if ($mes=="August") $mes="Agosto";
if ($mes=="September")$mes="Septiembre";
if ($mes=="October") $mes="Octubre";
if ($mes=="November") $mes="Noviembre";
if ($mes=="December") $mes="Diciembre";
$ano=date("Y");
return "$dia $dia2 de $mes del $ano";
}

function fec_mes_esp($mes){
if ($mes==1) $mes="Enero";
if ($mes==2) $mes="Febrero";
if ($mes==3) $mes="Marzo";
if ($mes==4) $mes="Abril";
if ($mes==5) $mes="Mayo";
if ($mes==6) $mes="Junio";
if ($mes==7) $mes="Julio";
if ($mes==8) $mes="Agosto";
if ($mes==9) $mes="Septiembre";
if ($mes==10) $mes="Octubre";
if ($mes==11) $mes="Noviembre";
if ($mes==12) $mes="Diciembre";
return $mes;
}

function fec_dmA($fecha){
if($fecha!="0000-00-00"){ 
$datos = explode('-',$fecha);
$orden = array_reverse($datos);
$nueva_fecha = implode('-', $orden);
} else { $nueva_fecha=""; } 
return $nueva_fecha;
}

function fec_dato($fecha, $dato){
$fecha=explode('-',$fecha);
switch ($dato) {
	case 'd': $valor=$fecha[2]; break;
	case 'm': $valor=$fecha[1]; break;
	case 'a': $valor=substr($fecha[0],-2); break;
	case 'A': $valor=$fecha[0]; break;
}
return $valor;
}

function limpiar_acentos($s)
{
$s = ereg_replace("[áàâãª]","a",$s);
$s = ereg_replace("[ÁÀÂÃ]","A",$s);
$s = ereg_replace("[ÍÌÎ]","I",$s);
$s = ereg_replace("[íìî]","i",$s);
$s = ereg_replace("[éèê]","e",$s);
$s = ereg_replace("[ÉÈÊ]","E",$s);
$s = ereg_replace("[óòôõº]","o",$s);
$s = ereg_replace("[ÓÒÔÕ]","O",$s);
$s = ereg_replace("[úùûü]","u",$s);
$s = ereg_replace("[ÚÙÛÜ]","U",$s);
$s = str_replace("ç","c",$s);
$s = str_replace("Ç","C",$s);
$s = str_replace("\\","Ñ",$s);
$s = str_replace("[ñ]","n",$s);
$s = str_replace("[Ñ]","N",$s);
return $s;
}

function borrar_archivos($prefijo, $dir, $extension, $segundos)
{
    //Borrar los ficheros con una extension determinada temporales mas antiguos de  $prefijo*.xxx
    $t=time();
    $h=opendir($dir);
	$largo=strlen($prefijo);
    while($file=readdir($h))
    {
        if(substr($file,0,$largo)==$prefijo and substr($file,-4)=='.'.$extension)
        {
            $path=$dir.'/'.$file;
            if($t-filemtime($path)>$segundos) // 3600=hora 1200=20mins
                @unlink($path);
        }
    }
    closedir($h);
}


function Plantilla_RTF($Plantilla,$Ruta,$NuevoDoc,$Variables,$CharAbre,$CharCierra,$Valores,$SqlQry,$ConexDataSql){
/* Función para generar RTF
	$Plantilla  =	Ruta y nombre de archivo RTF que sera la plantilla	=>  /carpeta/archivo.rtf
	$Ruta		=	Ruta en donde se generará el archivo nuevo			=>  /carpeta/nuevos/
	$NuevoDoc	=	Nombre del nuevo archivo RTF a generar				=>  nuevo_archivo.rft
	$Variables	=	Variables dentro de la plantilla que se 
					reemplazaran con valores nuevos.					=>  array("Nombre","Cargo")
	$CharAbre	=	Conjunto de caracteres que indican dentro de la 
					plantilla, donde empiezan las variables a reemplazar=>	\$ = $ ó #*
	$CharCierra	=	Conjunto de caracteres que indican dentro de la 
					plantilla, donde empiezan las variables a reemplazar=>	"" = nada ó *#
	$Valores	=	Valores que reemplazaran las variables de 
					la plantilla, puede ser texto o una consulta SQL.	=>  array("Oscar","Admin") ó 
																		    "select * from tabla"
	$SqlQry		=	Indicandor de uso de consulta SQL.					=>  0=False  1=True
	$ConexDataSql=	Datos para la conexión con els ervidor de MySql		=>  array('host','user','pass')
	
	Resuldado	:	Genera el archivo RTF con los parametros ingresados y devuelve la ruta del mismo.
*/
	$NuevoDoc=$Ruta.$NuevoDoc;
	$txtplantilla=file_get_contents($Plantilla);
	$matriz=explode("sectd",$txtplantilla);
	$cabecera=$matriz[0]."sectd";
	$inicio=strlen($cabecera);
	$final=strrpos($txtplantilla,"}");
	$largo=$final-$inicio;
	$cuerpo=substr($txtplantilla,$inicio,$largo);
	$punt=fopen($NuevoDoc,"wb");
	fputs($punt,$cabecera);
	if($SqlQry && $ConexDataSql){
		if(!$ConexDataSql){$ConexDataSql[0]="localhost"; $ConexDataSql[1]="root"; $ConexDataSql[2]="osc445";}
		$link=mysql_pconnect($ConexDataSql[0],$ConexDataSql[1],$ConexDataSql[2]);
		$con=mysql_query($Valores,$link)or die(mysql_error());
		mysql_close($link);
		$row=mysql_fetch_array($con);
	}else{$row=$Valores;}
	$despues=$cuerpo;
	for($x=0; $x<count($Variables); $x++){$nvariables[$x][0]=$CharAbre.$Variables[$x].$CharCierra;}
	$n=0;
	foreach($nvariables as $dato){
		$datosql=utf8_decode(str_replace('\\','Ñ',utf8_encode($row[$n])));
		#$datosql=utf8_decode(str_replace('\\','Ñ',utf8_encode(utf8_decode($row[$n])))); //Checar \
		$datortf=$dato[0];
		$despues=str_replace($datortf,$datosql,$despues);
		$despues=str_replace(strtoupper($datortf),$datosql,$despues);
		$despues=str_replace(strtolower($datortf),$datosql,$despues);
		$n++;
	}
	fputs($punt,$despues);
	#$saltopag="\par \page \par"; fputs($punt,$saltopag);	
	fputs($punt,"}");
	fclose($punt);
	return $NuevoDoc;
}

function LogTxt($nom, $u, $n, $g, $ub, $r){
# Función para crear archivo log .txt con movimientos dentro del sistema
# acceso(nombre_archivo, usuario ID, usuario_nombre, usuario, nivel, ruta)
$fec = date("Y_m_d");
if($_SERVER["HTTP_X_FORWARDED_FOR"])
{
	if($pos=strpos($_SERVER["HTTP_X_FORWARDED_FOR"]," "))
	{
		$ip_loc = substr($_SERVER["HTTP_X_FORWARDED_FOR"],0,$pos);
		$ip_pub = substr($_SERVER["HTTP_X_FORWARDED_FOR"],$pos+1);
	}else{$ip_pub=$_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	if($_SERVER["REMOTE_ADDR"])
		$proxy = $_SERVER["REMOTE_ADDR"];
}else{$ip_pub=$_SERVER["REMOTE_ADDR"];
}
$s = "|";	//separador
$page_ant = $_SERVER['HTTP_REFERER'];
$page = $_SERVER['PHP_SELF'];  
#$hostname=gethostbyaddr($ip_pub);
if($ip_pub!=$hostname){	$host = $hostname; }
$f = date("d-m-Y H:i:s");
$nav = $_SERVER['HTTP_USER_AGENT'];
$archivo = $r."log/".$nom."_".$fec.".txt";
$fp = fopen($archivo, "a+");
# FECHA | USUARIO | NOMBRE | GRUPO | UBICACION | IP PUBLICA | IP LOCAL | NOMBRE DE PC | NAVEGADOR | URL ANTERIOR | URL ACTUAL
#$texto = $f."$s".$u."$s".$n."$s".$e."$s".$ub."$s".$ip_pub."$s".$ip_loc."$s".$host."$s".$nav."$s".$page_ant."$s".$page."\r\n";
$texto = $f."$s".$u."$s".$n."$s".$g."$s".$ub."$s".$ip_pub."$s".$ip_loc."$s".$host."$s".$nav."$s".$page_ant."$s".$page."\r\n";
$write = fputs($fp, $texto);
fclose($fp);
return ;
}

function breadcrumbs($home = 'Inicio', $separator = '>') {
## Crea la barra de navegación para el usuario
## @params $home String, $separatos String (puede ser un caracter o la ruta de una imagen)
	global $Raiz;
	$home=(!$Raiz['sitefolder']?ucwords($home):ucwords($Raiz['sitefolder']));
	#$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
	$rootPath = explode($Raiz['sitefolder'].'/', $_SERVER['REQUEST_URI']);
	$path = array_filter(explode('/', $rootPath[1]));
	$base = $Raiz['url'];
	$breadcrumbs = array(':: <a rel="nofollow" href="'. $base .'">'. $home .'</a>');	
	$last = end(array_keys($path));	 
	foreach ($path as $x => $crumb) {
		$base.=$crumb.'/';
		$title = ucwords(str_replace(array('.php', '_', '-'), array('', ' ', ' '), $crumb));	 
		if ($x != $last) {
			$breadcrumbs[] = '<a rel="nofollow" href="'. $base .'">'. $title .'</a>';
		} else {
			$breadcrumbs[] = $title;
		}
	}
	if(strlen($separator)>3){
		$separator="&nbsp;<img src='$separator' border='0' align='middle'>&nbsp;";
	}
	return implode($separator, $breadcrumbs);
}
/*O3M*/
?>
