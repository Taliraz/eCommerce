<?php
echo '<p>L\'utilisateur a bien été créé !</p>';
$tab_v=ModelUtilisateur::selectAll();
require(File::build_path(array("view","utilisateur","list.php")));