<?php
echo '<p>Le Produit a bien été créé !</p>';
$tab_p=ModelProduit::getAllProduits();
require(File::build_path(array("view","produit","list.php")));
?>
