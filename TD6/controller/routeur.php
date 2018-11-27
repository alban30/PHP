<?php
require_once (File::build_path(array("controller", "ControllerVoiture.php")));
require_once (File::build_path(array("controller", "ControllerUtilisateur.php")));
require_once (File::build_path(array("controller", "ControllerTrajet.php")));

if(isset($_GET['controller'])) {
	$controller = $_GET['controller'];
}
else {
	$controller = "voiture";
}

$controller_class = "Controller" . ucfirst($controller);

if(class_exists($controller_class)) {
	if(isset($_GET['action'])) {
    	$action = $_GET['action'];
	}
	else {
	    $action = "readAll";
	}

	if(in_array($action, get_class_methods($controller_class))) {
	    $controller_class::$action();
	}
	else {
	    $pagetitle = "Erreur";
	    $controller = "voiture";
	    $view = "error";

	    require (File::build_path(array("view", "view.php")));
	}
}
else {
	$pagetitle = "Erreur";
	$controller = "voiture";
	$view = "error";

	require (File::build_path(array("view", "view.php")));
}
?>
