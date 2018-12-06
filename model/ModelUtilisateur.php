<?php
require_once File::build_path(array("model","Model.php"));
class ModelUtilisateur extends Model{
   
  private $loginUtilisateur;
  private $nomUtilisateur;
  private $prenomUtilisateur;
  private $mdpUtilisateur;
  private $estAdmin;
  private $mailUtilisateur;
  protected static $object='utilisateur';
  protected static $primary='loginUtilisateur';


      
  // un getter      
  public function getloginUtilisateur() {
       return $this->loginUtilisateur;  
  }
     
  // un setter 
  public function setloginUtilisateur($loginUtilisateur2) {
       $this->loginUtilisateur = $loginUtilisateur2;
  }

  public function getPrenomUtilisateur(){
    return $this->prenomUtilisateur;
  }

  public function getestAdmin(){
    return $this->estAdmin;
  }

  public function setImmmatriculation($prenomUtilisateur2){
    if(strlen($prenomUtilisateur2)>8){
      $this->prenomUtilisateur=$prenomUtilisateur2;
    }
  }

  public function getnomUtilisateur(){
    return $this->nomUtilisateur;
  }

  public function setnomUtilisateur($nomUtilisateur2){
    $this->nomUtilisateur=$nomUtilisateur2;
  }

  public function getmdpUtilisateur(){
    return $this->mdpUtilisateur;
  }

  public function setmdpUtilisateur($mdpUtilisateur2){
    $this->mdpUtilisateur=$mdpUtilisateur2;
  }

  public function setestAdmin($estAdmin2){
    $this->estAdmin=$estAdmin2;
  }

  public function getMailUtilisateur(){
    return $this->mailUtilisateur;
  }

  public function setMailUtilisateur($mailUtilisateur2){
    $this->mailUtilisateur=$mailUtilisateur2;
  }
      
  // un constructeur
  public function __construct($l=NULL, $n=NULL, $p=NULL,$m=NULL,$a=NULL,$ma=NULL)  {
    if (!is_null($l) && !is_null($n) && !is_null($p) && !is_null($m) && !is_null($a) && !is_null($ma)) {
      $this->loginUtilisateur = $l;
      $this->nomUtilisateur = $n;
      $this->prenomUtilisateur = $p;
      $this->mdpUtilisateur = $m;
      $this->estAdmin = $a;
      $this->mailUtilisateur=$ma;
    }
  } 

   public function save(){
    try{
      $req_prep=Model::$pdo->prepare("INSERT INTO P_Utilisateurs(loginUtilisateur,nomUtilisateur,prenomUtilisateur,mdpUtilisateur,estAdmin,mailUtilisateur)VALUES(:loginUtilisateur,:nomUtilisateur,:prenomUtilisateur,:mdpUtilisateur,:estAdmin, :mailUtilisateur)");

      $values=array(
        "loginUtilisateur" => $this->loginUtilisateur,
        "nomUtilisateur" => $this->nomUtilisateur,
        "prenomUtilisateur" => $this->prenomUtilisateur,
        "mdpUtilisateur" => $this->mdpUtilisateur,
        "estAdmin" => $this->estAdmin,
        "mailUtilisateur" => $this->mailUtilisateur
        );
      $req_prep->execute($values);
    }
    catch(PDOException $e){
      if ($e->getCode()==23000){
        echo('<b>ERREUR: La utilisateur existe déjà</b>');
        return false;
      }
    }

  }

  public function deleteOne(){
    $req_prep=Model::$pdo->prepare("DELETE FROM P_Utilisateurs WHERE utilisateur.loginUtilisateur=:loginUtilisateur");

    $values=array(
      "loginUtilisateur" => $this->loginUtilisateur,
      );
    $req_prep->execute($values);
  }

  

  public function update($data){
    $req_prep=Model::$pdo->prepare("UPDATE P_Utilisateurs SET loginUtilisateur=:loginUtilisateur, nomUtilisateur = :nomUtilisateur, prenomUtilisateur=:prenomUtilisateur, mdpUtilisateur=:mdpUtilisateur,estAdmin=:estAdmin,mailUtilisateur=:mailUtilisateur WHERE loginUtilisateur=:ancienneloginUtilisateur");

    $values=array(
      "ancienneloginUtilisateur" => $data->getloginUtilisateur(),
      "loginUtilisateur" => $this->loginUtilisateur,
      "nomUtilisateur" => $this->nomUtilisateur,
      "prenomUtilisateur" => $this->prenomUtilisateur,
      "mdpUtilisateur" => $this->mdpUtilisateur,
      "estAdmin" => $this->estAdmin,
      "mailUtilisateur" => $this->mailUtilisateur
      );
    $req_prep->execute($values);

  }

  public static function checkPassword($loginUtilisateur,$mot_de_passe_chiffre){
      $sql = "SELECT * from P_Utilisateurs WHERE loginUtilisateur=:loginUtilisateur AND mdpUtilisateur=:mdpUtilisateur";
      $req_prep = Model::$pdo->prepare($sql);

      $values = array(
          "loginUtilisateur" => $loginUtilisateur,
          "mdpUtilisateur" => $mot_de_passe_chiffre
      );   
      $req_prep->execute($values);
      $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
      $tab = $req_prep->fetchAll();
      if (empty($tab))
          return false;
      return $tab[0];
  }
  

}