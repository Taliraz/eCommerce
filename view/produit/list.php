
<ul class="liste_produits">
	<?php foreach($tab_p as $key){
		echo 
		'<span class="line"></span>
		<li class="produit">'.htmlspecialchars($key->getNom()).'<li>
			<ul class="elements">
				<li class="image">
				<img src="'.$key->getImage().'"alt="'.$key->getId().'" class="image_param">
				</li>
				<li class="poids">
				'.htmlspecialchars($key->getPoid()).'
				</li>
				<li class="couleur">
				'.htmlspecialchars($key->getCouleur()).'
				</li>
				<li class="prix">
				'.htmlspecialchars($key->getPrix()).'
				</li>
				<li class="details">
				Voir
				</li>
				<li class="achat">
				Ajouter au Panier
				</li>
			</ul>
			<span class="line"></span>';
	} ?>
</ul>