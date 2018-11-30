<?php
require_once (File::build_path(array("model","ModelProduit.php")));
class ControllerProduit {
    protected static $object='produit';


	public static function readAll() {
        $tab_p = ModelProduit::selectAll();    
        $controller='produit';
        $view='list';
        $pagetitle='liste des Produits';
        require (File::build_path(array("view","view.php"))); 
    }

    public static function read(){
    	$p=ModelProduit::select($_GET ['idProduit']);
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
    if (!empty($_FILES['fichier']) && is_uploaded_file($_FILES['fichier']['tmp_name'])) {
        $name = $_FILES['fichier']['name'];
        $pic_path = File::build_path(array("img","$name"));
        if (!move_uploaded_file($_FILES['fichier']['tmp_name'], $pic_path)) {
          echo "La copie a échoué";
        }
    }
    $poidProduit=$_POST['poidProduit'];
    $unite=$_POST['unite'];
    $poidFinal=intval($poidProduit)*intval($unite);
    $imageProduit="http://webinfo.iutmontp.univ-montp2.fr/~armangaus/eCommerce/img/".$name;
    $ModelProduit=new ModelProduit($_POST['nomProduit'],$_POST['prixProduit'],$_POST['origineProduit'],$poidFinal,$_POST['couleurProduit'],$_POST['paysProduit'],$imageProduit);
    $ModelProduit->save();
    $controller='produit';
    $view='created';
    $pagetitle='Produit créé';
    require(File::build_path(array("view","view.php")));
    }

    public static function delete(){
        $id=$_GET ['id'];
        ModelProduit::delete($id);
        $tab_p=ModelProduit::selectAll();
        $controller='produit';
        $view='deleted';
        $pagetitle='produit supprimé';
        require(File::build_path(array("view","view.php")));
    }


	
}
?>