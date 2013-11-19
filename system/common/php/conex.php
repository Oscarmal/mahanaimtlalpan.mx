<?php /*O3M*/
###Conexión MySQL
if($_SERVER['HTTP_HOST']=='localhost'){
	$Server=$cfg['dbi_host_loc'];
	$User=$cfg['dbi_user_loc'];
	$Password=$cfg['dbi_pw_loc'];
	$DataBase=$cfg['dbi_db_loc'];
}else{
	$Server = $cfg['dbi_host_prod'];
	$User = $cfg['dbi_user_prod'];
	$Password = $cfg['dbi_pw_prod'];
	$DataBase = $cfg['dbi_db_prod'];
}
#global $Server,$User,$Password,$DataBase;
$DBIConex = array('Server'=>$Server,'User'=>$User,'Password'=>$Password,'DataBase'=>$DataBase);
###--
function SQLLink(){
# --------------------------------------------------------
# Author: Oscar Maldonado
# Created on: 2013-11-07
# Description : Conection to MySQL
	global $DBIConex;
	$Link=mysql_connect($DBIConex['Server'], $DBIConex['User'], $DBIConex['Password']) or die(mysql_error());
	mysql_select_db($DBIConex['DataBase'],$Link);
	mysql_query("SET NAMES 'utf8'", $Link);
	return $Link;
}
function SQLQuery($Sql='',$Table=0){
# --------------------------------------------------------
# Author: Oscar Maldonado
# Created on: 2013-11-07
# Description : Excecute a SELECT query and return the results
	if(!empty($Sql)){
		$Cmd=array('SELECT');
		$vSql=explode(' ',$Sql);
		if(in_array(strtoupper($vSql[0]),$Cmd)){
			$Link=SQLLink();
			$Con=mysql_query($Sql, $Link)or die(mysql_error());	
			$TotRows=mysql_num_rows($Con);
			$TotCols=mysql_num_fields($Con);
			if($TotRows){		
				$y=0;
				$rKeys=array_keys(mysql_fetch_array($Con));	
				foreach($rKeys as $rkey){	
				##Table Titles in $Rows[0]
					if($z){$Rows[$y][$x] = $rKeys[$x]; $z=0;}else{$z++;}	
					$x++;
				}
				$y++;
				mysql_data_seek($Con,0);
				while($Row=mysql_fetch_array($Con)){
				##First record in $Rows[1]
					for($x=0; $x<=$TotCols; $x++){$Rows[$y][$x] = utf8_decode($Row[$x]);}
					$y++;
				}			
				if($Table){
				##Debug mode - Print HTML table with query results.
					$Result .= "<table border='1'>";
					foreach($Rows as $Row){
						$Result .= "<tr>";
						foreach($Row as $Cell){$Result .= "<td>".$Cell."</td>";}
						$Result .= "</tr>";
					}
					$Result .= "</table>";
				}else{$Result = $Rows;}
			}else{$Result = 0;}
			mysql_free_result($Con); 
			mysql_close($Link);
		}else{$Result = "Error: Wrong SQL instruction";}
	}else{$Result = "Error: Empty sel-query";}
	return $Result;
}
function SQLExec($Sql=''){
# --------------------------------------------------------
# Author: Oscar Maldonado
# Created on: 2013-11-07
# Description : Execute a INSERT,UPDATE,DELETE query and return the affected rows
	if(!empty($Sql)){
		$Cmd=array('INSERT','UPDATE','DELETE');
		$vSql=explode(' ',$Sql);
		if(in_array(strtoupper($vSql[0]),$Cmd)){
			$Link=SQLLink();
			$Con=mysql_query($Sql, $Link)or die(mysql_error());	
			$TotRows=mysql_affected_rows();
			if($TotRows){$Result = $TotRows;}else{$Result = 0;}
			mysql_close($Link);
		}else{$Result = "Error: Wrong SQL instruction";}
	}else{$Result = "Error: Empty exe-query";}
	return $Result;
}
/*O3M*/
?>