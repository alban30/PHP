<?php
require_once (File::build_path(array("model", "Model.php")));

class ModelTrajet extends Model {
		protected static $object = "trajet";
		protected static $primary="id";

		private $id;
		private $depart;
		private $arrivee;
		private $date;
		private $nbplaces;
		private $prix;
		private $conducteur_login;

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
						$this->id = $data["id"];
						$this->depart = $data["depart"];
						$this->arrivee = $data["arrivee"];
						$this->date = $data["date"];
						$this->nbplaces = $data["nbplaces"];
						$this->prix = $data["prix"];
						$this->conducteur_login = $data["conducteur_login"];
				}
		}
}
