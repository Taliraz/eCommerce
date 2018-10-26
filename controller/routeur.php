<?php

require (File::build_path(array("controller","ControllerProduit.php")));
if(isset($_GET['action'])) {
    $action = $_GET['action'];  
}
else { 
	$action="readAll"; 
} 
ControllerProduit::$action();
?>