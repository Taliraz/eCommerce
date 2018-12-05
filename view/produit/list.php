
<table id="liste_produits" border="0" cellspacing="0" cellpadding="0">
	<tr class="infos">
		<th  style="border: 0px 1px;" class="image"></th>
		<th  style="border: 0px 1px;" class="nom">Nom</th>
		<th  style="border: 0px 1px;" class="poids">Poids</th>
		<th  style="border: 0px 1px;" class="couleur">Couleur</th>
		<th class="prix">Prix</th>
		<?php if(Session::is_admin()) { echo '<th class="ajout_produit"><a href="index.php?controller=Produit&action=create">Ajouter</a></th>'; } ?>
		<th></th>
	</tr>
	<?php foreach($tab_p as $key){
		echo '
		<a href="#">
			<tr class="elements">
				<td class="image">
					<a href="index.php?controller=produit&action=read&idProduit='.$key->getId().'">
						<img src="'.$key->getImage().'"alt="'.$key->getId().'" class="image_param">
					</a>
				</td>
				<td style="border: 0px 1px;" class="produit">
					<a href="index.php?controller=produit&action=read&idProduit='.$key->getId().'">
						'.$key->getNom().'
					</a>
				</td>
				<td class="poids">
					<a href="index.php?controller=produit&action=read&idProduit='.$key->getId().'">
						'.htmlspecialchars($key->getPoid()).'
					</a>
				</td>
				<td class="couleur">
					<a href="index.php?controller=produit&action=read&idProduit='.$key->getId().'">
						'.htmlspecialchars($key->getCouleur()).'
					</a>
				</td>
				<td class="prix">
					<a href="index.php?controller=produit&action=read&idProduit='.$key->getId().'">
						'.htmlspecialchars($key->getPrix()).'
					</a>
				</td>
				'; if(Session::is_admin()) { echo '<td><a href="index.php?controller=produit&action=delete">Supprimer</a></td>'; }
				echo '
			</tr>
		</a>';
	} ?>

</table>

