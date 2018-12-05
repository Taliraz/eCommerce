<?php
require_once File::build_path(array("model","ModelUtilisateur.php"));

	echo '<p><img src="'.$p->getImage().'"alt="'.$p->getId().'" class="image_param"></p>
		<p> Nom: '.$p->getNom().'</p>
		<p> Poid: '.htmlspecialchars($p->getPoid()).'</p>
		<p> Couleur: '.htmlspecialchars($p->getCouleur()).'</p>
		<p> Prix: '.htmlspecialchars($p->getPrix()).'</p>
		<p> Origine: '.htmlspecialchars($p->getOrigine()).'</p>
		<p> Pays: '.htmlspecialchars($p->getPays()).'</p>
		<p><a href="index.php?controller=panier&action=add&idProduit='.$p->getId().'">Ajouter au Panier</a></P>';
   if(isset($_SESSION['loginUtilisateur']) && Session::is_admin()){
	   echo '<p><a title="supprimer" href="index.php?controller=produit&action=delete&idProduit='.rawurlencode($p->getId()).'">supprimer</a></p>';
	   echo '<p><a title="modifier" href="index.php?controller=produit&action=update&idProduit='.rawurlencode($p->getId()).'">modifier</a></p>';
	}
  ?>