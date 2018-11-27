<?php
foreach ($tab_u as $u)
    echo '<p><a href="index.php?controller=utilisateur&action=read&login=' . rawurlencode($u->getLogin()) . '"> Utilisateur d\'identifiant ' . htmlspecialchars($u->getLogin()) . '.</a></p>';
?>
