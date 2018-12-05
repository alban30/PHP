<?php
class Session {
    public static function is_user($login) {
        return (!empty($_SESSION['login']) && ($_SESSION['login'] == $login));
    }

    public static function is_admin() {
        return (!empty($_SESSION['admin']) && $_SESSION['admin']);
	  }

    public static function getUserMenu() {
        if(isset($_SESSION['login'])) {
            echo '<a href="index.php?action=deconnect&controller=utilisateur">Déconnexion</a>';
        }
        else {
            echo '<a href="index.php?action=connect&controller=utilisateur">Connexion</a>';
        }
    }
}
?>
