<?php
foreach ($tab_v as $v) {
    	echo '<p><a href="index.php?action=read&immat=' . rawurlencode($v->get("immatriculation")) . '"> Voiture d\'immatriculation ' . htmlspecialchars($v->get("immatriculation")) . '.</a></p>';
}
?>
