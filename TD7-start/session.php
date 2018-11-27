<?php
session_start();
$_SESSION["login"] = "alban";
$_SESSION["Desc"] = array("Desc"=>"Je m'appelle Alban Pereira, j'ai actuellement 20 ans");
echo $_SESSION["login"];
session_unset();
?>
