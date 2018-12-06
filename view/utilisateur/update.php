<html> 
    <body>
      <form method="post" action="index.php?controller=utilisateur&action=updated&loginUtilisateur=<?php echo $v->getLoginUtilisateur(); ?>">
        <fieldset>
          <legend>Mon formulaire :</legend>
          <p> 
            <label for="loginUtilisateur_id">Login</label> :
            <?php echo'<input readonly type="text" value="'.$v->getLoginUtilisateur().'" name="loginUtilisateur" id="loginUtilisateur_id" required/>'?>
          </p>
           <p> 
            <label for="mailUtilisateur_id">Mail</label> :
            <?php echo'<input readonly type="text" value="'.$v->getMailUtilisateur().'" name="mailUtilisateur" id="mailUtilisateur_id" required/>'?>
          </p>
          <p>
            <label for="nomUtilisateur_id">Nom</label> :
            <?php echo '<input type="text" value="'.$v->getNomUtilisateur().'" name="nomUtilisateur" id="nomUtilisateur_id" required/>'?>
          </p>
          <p>
            <label for="prenomUtilisateur_id">Prenom</label> :
            <?php echo '<input type="text" value="'.$v->getPrenomUtilisateur().'" name="prenomUtilisateur" id="prenomUtilisateur_id" required/>'?>
          </p>
          <p> 
            <label for="mdpUtilisateur_id">Mot de passe</label> :
            <input type="password" name="mdpUtilisateur" id="mdpUtilisateur_id" required/>
          <p>
          <p>
            <input type="submit" value="Envoyer" />
          </p>
        </fieldset> 
      </form>
    </body>
</html>