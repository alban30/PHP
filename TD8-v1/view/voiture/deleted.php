<?php
echo '<p>La voiture ' . rawurlencode($immat) . ' a bien été supprimée !</p>';
require File::build_path(array("view", "voiture", "list.php"));
?>
