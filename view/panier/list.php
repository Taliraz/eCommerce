<table id="liste_produits" border="0" cellspacing="0" cellpadding="0">
	<tr class="infos">
		<th  style="border: 0px 1px;" class="image"></th>
		<th  style="border: 0px 1px;" class="nom">Nom</th>
		<th  style="border: 0px 1px;" class="poids">Poids</th>
		<th  style="border: 0px 1px;" class="couleur">Couleur</th>
		<th class="prix">Prix</th>
		<th></th>
		<th></th>
	</tr>
	<?php foreach($tabcookie as $key){
		echo '
		<tr class="elements">
				<td class="image">
				<img src="'.$key->getImage().'"alt="'.$key->getId().'" class="image_param">
				</td>
				<td style="border: 0px 1px;" class="produit">
				'.$key->getNom().'
				</td>
				<td class="poids">
				'.htmlspecialchars($key->getPoid()).'
				</td>
				<td class="couleur">
				'.htmlspecialchars($key->getCouleur()).'
				</td>
				<td class="prix">
				'.htmlspecialchars($key->getPrix()).'
				</td>
				<td class="details">
				<a href="index.php?controller=produit&action=read&idProduit='.$key->getId().'">Voir</a>
				</td>';
				echo '
			</tr>';
	} ?>

</table>