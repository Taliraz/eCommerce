<?php
require_once (File::build_path(array("model","ModelUtilisateur.php"))); // chargement du modèle
require_once (File::build_path(array("lib","Security.php")));
require_once (File::build_path(array("model","ModelProduit.php")));

class ControllerPanier{


	public static function readAll(){
		$tabcookie=unserialize($_COOKIE["Panier"]);
		$controller='panier';
    	$view='list';
    	$pagetitle='Panier';
    	require(File::build_path(array("view","view.php")));
	}


	public static function add(){
		$produit=ModelProduit::select($_GET['idProduit']);
		if (isset($_COOKIE['Panier'])){
			$tabcookie=unserialize($_COOKIE['Panier']);
		}
		$tabcookie[$produit->getId()]=$produit;
		setcookie("Panier", serialize($tabcookie));
		$controller='produit';
		$view='detail';
		$pagetitle='ajouté au panier';
		$p=$produit;
		require(File::build_path(array("view","view.php")));
	}

	public static function delete(){
		$produit=ModelProduit::select($_GET['idProduit']);
		if (isset($_COOKIE['Panier'])){
			$tabcookie=unserialize($_COOKIE['Panier']);
			unset($tabcookie[$produit->getId()]);
			setcookie("Panier", serialize($tabcookie));
			header("Location: index.php?action=readAll&controller=panier");
		}
	}

	public static function deleteAll(){
		$tabcookie=array();
		setcookie("Panier", serialize($tabcookie));
		ControllerProduit::readAll();
	}
}
?>