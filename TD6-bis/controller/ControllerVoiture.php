<?php
require_once (File::build_path(array("model", "ModelVoiture.php"))); // chargement du modèle
class ControllerVoiture {
    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures();  //appel au modèle pour gerer la BD

        $pagetitle='Liste des voitures';
        $controller='voiture';
        $view='list';

        require_once (File::build_path(array("view", "view.php"))); //"redirige" vers la vue
    }

    public static function read() {
        $v = ModelVoiture::getVoitureByImmat($_GET['immat']);  //appel au modèle pour gerer la BD

        if(!$v) {
          $controller='voiture';
          $pagetitle='Erreur';
          $view='error';
        }
        else {
          $pagetitle='Détail d\'une voiture';
          $controller='voiture';
          $view='detail';
        }

        require_once (File::build_path(array("view", "view.php"))); //"redirige" vers la vue
    }

    public static function create() {
        $pagetitle='Création d\'une voiture';
        $controller='voiture';
        $view='create';

        require_once (File::build_path(array("view", "view.php"))); //"redirige" vers la vue
    }

    public static function created() {
        $v = new ModelVoiture($_POST['marque'], $_POST['couleur'], $_POST['immatriculation']);
        $v->save();
        $tab_v = ModelVoiture::getAllVoitures();

        $pagetitle='Création d\'une voiture';
        $controller='voiture';
        $view='created';

        require_once (File::build_path(array("view", "view.php"))); //"redirige" vers la vue
    }

    public static function deleted() {
        if(isset($_GET['immat'])) {
            ModelVoiture::deleteByImmat($_GET['immat']);

            $tab_v = ModelVoiture::selectAll();

            $pagetitle='Supression d\'une voiture';
            $controller='voiture';
            $view='deleted';

            require (File::build_path(array("view", "view.php")));
        }
        else {
            self::readAll();
        }
  }
}
?>
