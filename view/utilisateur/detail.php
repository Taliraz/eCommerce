<?php
require_once File::build_path(array("model","ModelUtilisateur.php"));
   echo('<p>Prénom:' . htmlspecialchars($v->getPrenomUtilisateur()) .'</p><p> Nom:' .htmlspecialchars($v->getNomUtilisateur()) .'</p><p> Login:'.htmlspecialchars($v->getLoginUtilisateur()).'</p><p> Mail:'.htmlspecialchars($v->getMailUtilisateur()).'</p>');
   if(Session::is_user($v->getLoginUtilisateur()) || Session::is_admin($v->getLoginUtilisateur())){
	   echo '<p><a title="supprimer" href="index.php?controller=utilisateur&action=delete&loginUtilisateur='.rawurlencode($v->getLoginUtilisateur()).'">supprimer</a></p>';
	   echo '<p><a title="modifier" href="index.php?controller=utilisateur&action=update&loginUtilisateur='.rawurlencode($v->getLoginUtilisateur()).'">modifier</a></p>';
	}
  ?>