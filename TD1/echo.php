<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>

    <body>
        Voici le résultat du script PHP :
        <?php
            $voiture1 = array('marque' => 'Renault', 'couleur' => 'bleu', 'immatriculation' => '256AB34');
            $voiture2 = array('marque' => 'Peugeot', 'couleur' => 'noir', 'immatriculation' => '256AB35');
            $voiture3 = array('marque' => 'Mercedes', 'couleur' => 'grise', 'immatriculation' => '256AB36');
            $voitures = array($voiture1, $voiture2, $voiture3);

            if(empty($voitures)) {
              echo 'Liste de voitures vide';
            }
            else {
              foreach($voitures as $voiture) {
                echo '<li>Voiture ' . $voiture1['immatriculation'] . ' de marque ' . $voiture1['marque'] . ' (de couleur ' . $voiture1['couleur'] . ')</li>';
              }
            }
        ?>
    </body>
</html>
