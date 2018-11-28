<html> 
    <body>
      <form method="post" action="index.php?controller=utilisateur&action=connected">
        <fieldset>
          <legend>Connexion :</legend>
          <p>
            <label for="loginUtilisateur_id">login</label> :
            <input type="text" placeholder="Ex : 256AB34" name="loginUtilisateur" id="loginUtilisateur_id" required/>
          </p>
          <p> 
            <label for="mdpUtilisateur_id">Mot de passe</label> :
            <input type="password" name="mdpUtilisateur" id="mdpUtilisateur_id" required/>
          <p>
            <input type="submit" value="Envoyer" />
          </p>
        </fieldset> 
      </form>
    </body>
</html>