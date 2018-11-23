<form style="margin-left:250px;" method="post" action="index.php?action=updated&idUtilisateur=<?php echo $info->getIdUtilisateur(); ?>">
            <fieldset>
                <legend>Modification Utilisateur </legend>
                <p>
                  <label for="login_id">Login</label> 
                  <input type="text" placeholder="<?php echo $info->getLogin(); ?>" name="login" id="login_id" value="<?php echo $info->getLogin() ?>"/>
                </p>
                <p>
                  <label for="mdp_id">Mot de Passe</label> 
                  <input type="text" placeholder="<?php echo $info->getMdp(); ?>" name="mdp" id="mdp_id" value="<?php echo $info->getMdp(); ?>"/>
                </p>
                <p>
                  <label for="nom_id">Nom</label> 
                  <input type="text" placeholder="<?php echo $info->getNom(); ?>" name="nom" id="nom_id" value="<?php echo $info->getNom() ?>"/>
                </p>
                <p>
                  <label for="prenom_id">Prénom</label> 
                  <input type="text" placeholder="<?php echo $info->getPrenom(); ?>" name="prenom" id="prenom_id" value="<?php echo $info->getPrenom(); ?>"/>
                </p>
                <p>
                  <input type="submit" value="Envoyer" />
                </p>
                <p>
                   <input id="bouton-retour" type="button" value="Retour" onclick="history.go(-1)">
                </p>
            </fieldset> 
</form>