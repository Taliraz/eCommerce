<?php 
require(File::build_path(array("model","ModelUtilisateur.php")));

class ControllerUtilisateur {

	public static function create(){
        require (File::build_path(array("view","utilisateur","create.php")));
    }
    
    public static function created() {
        if (isset($_POST["login"]) & !empty($_POST["login"]) & isset($_POST["mdp"]) & !empty($_POST["mdp"]) & isset($_POST["nom"]) & !empty($_POST["nom"]) & isset($_POST["prenom"]) & !empty($_POST["prenom"])) { 
            $nouvelUtilisateur = new ModelUtilisateur($_POST["login"], $_POST["mdp"], $_POST["nom"], $_POST["prenom"]);
            $res = $nouvelUtilisateur->saveUser();
            if (gettype($res) == "string"){
                echo $res;
            }
            self::readAll();
        }
        else {
            echo "Tous les champs n'ont pas été remplis";
        }
    }
    
    public static function readAll(){
        $row = ModelUtilisateur::getAll();
        if (!empty($row)){
            require (File::build_path(array("view","utilisateur","list.php")));
        }
        else { echo "Aucun étudiant"; }
    }
    
    public static function details(){
        if (isset($_GET['idUtilisateur'])){
            $row = ModelUtilisateur::getOne($_GET['idUtilisateur']);
            if (!empty($row)){
                require (File::build_path(array("view","utilisateur","details.php")));
            }
            else { echo "Erreur, aucun étudiant portant cet ID"; }
        }
    }
    
    public static function update(){
        $info = ModelUtilisateur::getOne($_GET['idUtilisateur']);
        require (File::build_path(array("view","utilisateur","update.php")));
    }
    
    public static function updated(){
        if (isset($_GET['idUtilisateur']) && !is_null($_GET['idUtilisateur']) && isset($_POST['login']) && !is_null($_POST['login']) && isset($_POST['mdp']) & !is_null($_POST['mdp']) && isset($_POST['nom']) && !is_null($_POST['nom']) && isset($_POST['prenom']) && !is_null($_POST['prenom'])){
            $data = array("loginUtilisateur"=>$_POST['login'], "mdpUtilisateur"=>$_POST['mdp'], "nomUtilisateur"=>$_POST['nom'], "prenomUtilisateur"=>$_POST['prenom']);
            ModelUtilisateur::update($_GET['idUtilisateur']);
            self::details();
        }
        else {
            echo "Erreur lors de la modification";
        }
    }
    
    public static function supprimerEtudiant($id){
        ModelUtilisateur::remove($id);
    }
}	

?>