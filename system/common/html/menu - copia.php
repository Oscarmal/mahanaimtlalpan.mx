<?php 
#$Menu='<span onclick="javascript: Menu(\'Prueba\');" >Prueba</span> | ';
$Menu.='
<a href="'.$RaizUrl.'inicio.php" target="_self" class="link_menu">Inicio</a> | 
<a href="'.$RaizUrl.'inventarios/index.php" target="cuadro" class="link_menu">Inventario</a> | 
<a href="'.$RaizUrl.'contabilidad/index.php" target="cuadro" class="link_menu">Contabilidad</a> | 
<a href="'.$RaizUrl.'congregantes/index.php" target="cuadro" class="link_menu">Congregantes</a> | 
<a href="'.$RaizUrl.'admin/index.php" target="cuadro" class="link_menu">Administración</a> | 
<a href="'.$RaizUrl.'" target="_self" class="link_menu">Salir</a>';
#if(!empty($_POST['menuopc'])){echo $_POST['menuopc'];}else{echo $Menu;}
echo $Menu;
?>