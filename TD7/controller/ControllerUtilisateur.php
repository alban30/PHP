<?php
require_once (File::build_path(array("model", "ModelUtilisateur.php")));

class ControllerUtilisateur {
	protected static $object = "utilisateur";

	public static function readAll() {
    	$tab_u = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD

        $pagetitle = "Liste d'utilisateurs";
        $view = "list";

        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function read() {
        $u = ModelUtilisateur::select($_GET['login']);   //appel au modèle pour gerer la BD

        if(!$u) {
            $pagetitle = "Erreur";
            $view = "error";
        }
        else {
            $pagetitle = "Affichage d'un utilisateur";
            $view = "detail";
        }
        
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function create() {
        $u = new ModelUtilisateur();
        $modifier = "required";
        $target_action = "created";

        if(!$u) {
            $pagetitle = "Erreur";
            $view = "error";
        }
        else {
            $pagetitle = "Création d'un utilisateur";
            $view = "update";
        }

        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function created() {
        ModelUtilisateur::save(array("login"=>$_POST['login'], "nom"=>$_POST['nom'], "prenom"=>$_POST['prenom']));
        $tab_u = ModelUtilisateur::selectAll();

        $pagetitle = "Utilisateur créé";
        $view = "created";

        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function update() {
        $u = ModelUtilisateur::select($_GET['login']);
        $modifier = "readonly";
        $target_action = "updated";

        if(!$u) {
            $pagetitle = "Erreur";
            $view = "error";
        }
        else {
            $pagetitle = "Modification d'un utilisateur";
            $view = "update";
        }

        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vues
    }

    public static function updated() {
        ModelUtilisateur::update(array("login" => $_POST['login'], "nom" => $_POST['nom'], "prenom" => $_POST['prenom']));
        $tab_u = ModelUtilisateur::selectAll();

        $pagetitle = "Utilisateur modifié";
        $view = "updated";

        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function delete() {
        $login = $_GET['login'];
        ModelUtilisateur::delete($login);
        $tab_u = ModelUtilisateur::selectAll();

        if(!$login) {
            $pagetitle = "Erreur";
            $view = "error";
        }
        else {
            $pagetitle = "Suppression d'un utilisateur";
            $view = "deleted";
        }
        
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vues
    }
}

?>