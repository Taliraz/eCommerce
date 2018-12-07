<?php
$tab_p = ModelProduit::selectAll();    
$controller='produit';
$view='list';
$pagetitle='liste des Produits';
require(File::build_path(array("view","produit","list.php")));