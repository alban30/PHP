<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php
        foreach ($tab_v as $v)
            echo '<p><a href="index.php?action=read&immat=' . $v->getImmatriculation() . '"> Voiture d\'immatriculation ' . $v->getImmatriculation() . '.</a></p>';
        ?>
    </body>
</html>
