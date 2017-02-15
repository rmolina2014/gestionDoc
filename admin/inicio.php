<?php
require_once("bd/db.php");
//require_once("controlador/tema_controlador.php");
//require_once("controlador/index_controlador.php");
//$url=$_GET['url'];

$url = $_GET['url'];
// index.php?url=home
if ($url) {
    require "controlador/".$url."_controlador.php";
}
else {
    header('HTTP/1.0 404 Not Found');
    require "controlador/404_controlador.php";
}


?>