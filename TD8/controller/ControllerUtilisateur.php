<?php
require_once (File::build_path(array("model", "ModelUtilisateur.php")));
require_once (File::build_path(array("lib", "Security.php")));

class ControllerUtilisateur {
		protected static $object = "utilisateur";

		public static function readAll() {
				$tab_u = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD

				$pagetitle = "Liste d'utilisateurs";
				$view = "list";

				require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
  	}

    public static function read() {
				$u = ModelUtilisateur::select($_GET["login"]);   //appel au modèle pour gerer la BD

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
				if($_POST["mdp"] == $_POST["mdpc"]) {
						if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
								$nonce = Security::generateRandomHex();
								ModelUtilisateur::save(array("login" => $_POST["login"], "nom" => $_POST["nom"], "prenom" => $_POST["prenom"], "email" => $_POST["email"], "mdp" => Security::chiffrer($_POST["mdp"]), "nonce" => $nonce));

								$mail = '<p>Vous venez de vous inscrire sur <strong>Blablacar</strong>, pour confirmer votre inscription veuillez cliquer <a href="http://webinfo.iutmontp.univ-montp2.fr/~pereiraa/TD/PHP/TD8/index.php?controller=utilisateur&action=validate&login=' . $_POST['login'] . '&nonce=' . $nonce . '">ici</a>.<br/>Blablacar vous remercie ! <em>Blablachatte !</em></p>';
								mail($_POST['email'], "Inscription - Blablacar", $mail);

								$pagetitle = "Utilisateur créé";
								$view = "created";
						}
						else {
								$pagetitle = "Erreur";
								$view = "error";
						}
        }
        else {
            $pagetitle = "Erreur";
            $view = "error";
        }
        $tab_u = ModelUtilisateur::selectAll();

        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

		public static function update() {
    		if(Session::is_user($_GET["login"]) || Session::is_admin()) {
						$u = ModelUtilisateur::select($_GET["login"]);
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
				else {
						$pagetitle = "Erreur";
						$view = "error";
						require (File::build_path(array("view", "view.php")));  //"redirige" vers la vues
				}
    }

    public static function updated() {
				if($_POST["mdp"] == $_POST["mdpc"]) {
						if(Session::is_admin()) {
								if(isset($_POST["admin"]) && $_SESSION["admin"] == "1") {
										$admin = 1;
								}
								else {
									$admin = 0;
								}
								$update = array("login" => $_POST["login"], "nom" => $_POST["nom"], "prenom" => $_POST["prenom"], "email" => $_POST["email"], "mdp"=>Security::chiffrer($_POST["mdp"]), "admin"=>$admin);
						}
						else {
								$update = array("login" => $_POST["login"], "nom" => $_POST["nom"], "prenom" => $_POST["prenom"], "email" => $_POST["email"], "mdp"=>Security::chiffrer($_POST["mdp"]));
						}
        		ModelUtilisateur::update($update);
        		$pagetitle = "Utilisateur modifié";
        		$view = "updated";
				}
      	else {
        		$pagetitle = "Erreur";
        		$view = "error";
      	}
      	$tab_u = ModelUtilisateur::selectAll();

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

		public static function connect() {
				$pagetitle = "Connexion";
				$view = "connect";
				$target_action = "connected";

				require (File::build_path(array("view", "view.php")));
		}

		public static function connected() {
				$user = ModelUtilisateur::select($_POST["login"]);
				$bool = ModelUtilisateur::checkPassword($_POST["login"], Security::chiffrer($_POST["mdp"]));

				if($user->get("nonce") == NULL) {
						if($bool) {
								$_SESSION["login"] = $_POST["login"];
						}
						if(isset($_SESSION["login"]) && $user->get("admin") == 1) {
								$_SESSION["admin"] = true;
						}
				}

				header("Location: index.php");
		}

		public static function deconnect() {
				session_unset();     // unset $_SESSION variable for the run-time
				session_destroy();   // destroy session data in storage
				// Il faut réappeler session_start() pour accéder de nouveau aux variables de session
				setcookie(session_name(), "", time()-1); // deletes the session cookie containing the session ID

				header("Location: index.php");
		}

		public static function validate() {
				$user = ModelUtilisateur::select($_GET["login"]);
				if($_GET["nonce"] == $user->get("nonce")) {
						ModelUtilisateur::update(array("login" => $user->get("login"), "nom" => $user->get("nom"), "prenom" => $user->get("prenom"), "mdp" => $user->get("mdp"), "email" => $user->get("email"), "nonce" => NULL));
						self::connect();
				}
				else {
						header("Location: index.php");
				}
		}
}

?>
