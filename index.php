<?php
session_start();
require_once(__DIR__. DIRECTORY_SEPARATOR . join(DIRECTORY_SEPARATOR, array("lib","File.php")));
require_once (File::build_path(array("controller","routeur.php")));




if(isset($_SESSION['estAdmin'])) {
	if($_SESSION['estAdmin'] = 1) {
		echo '<form method="POST" action="" style="position:fixed;right:0px;top:0px;"><input type="hidden" name="secteur" value="Utilisateur"><input type="submit" value="Utilisateurs"></form>';
	}
}


?>