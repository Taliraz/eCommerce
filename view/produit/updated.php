<?php
echo '<p>Le produit a bien été modifié !</p>';
$tab_p=ModelProduit::selectAll();
require(File::build_path(array("view","produit","list.php")));	