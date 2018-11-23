<?php 

class ModelUtilisateur {
    
    protected $idUtilisateur;
    protected $loginUtilisateur;
    protected $mdpUtilisateur;
    protected $nomUtilisateur;
    protected $prenomUtilisateur;
    
    public function __construct($login = NULL, $mdp = NULL, $nom = NULL, $prenom = NULL){
        if(!is_null($login) && !is_null($mdp) && !is_null($nom) && !is_null($prenom)){
            $this->loginUtilisateur = $login;
            $this->mdpUtilisateur = $mdp; 
            $this->nomUtilisateur = $nom;
            $this->prenomUtilisateur = $prenom;
        }
    }
    
    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }
    
    public function getLogin() {
        return $this->loginUtilisateur;
    }
    
    public function getMdp() {
        return $this->mdpUtilisateur;
    }

    public function getNom() {
        return $this->nomUtilisateur;
    }
    
    public function getPrenom() {
        return $this->prenomUtilisateur;
    }
    
    public function setLogin($login){
        $this->loginUtilisateur = $login;
    }
    
    public function setMdp($mdp){
        $this->mdpUtilisateur = $mdp;
    }

    public function setNom($nom){
        $this->nomUtilisateur = $nom;
    }

    public function setprenom($prenom){
        $this->prenomUtilisateur = $prenom;
    }
      
    
    public static function connexion($login, $mdp){
        $data = array(':login'=>$login, ':mdp'=>$mdp);
        $req = Model::$pdo->prepare("SELECT * FROM P_Utilisateurs WHERE loginUtilisateur = :login AND mdpUtilisateur = :mdp ");
        $req->execute($data);
        if ($check = $req->rowcount() != 1) {
            return "";
        }
        else {
            $req->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
            $row = $req->fetch();
            session_start();
            $_SESSION['id'] = $row->getIdUtilisateur();
            $_SESSION['login'] = $row->getLogin();
            $_SESSION['mdp'] = $row->getMdp();
            $_SESSION['nom'] = $row->getNom();
            $_SESSION['prenom'] = $row->getPrenom();
            return "../index.php";
        }
    }
    public static function getOne($idUtilisateur){
        $req = Model::$pdo->prepare('SELECT * FROM P_Utilisateurs WHERE idUtilisateur = :idUtilisateur');
        $req->execute(array(':idUtilisateur'=>$idUtilisateur));
        $check = $req->rowcount();
        if($check == 1){
            $req->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
            $row = $req->fetch();
            return $row;
        }
        else { return "Erreur - Utilisateur non trouvé"; }
    }
    
    public static function getAll(){
        $req = Model::$pdo->query ("SELECT * FROM P_Utilisateurs");
        $req->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        $row = $req->fetchAll();
        return $row;    
    }
    
    public function saveUser(){
        $erreur = "utilisateur déjà présent dans la base de données";
        $login = htmlspecialchars($this->loginUtilisateur);
        $mdp = sha1($this->mdpUtilisateur);
        $nom = htmlspecialchars($this->nomUtilisateur);
        $prenom = htmlspecialchars($this->prenomUtilisateur);
        $data = array(':login'=>$login, ':mdp'=>$mdp, ":nom"=>$nom, ":prenom"=>$prenom);
        $reqVerif = Model::$pdo->prepare("SELECT idUtilisateur FROM P_Utilisateurs WHERE loginUtilisateur = :login");
        $reqVerif->execute(array(':login'=>$login));
        $resVerif = $reqVerif->rowcount();
        if($resVerif > 0){
            return $erreur;
        }
        else {
            $insert = Model::$pdo->prepare("INSERT INTO P_Utilisateurs(loginUtilisateur, mdpUtilisateur, nomUtilisateur, prenomUtilisateur) VALUES(:login,:mdp, :nom, :prenom)");
            $insert->execute($data);
            $getId = Model::$pdo->prepare("SELECT idUtilisateur FROM P_Utilisateurs WHERE loginUtilisateur = :login");
            $getId->execute(array(':login'=>$login));
            $arrayRetour = $getId->fetch();
            $idRetour = $arrayRetour[0];
            
            return $idRetour;
        }
    }

    public function remove($id){
        $req = Model::$pdo->prepare("DELETE * FROM P_Utilisateurs WHERE idUtilisateur = :id");
        $req->execute(array(":id"->$id));
    }

    public static function update($id){
        $data = array(":login"=>$_POST['login'], ":mdp"=>$_POST['mdp'], ":nom"=>$_POST['nom'], ":prenom"=>$_POST['prenom']);
        $req = Model::$pdo->prepare("UPDATE P_Utilisateurs SET loginUtilisateur = :login, mdpUtilisateur = :mdp, nomUtilisateur = :nom,
        prenomUtilisateur = :prenom WHERE idUtilisateur = $id");
        $req->execute($data);
    }
}