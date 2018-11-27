<?php
  echo '<a style="margin-right: 1%" href="index.php?action=deleted&immat=' . htmlspecialchars($v->getImmatriculation()) . '">Supprimer cette voiture</a>';
  echo '<p> Voiture ' . htmlspecialchars($v->getImmatriculation()) . ' de marque ' . htmlspecialchars($v->getMarque()) . ' (couleur ' . htmlspecialchars($v->getCouleur()) . ') </p>';
?>
