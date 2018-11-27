<?php
require_once 'Trajet.php';
require_once 'Utilisateur.php';

$users = Trajet::findPassagers($_POST['trajet']);
foreach ($users as $user) {
  $user->afficher();
}

?>
