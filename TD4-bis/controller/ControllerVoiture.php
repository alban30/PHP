<?php
require_once ('../model/ModelVoiture.php'); // chargement du modèle
class ControllerVoiture {
    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures();  //appel au modèle pour gerer la BD
        require ('../view/voiture/list.php'); //"redirige" vers la vue
    }

    public static function read() {
        $v = ModelVoiture::getVoitureByImmat($_GET['immat']);  //appel au modèle pour gerer la BD
        if(!$v) {
          require ('../view/voiture/error.php'); //"redirige" vers la vue
        }
        else {
          require ('../view/voiture/detail.php'); //"redirige" vers la vue
        }
    }

    public static function create() {
        require ('../view/voiture/create.php'); //"redirige" vers la vue
    }

    public static function created() {
        $v = new ModelVoiture($_POST['marque'], $_POST['couleur'], $_POST['immatriculation']);
        $v->save();
        self::readAll();
    }
}
?>
