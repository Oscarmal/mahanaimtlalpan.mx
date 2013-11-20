<?php
##Content
$content = new Template($PathTPL.'index_content.tpl');
$content->set("MenuIzq", "MenuIzq <br/>".$menuizq->output());
$content->set("Contenido", "Contenido<br/>".$sql);
$content->set("FOOTER", $footer->output());
?>