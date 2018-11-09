<?php
require_once File::build_path(array("model","Model.php"));
class ModelProduit{
	private $idProduit;
	private $nomProduit;
	private $prixProduit;
	private $origineProduit;
	private $poidProduit;
	private $couleurProduit;
	private $paysProduit;
	private $imageProduit;

	public function __construct($n=NULL,$pr=NULL,$o=NULL,$po=NULL,$c=NULL,$pa=NULL,$i=NULL){
		if (!is_null($n) && !is_null($pr) && !is_null($ca) && !is_null($po) && !is_null($co) && !is_null($pa)){
			$this->nomProduit=$n;
			$this->prixProduit=$pr;
			$this->origineProduit=$o;
			$this->poidProduit=$po;
			$this->couleurProduit=$c;
			$this->paysProduit=$pa;
			$this->imageProduit=$i;
		}
	}

	public function getId(){
		return $this->idProduit;
	}

	public function getNom(){
		return $this->nomProduit;
	}

	public function getPrix(){
		return $this->prixProduit;
	}

	public function getOrigine(){
		return $this->origineProduit;
	}

	public function getPoid(){
		return $this->poidProduit;
	}

	public function getCouleur(){
		return $this->couleurProduit;
	}

	public function getPays(){
		return $this->paysProduit;
	}

	public function getImage(){
		return $this->imageProduit;
	}

	public function setNom($Pnom){
		$this->nomProduit=$Pnom;
	}

	public function setPrix($Pprix){
		$this->prixProduit=$Pprix;
	}

	public function setOrigine($Porigine){
		$this->origineProduit=$Porigine;
	}

	public function setPoid($Ppoid){
		$this->poidProduit=$Ppoid;
	}

	public function setCouleur($Pcouleur){
		$this->couleurProduit=$Pcouleur;
	}

	public function setPays($Ppays){
		$this->paysProduit=$Ppays;
	}

	public function setImage($Pimage){
		$this->imageProduit=$Pimage;
	}

	public static function getAllProduits(){
		$pdo=Model::$pdo;
		$rep=$pdo->query("SELECT * FROM P_Produit");
		$rep->setFetchMode(PDO::FETCH_CLASS,'ModelProduit');
		$tab_produit=$rep->fetchAll();
		return $tab_produit;
	}

	public static function getProduitById($id) {
	    $sql = "SELECT * from P_Produits WHERE idProduit=:idProduit";
	    $req_prep = Model::$pdo->prepare($sql);

	    $values = array(
	        "idProduit" => $id,
	    );  
	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
	    $tab_produit = $req_prep->fetchAll();
	    if (empty($tab_produit)){
	        return false;
	    }
	    return $tab_produit[0];
	}

	public static function getProduitByNom($nom) {
	    $sql = "SELECT * from P_Produits WHERE nomProduit=:nomProduit";
	    $req_prep = Model::$pdo->prepare($sql);

	    $values = array(
	        "nomProduit" => $nom,
	    );  
	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
	    $tab_produit = $req_prep->fetchAll();
	    if (empty($tab_produit)){
	        return false;
	    }
	    return $tab_produit;
	}

	public static function getProduitByPrix($prix) {
	    $sql = "SELECT * from P_Produits WHERE prixProduit=:prixProduit";
	    $req_prep = Model::$pdo->prepare($sql);

	    $values = array(
	        "prixProduit" => $prix,
	    );  
	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
	    $tab_produit = $req_prep->fetchAll();
	    if (empty($tab_produit)){
	        return false;
	    }
	    return $tab_produit;
	}

	public static function getProduitByOrigine($origine) {
	    $sql = "SELECT * from P_Produits WHERE origineProduit=:origineProduit";
	    $req_prep = Model::$pdo->prepare($sql);

	    $values = array(
	        "origineProduit" => $origine,
	    );  
	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
	    $tab_produit = $req_prep->fetchAll();
	    if (empty($tab_produit)){
	        return false;
	    }
	    return $tab_produit;
	}

	public static function getProduitByPoid($poid) {
	    $sql = "SELECT * from P_Produits WHERE poidProduit=:poidProduit";
	    $req_prep = Model::$pdo->prepare($sql);

	    $values = array(
	        "poidProduit" => $poid,
	    );  
	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
	    $tab_produit = $req_prep->fetchAll();
	    if (empty($tab_produit)){
	        return false;
	    }
	    return $tab_produit;
	}

	public static function getProduitByCouleur($couleur) {
	    $sql = "SELECT * from P_Produits WHERE couleurProduit=:couleurProduit";
	    $req_prep = Model::$pdo->prepare($sql);

	    $values = array(
	        "prixProduit" => $prix,
	    );  
	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
	    $tab_produit = $req_prep->fetchAll();
	    if (empty($tab_produit)){
	        return false;
	    }
	    return $tab_produit;
	}

	public static function getProduitByPays($pays) {
	    $sql = "SELECT * from P_Produits WHERE paysProduit=:paysProduit";
	    $req_prep = Model::$pdo->prepare($sql);

	    $values = array(
	        "paysProduit" => $pays,
	    );  
	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
	    $tab_produit = $req_prep->fetchAll();
	    if (empty($tab_produit)){
	        return false;
	    }
	    return $tab_produit;
	}

	public function save(){
    try{
      $req_prep=Model::$pdo->prepare("INSERT INTO P_Produits(nomProduit,prixProduit,origineProduit,poidProduit,couleurProduit,paysProduit,imageProduit)VALUES(:nomProduit,:prixProduit,:origineProduit,:poidProduit,:couleurProduit,:paysProduit,:imageProduit)");

      $values=array(
        "nomProduit" => $this->nom,
        "prixProduit" => $this->prix,
        "origineProduit" => $this->origine,
        "poidProduit" => $this->poid,
        "couleurProduit" => $this->couleur,
        "paysProduit" => $this->pays,
        "imageProduit" => $this->image,
        );
      $req_prep->execute($values);
    }
    catch(PDOException $e){
      if ($e->getCode()==23000){
        echo('<b>ERREUR: Le Produit existe déjà</b>');
        return false;
      }
    }

  }

  public function delete(){
    $req_prep=Model::$pdo->prepare("DELETE FROM P_Produits WHERE P_Produits.idProduit=:id");

    $values=array(
      "id" => $this->id,
      );
    $req_prep->execute($values);
  }



}