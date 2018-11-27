<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Voiture</title>
    </head>
    <body>
        <?php
          echo 'Voiture ' . $v->getImmatriculation() . ' de marque ' . $v->getMarque() . ' (couleur ' . $v->getCouleur() . ')';
        ?>
    </body>
</html>
