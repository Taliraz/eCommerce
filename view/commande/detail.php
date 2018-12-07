<?php
require_once File::build_path(array("model","ModelUtilisateur.php"));

	echo '<p> référence Commande: '.$p->getId().'</p>
		<p> login client: '.htmlspecialchars($p->getLoginUtilisateur()).'</p>
		<p> prix: '.htmlspecialchars($p->getPrix()).'</p>
		<p> Date: '.htmlspecialchars($p->getDate()).'</p><br>';
	foreach ($p->getTabProduit() as $key => $value) {
		echo '<p> <strong>produit:</strong> '.htmlspecialchars(ModelProduit::select($key)->getNom()).'</p><p> <strong>quantite:</strong> '.htmlspecialchars($value).'</p><br>';
	}
  ?>