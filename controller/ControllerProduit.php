<?php
require_once (File::build_path(array("model","ModelProduit.php")));
class ControllerProduit {


	public static function readAll() {
        $tab_p = ModelProduit::getAllProduit();    
        $controller='produit';
        $view='list';
        $pagetitle='liste des Produits';
        require (File::build_path(array("view","view.php"))); 
    }

    public static function read(){
    	$p=ModelProduit::getProduitById($_GET ['id']);
    	if ($p==false){
            $controller='produit';
            $view='erreur';
            $pagetitle='Erreur';
    		require (File::build_path(array("view","view.php")));
    	}
    	else{
            $controller='produit';
            $view='detail';
            $pagetitle='Detail';
    		require(File::build_path(array("view","view.php")));
    	}
    	
    }
    public static function create(){
        $controller='produit';
        $view='create';
        $pagetitle='Creation de produit';
        require(File::build_path(array("view","view.php")));
    }

   
	
}
?>