<div>
    <h2>Informations sur l'utilisateur <?php  echo $row->getLogin(); ?></h2>
    <table id="tableau">
        <tr class="ligne"> 
            <td class="cellule">ID</td>
            <td class="cellule"><?php echo $row->getIdUtilisateur(); ?></td>
        </tr>
        <tr class="ligne"> 
            <td class="cellule">Login</td>
            <td class="cellule"><?php  echo $row->getLogin(); ?></td>
        </tr>
        <tr class="ligne"> 
            <td class="cellule">Mot de Passe</td>
            <td class="cellule"><?php  echo $row->getMdp(); ?></td>
        </tr>
        <tr class="ligne"> 
            <td class="cellule">Nom</td>
            <td class="cellule"><?php  echo $row->getNom(); ?></td>
        </tr>
        <tr class="ligne"> 
            <td class="cellule">Prénom</td>
            <td class="cellule"><?php  echo $row->getPrenom(); ?></td>
        </tr>
        </tr>
</table>

<a href="index.php?action=update&idUtilisateur=<?php echo $row->getIdUtilisateur(); ?>">Modifier</a>

<a href="javascript:history.go(-1)">Retour</a>