<?php
require_once (File::build_path(array("model", "ModelTrajet.php"))); // chargement du modèle

class ControllerTrajet {
    protected static $object = "trajet";

    public static function readAll() {
            $tab_t = ModelTrajet::selectAll();     //appel au modèle pour gerer la BD

            $pagetitle = "Liste de trajets";
            $controller = "trajet";
            $view = "list";

            require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function read() {
            $t = Modeltrajet::select(myGet("id"));   //appel au modèle pour gerer la BD

            if(!$t) {
                $pagetitle = "Erreur";
                $controller = "trajet";
                $view = "error";
            }
            else {
                $pagetitle = "Affichage d'un trajet";
                $controller = "trajet";
                $view = "detail";
            }
            
            require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function create() {
            $t = new ModelTrajet();
            $modifier = "required";
            $target_action = "created";

            if(!$t) {
                $pagetitle = "Erreur";
                $view = "error";
            }
            else {
                $pagetitle = "Création d'un trajet";
                $view = "update";
            }

            require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function created() {
            ModelTrajet::save(array("id" => myGet("id"), "depart" => myGet("depart"), "arrivee" => myGet("arrivee"), "date" => myGet("date"), "nbplaces" => myGet("nbplaces"), "prix" => myGet("prix"), "conducteur_login" => myGet("conducteur_login")));
            $tab_t = ModelTrajet::selectAll();

            $pagetitle = "Trajet créé";
            $view = "created";

            require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
        }

    public static function update() {
            $t = Modeltrajet::select($_GET['id']);
            $modifier = "readonly";
            $target_action = "updated";

            if(!$t) {
                $pagetitle = "Erreur";
                $view = "error";
            }
            else {
                $pagetitle = "Modification d'un trajet";
                $view = "update";
            }

            require (File::build_path(array("view", "view.php")));  //"redirige" vers la vues
    }

    public static function updated() {
            ModelTrajet::update(array("id" => myGet("id"), "depart" => myGet("depart"), "arrivee" => myGet("arrivee"), "date" => myGet("date"), "nbplaces" => myGet("nbplaces"), "prix" => myGet("prix"), "conducteur_login" => myGet("conducteur_login")));
            $tab_t = Modeltrajet::selectAll();

            $pagetitle = "Trajet modifié";
            $view = "updated";

            require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function delete() {
            $id = myGet("id");
            ModelTrajet::delete($id);
            $tab_t = ModelTrajet::selectAll();

            if(!$id) {
                $pagetitle = "Erreur";
                $view = "error";
            }
            else {
                $pagetitle = "Suppression d'un trajet";
                $view = "deleted";
            }
            
            require (File::build_path(array("view", "view.php")));  //"redirige" vers la vues
    }
}
?>
