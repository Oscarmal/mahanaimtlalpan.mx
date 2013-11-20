<?php
##Content
$content = new Template($PathTPL.'index_content.tpl');
$menuizq = new Template($PathTPL.'index_menuizq.tpl');
$content->set("MenuIzq", "MenuIzq <br/>".$menuizq->output());
$content->set("Contenido", "Inicio<br/>".$sql);
$content->set("FOOTER", $footer->output());
?>