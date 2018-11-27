<?php
require_once (File::build_path(array("model", "Model.php")));

class ModelVoiture extends Model {
    protected static $object = "voiture";
    protected static $primary='immatriculation';

    private $marque;
    private $couleur;
    private $immatriculation;

    public function getMarque() {
        return $this->marque;
    }

    public function setMarque($marque2) {
        $this->marque = $marque2;
    }

    public function getCouleur() {
        return $this->couleur;
    }

    public function setCouleur($couleur2) {
        $this->couleur  = $couleur2;
    }

    public function getImmatriculation() {
        return $this->immatriculation;
    }

    public function setImmatriculation($immatriculation2) {
        if(strlen($immatriculation2) <= 8) {
            $this->immatriculation = $immatriculation2;
        }
    }

    public function __construct($data = array()) {
        if (!empty($data)) {
            $this->marque = $data("marque");
            $this->couleur = $data("couleur");
            $this->immatriculation = $data("immatriculation");
        }
    }

}
?>
