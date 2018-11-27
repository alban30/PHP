<?php
  if(empty($_POST)) {
    echo 'Formulaire vide';
  }
  else {
    require_once 'Voiture.php';
    $voiture1 = new Voiture($_POST['marque'], $_POST['couleur'], $_POST['immatriculation']);
    $voiture1->save();
  }
?>
