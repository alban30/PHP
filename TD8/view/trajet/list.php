<?php
foreach ($tab_t as $t) {
		echo '<p><a href="index.php?controller=trajet&action=read&id=' . rawurlencode($t->get('id')) . '">Trajet '. $t->get('id') . ' de ' . $t->get('depart') .' vers ' . $t->get('arrivee') . '</a></p>';
}
?>
