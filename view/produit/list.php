<?php 

if(isset($_SESSION['id'])) {
	echo $_SESSION['id'];
}

?>


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
	<?php foreach($tab_p as $key){
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
				<a href="#">Voir</a>
				</td>';
				if(isset($_SESSION['id'])){
					echo '
				<td class="achat">
				<a href="#">Ajouter au Panier</a>
				</td>';
				}
				echo '
			</tr>';
	} ?>

</table>

<div>
	<a href="<?php echo File::build_path_css(array("view","connexion.php")); ?>">Connexion</a>
</div>