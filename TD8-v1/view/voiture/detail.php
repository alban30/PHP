<?php
echo '<a style="margin-right: 1%" href="index.php?action=delete&immat=' . htmlspecialchars($v->get("immatriculation")) . '">Supprimer cette voiture</a>';
echo '<a style="margin-right: 1%" href="index.php?action=update&immat=' . htmlspecialchars($v->get("immatriculation")) . '">Modifier cette voiture</a>';
echo '<p> Voiture ' . htmlspecialchars($v->get("immatriculation")) . ' de marque ' . htmlspecialchars($v->get("marque")) . ' (couleur ' . htmlspecialchars($v->get("couleur")) . ') </p>';
?>
