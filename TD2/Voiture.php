<?php
  class Voiture {

    private $marque;
    private $couleur;
    private $immatriculation;

    // un getter
    public function getMarque() {
      return $this->marque;
    }

    public function getCouleur() {
      return $this->couleur;
    }

    public function getImmatriculation() {
      return $this->immatriculation;
    }

    // un setter
    public function setMarque($marque2) {
      $this->marque = $marque2;
    }

    public function setCouleur($couleur2) {
      $this->couleur = $couleur2;
    }

    public function setImmatriculation($immatriculation2) {
      if(strlen($immatriculation2) <= 8) {
        $this->immatriculation = $immatriculation2;
      }
    }

    public static function getAllVoitures() {
      $rep = Model::$pdo->query("SELECT * FROM voiture");
      $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
      return $rep->fetchAll();
    }

    // un constructeur
    public function __construct($data = null) {
        if (!is_null($data)) {
          $this->marque = $data['marque'];
          $this->couleur = $data['couleur'];
          $this->immatriculation = $data['immatriculation'];
        }
    }

    // une methode d'affichage.
    public function afficher(){
      echo '<li> Voiture ' . $this->immatriculation . ' de marque ' . $this->marque . ' (couleur ' . $this->couleur . ') </li>';
    }
  }
?>
