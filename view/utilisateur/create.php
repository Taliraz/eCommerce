<form style="margin-left:250px" method="post" action="index.php?action=created">
            <fieldset>
                <legend>Nouvel Utilisateur :</legend>
                <p>
                  <label for="login_id">Login</label>  
                  <input type="text" placeholder="Login" name="login" id="login_id" required/>
                </p>
                <p>
                  <label for="mdp_id">Mot de Passe</label> 
                  <input type="text" placeholder="Mot de Passe" name="mdp" id="mdp_id" required/>
                </p>
                <p>
                  <label for="nom_id">Nom</label>
                  <input type="text" placeholder="Nom" name="nom" id="nom_id" required/>
                </p>
                <p>
                  <label for="prenom_id">Prénom</label> 
                  <input type="text" placeholder="Prénom" name="prenom" id="prenom_id" required/>
                </p>
                <p>
                    <input type="submit" value="Envoyer" />
                </p>
                <p>
                   <input id="bouton-retour" type="button" value="Retour" onclick="history.go(-1)">
                </p>
            </fieldset> 
</form>