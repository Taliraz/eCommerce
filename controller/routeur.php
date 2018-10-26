<?php
require_once (File::build_path(array("controller","ControllerProduit.php")));
$action = $_GET['action'];
ControllerProduit::$action(); 
?>