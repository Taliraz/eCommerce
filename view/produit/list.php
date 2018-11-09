<html>
	<head>
		<title>Liste des produits</title>
	</head>
	<body>
		<ul class="liste_produits">
			<?php foreach($tab_p as $key){
				echo '<li class="produit">'.htmlspecialchars($key->getNom()).'<li>
					<ul class="elements">
						<li class="image">
						'.$key->getImage().'
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
					</ul>';
			} 
			var_dump($tab_p);?>
		</ul>
	</body>
</html>