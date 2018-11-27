<?php
	require_once 'Model.php';
	require_once 'Voiture.php';

	// $tab_voit = Voiture::getAllVoitures();
	// foreach ($tab_voit as $voit) {
	// 	$voit->afficher();
	// }

	// $immat = Voiture::getVoitureByImmat('DG066CL');
	// $immat->afficher();

	$voiture = new Voiture('Fiat', 'Jaune', 'DG084LC');
	$voiture->save();

?>
