<?php 
#$Menu='<span onclick="javascript: Menu(\'Prueba\');" >Prueba</span> | ';
$Menu.='

<a href="#" onclick=\'load_page("contenido","'.$RaizUrl.'1.php")\'  class="link_menu">Inicio</a> | 
<a href="#" onclick=\'load_page("contenido","'.$RaizUrl.'inventarios/index.php")\' class="link_menu">Inventario</a> | 
<a href="#" onclick=\'load_page("contenido","'.$RaizUrl.'contabilidad/index.php")\' class="link_menu">Contabilidad</a> | 
<a href="#" onclick=\'load_page("contenido","'.$RaizUrl.'congregantes/index.php")\' class="link_menu">Congregantes</a> | 
<a href="#" onclick=\'load_page("contenido","'.$RaizUrl.'admin/index.php")\' class="link_menu">Administración</a> | 
<a href="'.$RaizUrl.'" target="_self" class="link_menu">Salir</a>';
#if(!empty($_POST['menuopc'])){echo $_POST['menuopc'];}else{echo $Menu;}
echo $Menu;
?>