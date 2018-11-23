<?php

require (File::build_path(array("controller","ControllerProduit.php")));
require (File::build_path(array("controller","ControllerUtilisateur.php")));
require (File::build_path(array("model","Model.php")));
if(isset($_GET['action'])) {
    $action = $_GET['action'];  
}
else { 
	$action="readAll"; 
} 
ControllerUtilisateur::$action();
?>