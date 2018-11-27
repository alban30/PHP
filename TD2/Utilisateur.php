<?php
  class Utilisateur {

    private $login;
    private $nom;
    private $prenom;

    // un getter
    public function get($nom_attribut) {
      return $this->$nom_attribut;
    }

    // un setter
    public function set($nom_attribut, $valeur) {
      $this->$nom_attribut = $valeur;
    }

    public static function getAllVoitures() {
      $rep = Model::$pdo->query("SELECT * FROM utilisateur");
      $rep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
      return $rep->fetchAll();
    }

    // un constructeur
    public function __construct($data = null) {
      if(!is_null($data)) {
          $this->login = $data['login'];
          $this->nom = $data['nom'];
          $this->prenom = $data['prenom'];
      }
    }

    // une methode d'affichage.
    public function afficher() {
      echo '<ul>Login : ' . $this->login . ', Nom : ' . $this->nom . ', Prenom : ' . $this->prenom . '</ul>';
    }
  }
?>
