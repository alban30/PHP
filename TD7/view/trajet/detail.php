<?php
	echo '<a style="margin-right: 1%" href="index.php?controller=trajet&action=update&id=' . rawurlencode($t->get('id')) . '">Mettre a jour ce trajet</a>';
	echo '<a style="margin-right: 1%" href="index.php?controller=trajet&action=delete&id=' . rawurlencode($t->get('id')) . '">Supprimer ce trajet</a>';

	$t_depart = $t->get('depart');
	$t_arrivee = $t->get('arrivee');
	$t_date = $t->get('date');
	$t_nbplaces = $t->get('nbplaces');
	$t_prix = $t->get('prix');
	$t_conduteur = $t->get('conducteur_login');

 	echo <<< EOT
 		<p>
 		Trajet au depart de $t_depart 
 		et a destination de $t_arrivee 
 		le $t_date 
 		pour $t_nbplaces 
 		pour $t_prix$
 		conduit par 
 			<a href="index.php?controller=utilisateur&action=read&login=$t_conduteur">$t_conduteur</a>
 		</p>
EOT;
?>