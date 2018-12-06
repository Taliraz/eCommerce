<?php
require_once (File::build_path(array("model","ModelUtilisateur.php"))); // chargement du modèle
require_once (File::build_path(array("lib","Security.php")));
class ControllerUtilisateur {
    protected static $object='utilisateur';


    public static function readAll() {
        $tab_v = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
        $controller='utilisateur';
        $view='list';
        $pagetitle='liste des Utilisateurs';
        require (File::build_path(array("view","view.php")));  //"redirige" vers la vue
    }

     public static function read(){
        $v=ModelUtilisateur::select($_GET ['loginUtilisateur']);
        if ($v==false){
            $controller='utilisateur';
            $view='erreur';
            $pagetitle='Erreur';
            require (File::build_path(array("view","view.php")));
        }
        else{
            $controller='utilisateur';
            $view='detail';
            $pagetitle='Detail';
            require(File::build_path(array("view","view.php")));
        }
        
    }

    public static function delete(){
        $loginUtilisateur=$_GET['loginUtilisateur'];
        if (Session::is_user($loginUtilisateur) || Session::is_admin($loginUtilisateur)){
            ModelUtilisateur::delete($loginUtilisateur);
            $tab_v=ModelUtilisateur::selectAll();
            $controller='utilisateur';
            $view='deleted';
            $pagetitle='utilisateur supprimé';
            require(File::build_path(array("view","view.php")));
        }
        else{
            self::readAll();
        }
    }


    public static function create(){
        if (Session::is_admin()){
            $controller='utilisateur';
            $view='create';
            $pagetitle='Creation de utilisateur';
            require(File::build_path(array("view","view.php")));
        }
        else {
            Self::readAll();
        }
    }

    public static function connect(){
        $controller='utilisateur';
        $view='connect';
        $pagetitle='Connexion';
        require(File::build_path(array("view","view.php")));
    }

    public static function disconnect(){
        session_unset();
        session_destroy();
        setcookie(session_name(),'',time()-1);
        ControllerProduit::readAll();
    }


    public static function created(){
        if (Session::is_admin()){ 
              $ModelUtilisateur=new ModelUtilisateur($_POST['loginUtilisateur'],$_POST['nomUtilisateur'],$_POST['prenomUtilisateur'],Security::chiffrer($_POST['mdpUtilisateur']),false,$_POST['mailUtilisateur']);
              $ModelUtilisateur->save();
              $controller='utilisateur';
              $view='created';
              $pagetitle='Utilisateur créé';
              require(File::build_path(array("view","view.php")));
        }
        else{
            Self::readAll();
        }
    }
    
    public static function update(){
        $loginUtilisateur=$_GET ['loginUtilisateur'];
        if (Session::is_user($loginUtilisateur) || Session::is_admin($loginUtilisateur)){
            $v=ModelUtilisateur::select($loginUtilisateur);
            $controller='utilisateur';
            $view='update';
            $pagetitle='modification de utilisateur';
            require(File::build_path(array("view","view.php")));
        }
        else{
            self::readAll();
        }
    }

    public static function updated(){
        $loginUtilisateur=$_GET['loginUtilisateur'];
        if (Session::is_user($loginUtilisateur) || Session::is_admin($loginUtilisateur)){
            $ModelUtilisateur=new ModelUtilisateur($_POST['loginUtilisateur'],$_POST['nomUtilisateur'],$_POST['prenomUtilisateur'],Security::chiffrer($_POST['mdpUtilisateur']),false,$_POST['mailUtilisateur']);
            $ModelUtilisateur->update(ModelUtilisateur::select($loginUtilisateur));
            $controller='utilisateur';
            $view='updated';
            $pagetitle='Utilisateur modifié';
            require(File::build_path(array("view","view.php")));
        }
        else{
            self::readAll();
        }

    }

    public static function connected(){
        $compte=ModelUtilisateur::checkPassword($_POST['loginUtilisateur'],Security::chiffrer($_POST['mdpUtilisateur']));
        if ($compte!=false){
            $_SESSION['loginUtilisateur']=$_POST['loginUtilisateur'];
            $v=ModelUtilisateur::select($_POST['loginUtilisateur']);
            $_SESSION['estAdmin']=$v->getEstAdmin();
            ControllerProduit::readAll();
        }
        else{
            echo '<p>Mot de passe erroné</p>';
            $controller='utilisateur';
            $view='connect';
            $pagetitle='Connexion';
            require(File::build_path(array("view","view.php")));
        }
    }

}