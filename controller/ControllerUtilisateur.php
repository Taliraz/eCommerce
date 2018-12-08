<?php
require_once (File::build_path(array("model","ModelUtilisateur.php"))); // chargement du modèle
require_once (File::build_path(array("lib","Security.php")));
class ControllerUtilisateur {
    protected static $object='utilisateur';


    public static function readAll() {
        if (isset($_SESSION['estAdmin']) && $_SESSION['estAdmin']){
            $tab_v = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
            $controller='utilisateur';
            $view='list';
            $pagetitle='liste des Utilisateurs';
            require (File::build_path(array("view","view.php")));  //"redirige" vers la vue
        }
        else{
            $tab_p=ModelProduit::selectAll();
            $controller='produit';
            $view='list';
            $pagetitle='liste des Produits';
            require (File::build_path(array("view","view.php")));
        }
    }

     public static function read(){
        $v=ModelUtilisateur::select($_GET ['loginUtilisateur']);
        if ((isset($_SESSION['loginUtilisateur']) && Session::is_user($_GET['loginUtilisateur'])) || (isset($_SESSION['estAdmin']) && $_SESSION['estAdmin'])){
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
        else{
            $tab_p=ModelProduit::selectAll();
            $controller='produit';
            $view='list';
            $pagetitle='liste des Produits';
            require (File::build_path(array("view","view.php")));
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
            $tab_p=ModelProduit::selectAll();
            $controller='produit';
            $view='list';
            $pagetitle='liste des Produits';
            require (File::build_path(array("view","view.php")));
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

    public static function create(){
        $controller='utilisateur';
        $view='create';
        $pagetitle='Creation de utilisateur';
        require(File::build_path(array("view","view.php")));
    }

    public static function created(){
        $nonce=Security::generateRandomHex();
        $mail='<h1>BIENVENUE</h1><p>Afin de valider votre inscription veuillez cliquer sur ce <a href="http://webinfo.iutmontp.univ-montp2.fr/~armangaus/eCommerce/index.php?controller=utilisateur&action=validate&nonce='.$nonce.'&loginUtilisateur='.$_POST['loginUtilisateur'].'">Lien</a></p>';
        $ModelUtilisateur=new ModelUtilisateur($_POST['loginUtilisateur'],$_POST['nomUtilisateur'],$_POST['prenomUtilisateur'],Security::chiffrer($_POST['mdpUtilisateur']),false,$_POST['mailUtilisateur'],$nonce);
        $ModelUtilisateur->save();
        $controller='utilisateur';
        $view='created';
        $pagetitle='Utilisateur créé';
        mail($_POST['mailUtilisateur'],"validation",$mail);
        require(File::build_path(array("view","view.php")));
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
            $ModelUtilisateur=new ModelUtilisateur($_POST['loginUtilisateur'],$_POST['nomUtilisateur'],$_POST['prenomUtilisateur'],Security::chiffrer($_POST['mdpUtilisateur']),false,$_POST['mailUtilisateur'],NULL);
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
        $user=ModelUtilisateur::select($_POST['loginUtilisateur']);
        if ($compte!=false && $user->getNonce()==NULL){
            $_SESSION['loginUtilisateur']=$_POST['loginUtilisateur'];
            $v=ModelUtilisateur::select($_POST['loginUtilisateur']);
            $_SESSION['estAdmin']=$v->getEstAdmin();
            ControllerProduit::readAll();
        }
        else if($user->getNonce()!=NULL){
            echo '<p>Mail non confirmé</p>';
            $controller='utilisateur';
            $view='connect';
            $pagetitle='Connexion';
            require(File::build_path(array("view","view.php")));
        }
        else{
            echo '<p>Mot de passe erroné</p>';
            $controller='utilisateur';
            $view='connect';
            $pagetitle='Connexion';
            require(File::build_path(array("view","view.php")));
        }
    }

    public static function validate(){
        $user=ModelUtilisateur::select($_GET['loginUtilisateur']);
        if ($user!=false && $user->getNonce()==$_GET['nonce']){
            $user->setNonce(NULL);
            echo $user->getNonce();
            $userBase=ModelUtilisateur::select($_GET['loginUtilisateur']);
            $user->update($userBase);
            $controller='utilisateur';
            $view='connect';
            $pagetitle='Connexion';
            require(File::build_path(array("view","view.php")));
        }
        else{
            echo 'mail non validé';
            $controller='utilisateur';
            $view='connect';
            $pagetitle='Connexion';
            require(File::build_path(array("view","view.php")));
        }
    }

}