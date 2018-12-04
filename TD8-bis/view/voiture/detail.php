<?php
echo '<a style="margin-right: 1%" href="index.php?action=delete&immat=' . htmlspecialchars($v->getImmatriculation()) . '">Supprimer cette voiture</a>';
echo '<a style="margin-right: 1%" href="index.php?action=update&immat=' . htmlspecialchars($v->getImmatriculation()) . '">Modifier cette voiture</a>';
echo '<p> Voiture ' . htmlspecialchars($v->getImmatriculation()) . ' de marque ' . htmlspecialchars($v->getMarque()) . ' (couleur ' . htmlspecialchars($v->getCouleur()) . ') </p>';
?>
