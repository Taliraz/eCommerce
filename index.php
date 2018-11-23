<?php
require_once(__DIR__. DIRECTORY_SEPARATOR . join(DIRECTORY_SEPARATOR, array("lib","File.php")));
require_once (File::build_path(array("controller","routeur.php")));


session_start();

if(isset($_SESSION['estAdmin'])) {
	if($_SESSION['estAdmin'] = 1) {
		echo '<form method="POST"><input type="hidden" name="secteur" value="Utilisateurs"></form>';
		echo '<a href="'. File::build_path_css(array("controller","routeur.php")) .'?action=readAll">Utilisateurs<a/>';
	}
}


?>