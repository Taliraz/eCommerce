<?php
require_once("ModelCommande.php");

$tab=ModelCommande::getAllCommandes();
foreach ($tab as $value) {
	echo '<p>'.$value->getId().'</p>';
	# code...
}
$loginUtilisateur="bob";
$prixCommande=5000;
$tabProduit[24]=12;
$tabProduit[25]=2;
$produit=new ModelCommande($loginUtilisateur,$prixCommande,$tabProduit);
$produit->save();
/*$test=ModelCommande::getCommandeByLoginAndPrix("bob",2000);
var_dump($test);*/

?>