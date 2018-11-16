<?php 
require_once(__DIR__. DIRECTORY_SEPARATOR . join(DIRECTORY_SEPARATOR, array("..", "lib","File.php")));
require(File::build_path(array("model","ModelUtilisateur.php")));

session_start();

if (isset($_SESSION['id'])){
	echo $_SESSION['id'];
}
?>

<form method="POST" action="<?php if(isset($_POST['login']) && isset($_POST['mdp'])) { echo ModelUtilisateur::connexion($_POST['login'], $_POST['mdp']); } ?>" >
	<input type="text" name="login" placeholder="login">
	<input type="password" name="mdp" placeholder="Mot de passe">
	<input type="submit" name="submit">
</form>