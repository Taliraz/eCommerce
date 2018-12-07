<table>
<?php 
	$total=0;
	foreach($tabcookie as $key){
		$total=$total+$key->getPrix();
		echo '
			<tr class="elements">
				<td class="image">
					<a href="index.php?controller=commande&action=read&idProduit='.$key->getId().'">
						<img src="'.$key->getImage().'"alt="'.$key->getId().'" class="image_param">
					</a>
				</td>
				<td style="border: 0px 1px;" class="produit">
					<a href="index.php?controller=commande&action=read&idProduit='.$key->getId().'">
						'.$key->getNom().'
					</a>
				</td>
				<td class="poids">
					<a href="index.php?controller=commande&action=read&idProduit='.$key->getId().'">
						'.htmlspecialchars($key->getLoginUtilisateur()).'
					</a>
				</td>
				<td class="couleur">
					<a href="index.php?controller=commande&action=read&idProduit='.$key->getId().'">
						'.htmlspecialchars($key->getTabProduit()).'
					</a>
				</td>
				<td class="prix">
					<a href="index.php?controller=commande&action=read&idProduit='.$key->getId().'">
						'.htmlspecialchars($key->getPrix()).'
					</a>
				</td>
				<td class="delete_panier">
				<a href="index.php?controller=panier&action=delete&idProduit='.$key->getId().'">Supprimer du panier</a>
				</td>
			</tr>';

	} ?>

</table>

<h1 class='total'>Total : <?php echo "$total"; ?>€ </h1>