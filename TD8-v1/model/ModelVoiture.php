<?php
require_once (File::build_path(array("model", "Model.php")));

class ModelVoiture extends Model {
    protected static $object = "voiture";
    protected static $primary='immatriculation';

    private $marque;
    private $couleur;
    private $immatriculation;

    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
    		return false;
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
