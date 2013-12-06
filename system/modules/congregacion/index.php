<?php session_name('maha_tlalpan'); session_start(); include($_SESSION['RaizLoc']."common/header.php"); ?>
<?php 
$contentHTML = "Congregación";
#include($PathTPL.'HTMLconstructor.php');
echo HTMLconstructor($contentHTML);
?>