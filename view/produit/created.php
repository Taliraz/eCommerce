<?php
echo '<p>Le Produit a bien été créé !</p>';
$tab_p=ModelProduit::selectAll();
require(File::build_path(array("view","produit","list.php")));
?>
