<?php
if(Session::is_admin()) {
	echo '<a style="margin-right: 1%" href="index.php?controller=utilisateur&action=delete&login=' . htmlspecialchars($u->getLogin()) . '">Supprimer cet utilisateur</a>';
	echo '<a style="margin-right: 1%" href="index.php?controller=utilisateur&action=update&login=' . htmlspecialchars($u->getLogin()) . '">Modifier cet utilisateur</a>';
}
if(Session::is_user($_GET["login"]) && !Session::is_admin()) {
	echo '<a style="margin-right: 1%" href="index.php?controller=utilisateur&action=update&login=' . htmlspecialchars($u->getLogin()) . '">Modifier cet utilisateur</a>';
}
echo '<p> Utilisateur ' . htmlspecialchars($u->getLogin()) . ' de nom ' . htmlspecialchars($u->getNom()) . ' et de prenom ' . htmlspecialchars($u->getPrenom()) . '</p>';
?>
