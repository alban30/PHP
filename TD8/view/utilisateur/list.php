<?php
foreach ($tab_u as $u) {
    	echo '<p><a href="index.php?controller=utilisateur&action=read&login=' . rawurlencode($u->get("login")) . '"> Utilisateur d\'identifiant ' . htmlspecialchars($u->get("login")) . '.</a></p>';
}
?>
