<!DOCTYPE html>
<html>
    <body>
        <?php
        foreach ($tab_v as $v){
            echo '<p> login Utilisateur: <a title="Utilisateur" 
                href="index.php?controller=utilisateur&action=read&loginUtilisateur='
                .rawurlencode($v->getLoginUtilisateur()).'">'. htmlspecialchars($v->getLoginUtilisateur()).'</a> 
                <a title="supprimer" 
                href="index.php?controller=utilisateur&action=delete&loginUtilisateur='
                .rawurlencode($v->getLoginUtilisateur()).'">supprimer</a> 
                </p>';
            }  

        ?>
        <p>
            <a title="create" href="index.php?controller=utilisateur&action=create"> Ajouter une utilisateur </a>
        </p>
    </body>
</html>