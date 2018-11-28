<?php
require (File::build_path(array("controller","ControllerProduit.php")));
require (File::build_path(array("controller","ControllerUtilisateur.php")));

if(isset($_GET['action'])) {
    $action = $_GET['action'];  
}
else { 
	$action="readAll"; 
}

if(isset($_GET['controller'])) {
    $controller = $_GET['controller'];  
}
else { 
	$controller="produit"; 
}

$controller_class="Controller".ucfirst($controller);
if(!class_exists($controller_class)){
	$controller_class="ControllerVoiture";
}

if(in_array($action, get_class_methods($controller_class))){
	$controller_class::$action(); 
}
else{
	require_once(File::build_path(array("view",$controller,"error.php")));
}
?>
