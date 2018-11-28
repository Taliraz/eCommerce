<?php
echo '<p>L\'utilisateur: '.$loginUtilisateur.' a bien été supprimé !</p>';
require(File::build_path(array("view","utilisateur","list.php")));