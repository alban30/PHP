<?php
  echo 'Voiture ' . htmlspecialchars($v->getImmatriculation()) . ' de marque ' . htmlspecialchars($v->getMarque()) . ' (couleur ' . htmlspecialchars($v->getCouleur()) . ')';
?>
