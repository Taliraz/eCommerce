<table id="liste_produits" border="0" cellspacing="0" cellpadding="0">
	<tr class="infos">
		<th  style="border: 0px 1px;" class="image"></th>
		<th  style="border: 0px 1px;" class="nom">Nom</th>
		<th  style="border: 0px 1px;" class="poids">Poids</th>
		<th  style="border: 0px 1px;" class="couleur">Couleur</th>
		<th class="prix">Prix</th>
		<th  style="border: 0px 1px;" class="quantite">Quantité</th>
		<th class="vider"><a href="index.php?controller=panier&action=deleteAll">Vider le panier</a></th>
	</tr>
	<?php 
	$total=0;
	foreach($tabcookie as $key){
		$idKey=$key[0]->getId();
		if(isset($_POST["quantite"]) && $_POST["idProduitQte"]==$idKey){
			$tabcookie[$idKey][1]=$_POST["quantite"];
			$qte=$_POST["quantite"];
			setcookie("Panier",serialize($tabcookie),time()+3600);
		}
		else {
			$qte=$key[1];
		}
		$total=($total+$key[0]->getPrix()*$qte);
		setcookie("Total",serialize($total),time()+3600);

		echo '
			<tr class="elements">
				<td class="image">
					<a href="index.php?controller=produit&action=read&idProduit='.$idKey.'">
						<img src="'.$key[0]->getImage().'"alt="'.$idKey.'" class="image_param">
					</a>
				</td>
				<td style="border: 0px 1px;" class="produit">
					<a href="index.php?controller=produit&action=read&idProduit='.$idKey.'">
						'.$key[0]->getNom().'
					</a>
				</td>
				<td class="poids">
					<a href="index.php?controller=produit&action=read&idProduit='.$idKey.'">
						'.htmlspecialchars($key[0]->getPoid()).'
					</a>
				</td>
				<td class="couleur">
					<a href="index.php?controller=produit&action=read&idProduit='.$idKey.'">
						'.htmlspecialchars($key[0]->getCouleur()).'
					</a>
				</td>
				<td class="prix">
					<a href="index.php?controller=produit&action=read&idProduit='.$idKey.'">
						'.htmlspecialchars($key[0]->getPrix()).'
					</a>
				</td>
				<td class="quantite">
					<form method="post" action="index.php?controller=panier&action=readAll">
						<input type="number" class="quantite" value="'.$qte.'" name="quantite" step="1" min="1" max="100">
						<input type="hidden" name="idProduitQte" value="'.$idKey.'">
						<input class="quantite" value="Ok" type="submit">
					</form>
					
				</td>
				<td class="delete_panier">
				<a href="index.php?controller=panier&action=delete&idProduit='.$idKey.'">Supprimer du panier</a>
				</td>
			</tr>';
	};


	 ?>

</table>
<h1 class='total'>Total : <?php echo "$total"; ?>€ </h1>

<a href="index.php?controller=commande&action=created">Valider</a>