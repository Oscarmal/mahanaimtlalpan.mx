<?php
##Content
$menuizq = new Template($PathTPL.$menuIzqTpl);
$content = new Template($PathTPL.$contentTpl);
$content->set("MenuIzq", "MenuIzq <br/>".$menuizq->output());
$content->set("Contenido", $contentHTML);
$content->set("FOOTER", $footer->output());
?>