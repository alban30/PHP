<?php
foreach ($tab_v as $v)
    echo '<p><a href="index.php?action=read&immat=' . rawurlencode($v->getImmatriculation()) . '"> Voiture d\'immatriculation ' . htmlspecialchars($v->getImmatriculation()) . '.</a></p>';
?>
