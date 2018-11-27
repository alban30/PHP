<?php
  require_once (File::build_path(array("controller", "ControllerVoiture.php")));

  if(isset($_GET['action']))
		{
			$action = $_GET['action'];
		}
		else
		{
			$action = "readAll";
		}

		if(in_array($action, get_class_methods('ControllerVoiture')))
		{
      ControllerVoiture::$action();
		}
		else
		{
			$pagetitle='Erreur';
	        $view='error';
	        $controller = "voiture";
			require_once (File::build_path(array("view", "view.php")));
		}
?>
