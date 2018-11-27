<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Test Voiture </title>
    </head>

    <body>
        <?php
            require_once 'Voiture.php';
            $voiture1 = new Voiture('Renault', 'bleu', '256AB42');
            $voiture1->afficher();
        ?>
    </body>
</html>
