<?php
require_once (File::build_path(array("model","ModelCommande.php")));
class ControllerCommande {
    protected static $object='commande';


	public static function readAll() {
        if (isset($_SESSION['estAdmin']) && $_SESSION['estAdmin']){
            $tab_c = ModelCommande::getAllCommandes();    
            $controller='commande';
            $view='list';
            $pagetitle='liste des Commandes';
            require (File::build_path(array("view","view.php"))); 
        }
        else{
            $tab_p=ModelProduit::selectAll();
            $controller='produit';
            $view='list';
            $pagetitle='Liste de produits';
            require(File::build_path(array("view","view.php")));
        }
    }

    public static function read(){
        if (isset($_SESSION['estAdmin']) && $_SESSION['estAdmin']){
        	$p=ModelCommande::getCommandeById($_GET ['idCommande']);
        	if ($p==false){
                $controller='commande';
                $view='erreur';
                $pagetitle='Erreur';
        		require (File::build_path(array("view","view.php")));
        	}
        	else{
                $controller='commande';
                $view='detail';
                $pagetitle='Detail';
        		require(File::build_path(array("view","view.php")));
        	}
        }
        else{
            $tab_p=ModelProduit::selectAll();
            $controller='produit';
            $view='list';
            $pagetitle='Liste de produits';
            require(File::build_path(array("view","view.php")));
        }
    	
    }
    public static function create(){
        $controller='commande';
        $view='create';
        $pagetitle='Creation de commande';
        require(File::build_path(array("view","view.php")));
    }

   public static function created(){
    if (isset($_COOKIE['Panier']) && isset($_COOKIE['Total']) && isset($_SESSION['loginUtilisateur'])){
        foreach (unserialize($_COOKIE['Panier']) as $key => $value) {
            $tabProduit[$key]=$value[1];
        }
        $ModelCommande=new ModelCommande($_SESSION['loginUtilisateur'],unserialize($_COOKIE['Total']),$tabProduit);
        $ModelCommande->save();
        $controller='produit';
        $view='list';
        $pagetitle='Commande créée';
        require(File::build_path(array("view","view.php")));
    }
    else{
        echo 'vous devez être connecté et avoir des articles dans le panier';
        $controller='produit';
        $view='list';
        $pagetitle='Commande créée';
        require(File::build_path(array("view","view.php")));
    }
}


	
}
?>