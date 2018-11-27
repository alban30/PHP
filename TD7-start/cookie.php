<?php
//setcookie("TestCookie", "Test", time() + 60);
//echo $_COOKIE["TestCookie"];
//setcookie("TestCookie", "Test", time() - 1);

$tab_cookie = array("1"=>"1", "2"=>"2", "3"=>"3");
setcookie("TestCookie", serialize($tab_cookie), time() + 60);
var_dump(unserialize($_COOKIE["TestCookie"]))
?>
