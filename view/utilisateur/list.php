<div>
    <h2 class="titre">Liste des Utilisateurs</h2>
    <ul id="liste">
    <?php 
    foreach ($row as $valeur) {
        echo '<p> <a href="index.php?action=details&idUtilisateur='.rawurlencode($valeur->getIdUtilisateur()).'"><li class="elements-liste"> ' . htmlspecialchars($valeur->getLogin()) . '</li></a></p>';
    }?>
    </ul>
    <a class="bouton" href="index.php?action=create"> Ajouter un Utilisateur </a>
</div>