<?php
require_once (File::build_path(array("model", "ModelVoiture.php"))); // chargement du modèle

class ControllerVoiture {
    protected static $object = "voiture";

    public static function readAll() {
        $tab_v = ModelVoiture::selectAll();     //appel au modèle pour gerer la BD

        $pagetitle = "Liste de voitures";
        $controller = "voiture";
        $view = "list";

        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function read() {
        $v = ModelVoiture::select($_GET['immat']);   //appel au modèle pour gerer la BD

        if(!$v) {
            $pagetitle = "Erreur";
            $view = "error";
        }
        else {
            $pagetitle = "Affichage d'une voiture";
            $view = "detail";
        }
        
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function create() {
        $v = new ModelVoiture();
        $modifier = "required";
        $target_action = "created";

        if(!$v) {
            $pagetitle = "Erreur";
            $view = "error";
        }
        else {
            $pagetitle = "Création d'une voiture";
            $view = "update";
        }

        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function created() {
        ModelVoiture::save(array("marque"=>$_POST['marque'], "couleur"=>$_POST['couleur'], "immatriculation"=>$_POST['immatriculation']));
        $tab_v = ModelVoiture::selectAll();

        $pagetitle = "Voiture créée";
        $view = "created";

        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function update() {
        $v = ModelVoiture::select($_GET['immat']);
        $modifier = "readonly";
        $target_action = "updated";

        if(!$v) {
            $pagetitle = "Erreur";
            $view = "error";
        }
        else {
            $pagetitle = "Modification d'une voiture";
            $view = "update";
        }

        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vues
    }

    public static function updated() {
        ModelVoiture::update(array("immatriculation" => $_POST['immatriculation'], "marque" => $_POST['marque'], "couleur" => $_POST['couleur']));
        $tab_v = ModelVoiture::selectAll();

        $pagetitle = "Voiture modifiée";
        $view = "updated";

        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function delete() {
        $immat = $_GET['immat'];
        ModelVoiture::delete($immat);
        $tab_v = ModelVoiture::selectAll();

        if(!$immat) {
            $pagetitle = "Erreur";
            $view = "error";
        }
        else {
            $pagetitle = "Suppression d'une voiture";
            $view = "deleted";
        }
        
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vues
    }
}
?>
