<?php
##Index [framset]
$html = new Template($PathTPL.$htmlTpl);
$html->set("TITULO", "MahanaimTlalpan.mx");
$html->set("HEADER", $header->output());
$html->set("CONTENT", $content->output());
$html=$html->output();
echo $html;
?>