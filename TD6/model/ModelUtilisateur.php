<?php
require_once (File::build_path(array("model", "Model.php")));

class ModelUtilisateur extends Model {
	protected static $object = "utilisateur";
	protected static $primary='login';

	private $login;
	private $nom;
	private $prenom;

	public function getLogin() {
		return $this->login;
	}

	public function setLogin($marque2) {
		$this->login = $login2;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setNom($nom2) {
		$this->nom = $nom2;
	}

	public function getPrenom() {
		return $this->prenom;
	}

	public function setPrenom($prenom2) {
		$this->prenom = $prenom2;
	}

	public function __construct($data = array()) {
		if(!(empty($data))) {
			$this->login = $data["login"];
			$this->nom = $data["nom"];
			$this->prenom = $data["prenom"];
		}
	}

}