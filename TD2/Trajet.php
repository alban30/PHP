<?php
  class Trajet {

    private $id;
    private $depart;
    private $arrivee;
    private $date;
    private $nbplaces;
    private $prix;
    private $conducteur_login;

    // un getter
    public function get($nom_attribut) {
      return $this->$nom_attribut;
    }

    // un setter
    public function set($nom_attribut, $valeur) {
      $this->$nom_attribut = $valeur;
    }

    public static function getAllVoitures() {
      $rep = Model::$pdo->query("SELECT * FROM trajet");
      $rep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');
      return $rep->fetchAll();
    }

    // un constructeur
    public function __construct($data = null) {
      if(!is_null($data)) {
        $this->id = $data['id'];
        $this->depart = $data['depart'];
        $this->arriveee = $data['arrivee'];
        $this->date = $data['date'];
        $this->nbplaces = $data['nbplaces'];
        $this->prix = $data['prix'];
        $this->conducteur_login = $data['conducteur_login'];
      }
    }
  }
?>
