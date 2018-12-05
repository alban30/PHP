<?php
if(Session::is_admin()) {
		echo '<a style="margin-right: 1%" href="index.php?controller=utilisateur&action=delete&login=' . htmlspecialchars($u->get("login")) . '">Supprimer cet utilisateur</a>';
		echo '<a style="margin-right: 1%" href="index.php?controller=utilisateur&action=update&login=' . htmlspecialchars($u->get("login")) . '">Modifier cet utilisateur</a>';
}
if(Session::is_user($_GET["login"]) && !Session::is_admin()) {
		echo '<a style="margin-right: 1%" href="index.php?controller=utilisateur&action=update&login=' . htmlspecialchars($u->get("login")) . '">Modifier cet utilisateur</a>';
}
echo '<p> Utilisateur ' . htmlspecialchars($u->get("login")) . ' de nom ' . htmlspecialchars($u->get("nom")) . ' et de prenom ' . htmlspecialchars($u->get("prenom")) . '</p>';
?>
