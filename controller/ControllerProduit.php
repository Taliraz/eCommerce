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

   public static function created(){
      $ModelProduit=new ModelProduit($_POST['nom'],$_POST['prix'],$_POST['origine'],$_POST['poid'],$_POST['couleur'],$_POST['pays'],$_POST['image']);
      $ModelProduit->save();
      $controller='produit';
      $view='created';
      $pagetitle='Produit créé';
      require(File::build_path(array("view","view.php")));
    }

    public static function delete(){
        $id=$_GET ['id'];
        ModelProduit::deleteById($id);
        $tab_p=ModelProduit::getAllProduits();
        $controller='produit';
        $view='deleted';
        $pagetitle='produit supprimé';
        require(File::build_path(array("view","view.php")));
    }


	
}
?>