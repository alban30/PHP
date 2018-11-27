<?php
require_once (File::build_path(array("model", "ModelVoiture.php"))); // chargement du modèle
class ControllerVoiture {
    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures();  //appel au modèle pour gerer la BD
        require_once (File::build_path(array("view", "view.php"))); //"redirige" vers la vue
    }

    public static function read() {
        $v = ModelVoiture::getVoitureByImmat($_GET['immat']);  //appel au modèle pour gerer la BD
        if(!$v) {
          require_once (File::build_path(array("view", "view.php"))); //"redirige" vers la vue
        }
        else {
          require_once (File::build_path(array("view", "view.php"))); //"redirige" vers la vue
        }
    }

    public static function create() {
        require_once (File::build_path(array("view", "view.php"))); //"redirige" vers la vue
    }

    public static function created() {
        $v = new ModelVoiture($_POST['marque'], $_POST['couleur'], $_POST['immatriculation']);
        $v->save();
        require_once (File::build_path(array("view", "view.php"))); //"redirige" vers la vue
    }
}
?>
