<?php
//require_once File::build_path(array("model","Model.php"));
require_once "Model.php";
class ModelCommande extends Model{
	private $idCommande;
	private $loginUtilisateur;
	private $prixCommande;
	private $dateCommande;
	private $tabProduit;
	protected static $object='commande';
  	protected static $primary='idCommande';

	public function __construct($l=NULL,$p=NULL,$t=NULL){
		if (!is_null($l) && !is_null($p) && !is_null($t)){
			$this->loginUtilisateur=$l;
			$this->prixCommande=$p;
			$this->tabProduit=$t;
		}
	}

	public function getId(){
		return $this->idCommande;
	}

	public function getLoginUtilisateur(){
		return $this->loginUtilisateur;
	}

	public function getPrix(){
		return $this->prixCommande;
	}

	public function getDate(){
		return $this->dateCommande;
	}

	public function setId($Pid){
		$this->idCommande=$Pid;
	}

	public function getTabProduit(){
		return $this->tabProduit;
	}

	public function setLoginUtilisateur($PloginUtilisateur){
		$this->loginUtilisateur=$PloginUtilisateur;
	}

	public function setPrix($Pprix){
		$this->prixCommande=$Pprix;
	}

	public function setTabProduit($PtabProduit){
		$this->tabProduit=$PtabProduit;
	}

	public function setDate($Pdate){
		$this->dateCommande=$Pdate;
	}

	public static function getCommandeById($idCommande) {
	    $sql = "SELECT * from P_Commandes c JOIN P_EstCommande e ON e.idCommande=c.idCommande  WHERE c.idCommande=:idCommande";
	    $req_prep = Model::$pdo->prepare($sql);

	    $values = array(
	        "idCommande" => $idCommande,
	    );  
	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_ASSOC);
	    $tab_commande = $req_prep->fetchAll();
	    if (empty($tab_commande)){
	        return false;
	    }
	    foreach ($tab_commande as $tableau =>$donnees) {
	    	$idcommande=$donnees['idCommande'];
	    	$loginUtilisateur=$donnees['loginUtilisateur'];
	    	$prixCommande=$donnees['prixCommande'];
	    	$dateCommande = $donnees['dateCommande'];
	    	$tabProduit[$donnees['idProduit']]=$donnees['quantite'];
	    }
	    $retour=new ModelCommande($loginUtilisateur,$prixCommande,$tabProduit);
	    $retour->setId($idCommande);
	    $retour->setDate($dateCommande);

	    return $retour;
	}


	public static function getAllCommandes(){
		$rep=Model::$pdo->query("SELECT * from P_Commandes ");
	    $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
	    $tab = $rep->fetchAll();
	    return $tab;
	}


	public function save(){
    try{
      $req_prep=Model::$pdo->prepare("INSERT INTO P_Commandes(loginUtilisateur,prixCommande, dateCommande)VALUES(:loginUtilisateur,:prixCommande, NOW())");

      $values=array(
        "loginUtilisateur" => $this->loginUtilisateur,
        "prixCommande" => $this->prixCommande
        );
      $req_prep->execute($values);

    }
    catch(PDOException $e){
        echo('<b>ERREUR: Le Commande existe déjà</b>');
        return false;
    }
    $reqmultiple=Model::$pdo->prepare("INSERT INTO P_EstCommande(idCommande,idProduit,quantite)VALUES(:idCommande,:idProduit,:quantite)");
    $commande=Model::$pdo->lastInsertId();
    foreach ($this->tabProduit as $key => $produit) {
    	$values=array(
    		"idCommande"=>$commande,
    		"idProduit"=>$key,
    		"quantite"=>$produit
    		);
    	$reqmultiple->execute($values);
    	# code...
    }


  }



}