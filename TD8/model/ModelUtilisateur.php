<?php
require_once (File::build_path(array("model", "Model.php")));

class ModelUtilisateur extends Model {
	protected static $object = "utilisateur";
	protected static $primary="login";

	private $login;
	private $nom;
	private $prenom;
	private $email;
	private $mdp;
	private $nonce;
	private $admin;

	public function get($nom_attribut) {
			if(property_exists($this, $nom_attribut))
				return $this->$nom_attribut;
			return false;
	}

	public function set($nom_attribut, $valeur) {
			if (property_exists($this, $nom_attribut))
				$this->$nom_attribut = $valeur;
			return false;
    }

	public function __construct($data = array()) {
			if(!(empty($data))) {
					$this->login = $data["login"];
					$this->nom = $data["nom"];
					$this->prenom = $data["prenom"];
					$this->email = $data["email"];
					$this->mdp = $data["mdp"];
					$this->nonce = $data["nonce"];
					$this->admin = $data["admin"];
			}
	}

	public static function checkPassword($login, $mot_de_passe_chiffre) {
			try {
					$sql = "SELECT * FROM utilisateur WHERE login=:login AND mdp=:mdp";
					$req_prep = Model::$pdo->prepare($sql);

					$values = array("login" => $login, "mdp" => $mot_de_passe_chiffre);
					$req_prep->execute($values);

					$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
					$tab_u = $req_prep->fetchAll();

					if(empty($tab_u))
							return false;
					return true;

			} catch(PDOException $e) {
					if (Conf::getDebug()) {
							echo $e->getMessage(); // affiche un message d'erreur
					}
					else {
							echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
					}
					die();
			}
	}

}
