<table>
<?php 
	$total=0;
	foreach($tab_c as $key){
		echo '
			<tr class="elements">
				<td class>
					<a href="index.php?controller=commande&action=read&idCommande='.$key->getId().'">
						'.htmlspecialchars($key->getId()).':
					</a>
				</td>

				<td class>
					<a href="index.php?controller=commande&action=read&idCommande='.$key->getId().'">
						'.htmlspecialchars($key->getLoginUtilisateur()).'|
					</a>
				</td>
				<td class>
					<a href="index.php?controller=commande&action=read&idCommande='.$key->getId().'">
						'.htmlspecialchars($key->getPrix()).'|
					</a>
				</td>
				<td class>
					<a href="index.php?controller=commande&action=read&idCommande='.$key->getId().'">
						'.htmlspecialchars($key->getDate()).'
					</a>
				</td>
			</tr>';

	} ?>

</table>