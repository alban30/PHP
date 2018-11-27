<?php
require_once (File::build_path(array("model", "ModelVoiture.php"))); // chargement du modèle

class ControllerVoiture {
    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD

        $pagetitle = "Liste de voitures";
        $controller = "voiture";
        $view = "list";
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function read() {
        $v = ModelVoiture::getVoitureByImmat($_GET['immat']);   //appel au modèle pour gerer la BD

        if(!$v) {
            $pagetitle = "Erreur";
            $controller = "voiture";
            $view = "error";
        }
        else {
            $pagetitle = "Affichage d'une voiture";
            $controller = "voiture";
            $view = "detail";
        }
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function create() {
        $pagetitle = "Création d'une voiture";
        $controller = "voiture";
        $view = "create";
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function created() {
        $v = new ModelVoiture($_POST['marque'], $_POST['couleur'], $_POST['immatriculation']);
        $v->save();

        $pagetitle = "Voiture créée";
        $controller = "voiture";
        $view = "created";

        $tab_v = ModelVoiture::getAllVoitures();
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }
}
?>
