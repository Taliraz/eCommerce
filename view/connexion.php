<?php 
require_once(__DIR__. DIRECTORY_SEPARATOR . join(DIRECTORY_SEPARATOR, array("..", "lib","File.php")));
require(File::build_path(array("model","ModelUtilisateur.php")));
require(File::build_path(array("model","Model.php")));

?>

<form method="POST" action="<?php 
	if(isset($_POST['login']) & isset($_POST['mdp'])) {
	if(ModelUtilisateur::connexion($_POST['login'], $_POST['mdp'])) {
		echo '../index.php';
	}
	else {	
		$error = "Mot de passe ou Identifiant icorrect";
		}
	} ?>">
	<input type="text" name="login" placeholder="login" value="<?php if(isset($_POST['login'])){ echo $_POST['login']; } ?>">
	<input type="password" name="mdp" placeholder="Mot de passe">
	<input type="submit" name="submit">
</form>

<?php 
if(isset($error)){
	echo $error;
}
?>