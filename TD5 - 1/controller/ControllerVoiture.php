<?php
require_once (File::build_path(array("model", "ModelVoiture.php"))); // chargement du modèle

class ControllerVoiture {
    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
        require (File::build_path(array("view", "voiture", "list.php")));  //"redirige" vers la vue
    }

    public static function read() {
        $v = ModelVoiture::getVoitureByImmat($_GET['immat']);   //appel au modèle pour gerer la BD

        if(!$v) {
            require (File::build_path(array("view", "voiture", "error.php")));  //"redirige" vers la vue
        }
        else {
            require (File::build_path(array("view", "voiture", "detail.php")));  //"redirige" vers la vue
        }
    }

    public static function create() {
        require (File::build_path(array("view", "voiture", "create.php")));  //"redirige" vers la vue
    }

    public static function created() {
        $marque = $_POST['marque'];
        $couleur = $_POST['couleur'];
        $immat = $_POST['immatriculation'];

        $v = new ModelVoiture($marque, $couleur, $immat);
        $v->save();

        self::readAll();
    }
}
?>
